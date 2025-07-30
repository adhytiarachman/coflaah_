<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Inertia\Inertia;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // Bisa digunakan untuk binding, helper, atau dependency injection global
        // Contoh jika kamu punya helper:
        // require_once app_path('Helpers/my_helper.php');
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Untuk menghindari error di migration MySQL lama (index length too long)
        Schema::defaultStringLength(191);

        // Share data ke semua halaman Inertia
        Inertia::share([
            // ✅ Flash message
            'flash' => fn() => [
                'success' => session('success'),
                'error' => session('error'),
            ],

            // ✅ Authenticated user
            'auth' => fn() => [
                'user' => Auth::user(),
            ],

            // ✅ Jumlah item keranjang (untuk icon 🛒 di navbar)
            'cart_count' => fn() => count(Session::get('cart', [])),
            'csrf_token' => fn() => csrf_token(),
        ]);
    }
}
