<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use App\Models\User;
use Inertia\Inertia;
use Illuminate\Support\Facades\DB;

class AdminDashboardController extends Controller
{
    public function index()
    {
        try {
            // ✅ DEBUGGING: Cek apakah ada data di database
            $totalTransactions = Transaction::count();
            $totalUsers = User::count();

            \Log::info('Database Check:', [
                'total_transactions' => $totalTransactions,
                'total_users' => $totalUsers,
            ]);

            // ✅ Pie Chart: Status Transaksi (dengan dummy data jika kosong)
            $transactionStatusQuery = Transaction::select('status', DB::raw('COUNT(*) as count'))
                ->groupBy('status')
                ->get();

            $transactionStatus = [];
            foreach ($transactionStatusQuery as $item) {
                $transactionStatus[$item->status] = $item->count;
            }

            // ✅ Dummy data jika kosong
            if (empty($transactionStatus)) {
                $transactionStatus = [
                    'paid' => 15,
                    'pending' => 8,
                    'failed' => 3,
                ];
            }

            // ✅ Line Chart: Penjualan per bulan
            $salesPerMonth = [];

            // Coba MySQL format dulu
            try {
                $salesQuery = DB::table('transactions')
                    ->selectRaw("DATE_FORMAT(created_at, '%Y-%m') as month, SUM(COALESCE(total_price, 0)) as total")
                    ->groupBy('month')
                    ->orderBy('month')
                    ->get();

                foreach ($salesQuery as $item) {
                    $salesPerMonth[$item->month] = (float) $item->total;
                }
            } catch (\Exception $e) {
                // Fallback untuk SQLite
                try {
                    $salesQuery = DB::table('transactions')
                        ->selectRaw("strftime('%Y-%m', created_at) as month, SUM(COALESCE(total_price, 0)) as total")
                        ->groupBy('month')
                        ->orderBy('month')
                        ->get();

                    foreach ($salesQuery as $item) {
                        $salesPerMonth[$item->month] = (float) $item->total;
                    }
                } catch (\Exception $e2) {
                    \Log::error('Sales query failed: ' . $e2->getMessage());
                }
            }

            // ✅ Dummy data jika kosong
            if (empty($salesPerMonth)) {
                $salesPerMonth = [
                    '2025-01' => 2500000,
                    '2025-02' => 3200000,
                    '2025-03' => 2800000,
                    '2025-04' => 3500000,
                    '2025-05' => 4200000,
                    '2025-06' => 3800000,
                    '2025-07' => 4500000,
                ];
            }

            // ✅ Bar Chart: User baru per bulan
            $userPerMonth = [];

            try {
                $userQuery = DB::table('users')
                    ->selectRaw("DATE_FORMAT(created_at, '%Y-%m') as month, COUNT(*) as count")
                    ->groupBy('month')
                    ->orderBy('month')
                    ->get();

                foreach ($userQuery as $item) {
                    $userPerMonth[$item->month] = (int) $item->count;
                }
            } catch (\Exception $e) {
                // Fallback untuk SQLite
                try {
                    $userQuery = DB::table('users')
                        ->selectRaw("strftime('%Y-%m', created_at) as month, COUNT(*) as count")
                        ->groupBy('month')
                        ->orderBy('month')
                        ->get();

                    foreach ($userQuery as $item) {
                        $userPerMonth[$item->month] = (int) $item->count;
                    }
                } catch (\Exception $e2) {
                    \Log::error('User query failed: ' . $e2->getMessage());
                }
            }

            // ✅ Dummy data jika kosong
            if (empty($userPerMonth)) {
                $userPerMonth = [
                    '2025-01' => 45,
                    '2025-02' => 52,
                    '2025-03' => 38,
                    '2025-04' => 67,
                    '2025-05' => 74,
                    '2025-06' => 59,
                    '2025-07' => 82,
                ];
            }

            // ✅ Debug log
            \Log::info('Dashboard Data Processed:', [
                'transactionStatus' => $transactionStatus,
                'salesPerMonth' => $salesPerMonth,
                'userPerMonth' => $userPerMonth,
            ]);

            // ✅ Kirim ke Vue
            $responseData = [
                'transactionStatus' => $transactionStatus,
                'salesPerMonth' => $salesPerMonth,
                'userPerMonth' => $userPerMonth,
                'debug' => [
                    'totalTransactions' => $totalTransactions,
                    'totalUsers' => $totalUsers,
                    'timestamp' => now()->toDateTimeString(),
                ]
            ];

            \Log::info('Sending to Inertia:', $responseData);

            return Inertia::render('Admin/Dashboard', $responseData);

        } catch (\Exception $e) {
            \Log::error('Dashboard Controller Error: ' . $e->getMessage());
            \Log::error('Stack trace: ' . $e->getTraceAsString());

            // Return dengan dummy data jika error
            $errorData = [
                'transactionStatus' => [
                    'paid' => 15,
                    'pending' => 8,
                    'failed' => 3,
                ],
                'salesPerMonth' => [
                    '2025-01' => 2500000,
                    '2025-02' => 3200000,
                    '2025-03' => 2800000,
                ],
                'userPerMonth' => [
                    '2025-01' => 45,
                    '2025-02' => 52,
                    '2025-03' => 38,
                ],
                'debug' => [
                    'error' => $e->getMessage(),
                    'timestamp' => now()->toDateTimeString(),
                ]
            ];

            \Log::info('Sending error data to Inertia:', $errorData);

            return Inertia::render('Admin/Dashboard', $errorData);
        }
    }
}