<?php

// app/Http/Controllers/PaymentCallbackController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Midtrans\Notification;
use App\Models\Transaction;

class PaymentCallbackController extends Controller
{
    public function handle(Request $request)
    {
        $notif = new Notification();
        $transactionStatus = $notif->transaction_status;
        $orderId = $notif->order_id;

        // Temukan transaksi (di sini kamu bisa gunakan order_id jika kamu menyimpannya)
        // Untuk contoh sederhana, update semua transaksi pending user terakhir
        $transactions = Transaction::where('status', 'pending')->latest()->take(5)->get();

        foreach ($transactions as $trx) {
            if ($transactionStatus == 'settlement') {
                $trx->update(['status' => 'paid']);
            } elseif ($transactionStatus == 'pending') {
                $trx->update(['status' => 'pending']);
            } else {
                $trx->update(['status' => 'failed']);
            }
        }

        return response()->json(['success' => true]);
    }
}
