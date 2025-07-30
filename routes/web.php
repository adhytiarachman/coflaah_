<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\GoogleAuthController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\TransactionController;
use App\Http\Controllers\Admin\ProductRecommendationController;
use App\Http\Controllers\User\ProductController as UserProductController;
use App\Http\Controllers\User\CartController;
use App\Http\Controllers\User\PaymentController;
use App\Http\Controllers\User\TransactionController as UserTransactionController;
use App\Http\Controllers\User\DashboardController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\Admin\StatsController;

use App\Http\Controllers\WebhookController;


/*
|--------------------------------------------------------------------------
| HALAMAN PUBLIK
|--------------------------------------------------------------------------
*/

Route::get('/', fn() => Inertia::render('Landing'))->name('landing');
Route::get('/about', fn() => Inertia::render('About'))->name('about');
Route::get('/contact', fn() => Inertia::render('Contact'))->name('contact');

/*
|--------------------------------------------------------------------------
| AUTH: LOGIN & REGISTER
|--------------------------------------------------------------------------
*/

Route::get('/login', [LoginController::class, 'create'])->name('login');
Route::post('/login', [LoginController::class, 'store']);
Route::post('/logout', [LoginController::class, 'destroy'])->name('logout');

Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
Route::post('/register', [RegisteredUserController::class, 'store']);

/*
|--------------------------------------------------------------------------
| LOGIN GOOGLE OAUTH
|--------------------------------------------------------------------------
*/

Route::get('/auth/google/redirect', [GoogleAuthController::class, 'redirect'])->name('google.redirect');
Route::get('/auth/google/callback', [GoogleAuthController::class, 'callback'])->name('google.callback');

/*
|--------------------------------------------------------------------------
| ADMIN AREA
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', AdminMiddleware::class])
    ->prefix('admin')
    ->as('admin.')
    ->group(function () {
        Route::get('/dashboard', [\App\Http\Controllers\Admin\AdminDashboardController::class, 'index'])->name('dashboard');


        // Statistik Dashboard
        Route::get('/dashboard-stats', [StatsController::class, 'index'])->name('dashboard.stats');

        // CRUD Produk
        Route::resource('products', ProductController::class);

        // Transaksi
        Route::get('/transactions', [TransactionController::class, 'index'])->name('transactions.index');
        Route::get('/history', [TransactionController::class, 'index'])->name('transactions.index');

        Route::delete('/transactions/{id}', [TransactionController::class, 'destroy'])->name('transactions.destroy');

        // Rekomendasi Produk
        Route::get('/rekomendasi', [ProductRecommendationController::class, 'index'])->name('rekomendasi.index');
        Route::post('/rekomendasi', [ProductRecommendationController::class, 'store'])->name('rekomendasi.store');
        Route::delete('/rekomendasi/{id}', [ProductRecommendationController::class, 'destroy'])->name('rekomendasi.destroy');
    });

/*
|--------------------------------------------------------------------------
| USER AREA
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])
    ->prefix('user')
    ->as('user.')
    ->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

        // Produk & Cart
        Route::get('/products', [UserProductController::class, 'index'])->name('products.index');
        Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
        Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
        Route::post('/cart/update', [CartController::class, 'update'])->name('cart.update');
        Route::post('/cart/remove', [CartController::class, 'remove'])->name('cart.remove');

        // Pembayaran Midtrans
        Route::post('/pay', [PaymentController::class, 'process'])->name('pay');
        Route::get('/pay', [PaymentController::class, 'payPage'])->name('pay.page');

        // Riwayat Transaksi User
        Route::get('/transactions', [UserTransactionController::class, 'index'])->name('transactions.index');
        Route::get('/history', [UserTransactionController::class, 'index'])->name('transactions.history');
    });
