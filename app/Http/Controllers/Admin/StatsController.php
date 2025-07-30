<?php

// app/Http/Controllers/Admin/StatsController.php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;

class StatsController extends Controller
{
    public function index()
    {
        // Jumlah total user
        $totalUsers = User::count();

        // Total transaksi per bulan (format: YYYY-MM)
        $monthlySales = Transaction::select(
            DB::raw("strftime('%Y-%m', created_at) as month"),
            DB::raw("SUM(total_price) as total")
        )
            ->groupBy('month')
            ->orderBy('month', 'asc')
            ->get();

        return Inertia::render('Admin/DashboardStats', [
            'totalUsers' => $totalUsers,
            'monthlySales' => $monthlySales,
        ]);
    }
}
