<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PaymentHistoryController extends Controller
{
    //
    public function index()
    {
        $transactions = Transaction::with(['user', 'product'])->latest()->get();

        return Inertia::render('Admin/Payments/Index', [
            'transactions' => $transactions,
        ]);
    }
}
