<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ProductRecommendation;

class ProductRecommendationController extends Controller
{
    public function index()
    {
        return Inertia::render('Admin/Recommendation/Index', [
            'products' => Product::all(),
            'recommendations' => ProductRecommendation::with('product')->latest()->get(),
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
        ]);

        ProductRecommendation::create([
            'product_id' => $request->product_id,
        ]);

        return redirect()->route('admin.rekomendasi.index')->with('message', 'Produk berhasil direkomendasikan');
    }

    public function destroy($id)
    {
        $recommendation = ProductRecommendation::findOrFail($id);
        $recommendation->delete();

        return redirect()->route('admin.rekomendasi.index')->with('message', 'Rekomendasi berhasil dihapus.');
    }

}
