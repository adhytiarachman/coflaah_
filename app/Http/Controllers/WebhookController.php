<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\Product;
use Illuminate\Support\Facades\Log;

class WebhookController extends Controller
{
    public function handle(Request $request)
    {
        Log::info('📩 Webhook Midtrans diterima:', $request->all());

        // Ambil data penting dari notifikasi
        $serverKey = config('midtrans.server_key');
        $orderId = $request->input('order_id');
        $statusCode = $request->input('status_code');
        $grossAmount = $request->input('gross_amount');
        $signatureKey = $request->input('signature_key');

        // Hitung signature yang benar
        $expectedSignature = hash('sha512', $orderId . $statusCode . $grossAmount . $serverKey);

        // Log detail perbandingan signature
        Log::info('🔍 Signature Check', [
            'order_id' => $orderId,
            'signature_from_midtrans' => $signatureKey,
            'signature_expected' => $expectedSignature,
        ]);

        // Validasi signature
        if ($signatureKey !== $expectedSignature) {
            Log::warning("❌ Signature tidak valid untuk Order ID: $orderId");
            return response()->json(['message' => 'Invalid signature'], 403);
        }

        // Ambil semua transaksi dengan order_id ini
        $transactions = Transaction::where('order_id', $orderId)->get();

        if ($transactions->isEmpty()) {
            Log::warning("❌ Transaksi tidak ditemukan: $orderId");
            return response()->json(['message' => 'Transaction not found'], 404);
        }

        // Mapping status dari Midtrans ke internal
        $transactionStatus = $request->input('transaction_status');
        $fraudStatus = $request->input('fraud_status');

        $internalStatus = match ($transactionStatus) {
            'capture' => $fraudStatus === 'challenge' ? 'challenge' : 'paid',
            'settlement' => 'paid',
            'pending' => 'pending',
            'deny', 'cancel', 'expire' => 'failed',
            default => $transactionStatus,
        };

        // Update semua transaksi
        foreach ($transactions as $transaction) {
            // Update status
            $transaction->status = $internalStatus;
            $transaction->save();

            // Jika status sukses dan sebelumnya bukan 'paid', kurangi stok
            if ($internalStatus === 'paid' && $transaction->wasChanged('status')) {
                foreach ($transaction->items as $item) {
                    $product = $item->product;

                    if ($product) {
                        $oldStock = $product->stock;
                        $product->decrement('stock', $item->quantity);

                        Log::info("📦 Stok produk '{$product->name}' dikurangi: $oldStock → {$product->stock}");
                    }
                }
            }
        }

        Log::info("✅ Semua transaksi dengan Order ID $orderId diperbarui ke status: $internalStatus");

        return response()->json(['message' => 'Webhook processed']);
    }
}
