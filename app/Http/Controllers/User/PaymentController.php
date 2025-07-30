<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use App\Models\TransactionItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Midtrans\Snap;
use Midtrans\Config;
use Inertia\Inertia;

class PaymentController extends Controller
{
    public function process(Request $request)
    {
        $cart = session()->get('cart', []);

        if (empty($cart)) {
            return redirect()->back()->with('error', 'Keranjang kosong!');
        }

        $total = 0;
        $items = [];

        // 🔑 Buat order_id unik
        $snapOrderId = 'ORDER-GROUP-' . uniqid();

        // Buat transaksi utama (parent)
        $parentTransaction = Transaction::create([
            'user_id' => Auth::id(),
            'product_id' => null,
            'quantity' => 0,
            'total_price' => 0, // akan diupdate setelah loop
            'status' => 'pending',
            'order_id' => $snapOrderId,
        ]);

        foreach ($cart as $item) {
            $productId = $item['product_id'] ?? $item['id'] ?? null;

            if (!$productId)
                continue;

            $subtotal = $item['price'] * $item['quantity'];
            $total += $subtotal;

            // Simpan ke table transaction_items
            TransactionItem::create([
                'transaction_id' => $parentTransaction->id,
                'product_id' => $productId,
                'quantity' => $item['quantity'],
                'price' => $item['price'],
            ]);

            $items[] = [
                'id' => $productId,
                'price' => $item['price'],
                'quantity' => $item['quantity'],
                'name' => $item['name'],
            ];
        }

        // Update total transaksi
        $parentTransaction->update([
            'total_price' => $total,
        ]);

        // Midtrans config
        Config::$serverKey = config('midtrans.server_key');
        Config::$isProduction = config('midtrans.is_production', false);
        Config::$isSanitized = true;
        Config::$is3ds = true;

        $payload = [
            'transaction_details' => [
                'order_id' => $snapOrderId,
                'gross_amount' => $total,
            ],
            'customer_details' => [
                'first_name' => Auth::user()->name,
                'email' => Auth::user()->email,
            ],
            'item_details' => $items,
        ];

        // Snap token
        $snapToken = Snap::getSnapToken($payload);

        // Hapus cart setelah proses
        session()->forget('cart');

        // Kirim snap token ke frontend via session
        session()->flash('snap_token', $snapToken);

        return redirect()->route('user.pay.page');
    }

    public function payPage()
    {
        $snapToken = session('snap_token');

        if (!$snapToken) {
            return redirect()->route('user.cart.index')->with('error', 'Token pembayaran tidak ditemukan.');
        }

        return Inertia::render('User/Payment', [
            'snapToken' => $snapToken,
        ]);
    }
}
