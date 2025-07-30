<?php

// app/Http/Controllers/Admin/TransactionController.php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Inertia\Inertia;

class TransactionController extends Controller
{
    public function index()
    {
        $transactions = Transaction::with(['user', 'items.product'])
            ->latest()
            ->get();

        return Inertia::render('Admin/Transactions/Index', [
            'transactions' => $transactions,
        ]);
    }

    public function destroy($id)
    {
        $transaction = Transaction::findOrFail($id);
        $transaction->delete();

        return back()->with('success', 'Transaksi berhasil dihapus.');
    }
}
