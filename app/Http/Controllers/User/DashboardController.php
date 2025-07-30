<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use App\Models\ProductRecommendation;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // Ambil rekomendasi produk dari tabel relasi
        $recommendations = ProductRecommendation::with('product')
            ->latest()
            ->take(6)
            ->get()
            ->map(function ($rec) {
                return [
                    'id' => $rec->product->id,
                    'name' => $rec->product->name,
                    'description' => $rec->product->description,
                    'price' => $rec->product->price,
                    'image_url' => asset('storage/' . $rec->product->image), // Sesuaikan field jika nama kolom berbeda
                ];
            });

        return Inertia::render('User/Dashboard', [
            'recommendations' => $recommendations,
        ]);
    }
}
