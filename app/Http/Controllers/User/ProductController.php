<?php

// app/Http/Controllers/User/ProductController.php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all()->map(function ($product) {
            return [
                'id' => $product->id,
                'name' => $product->name,
                'category' => $product->category,
                'price' => $product->price,
                'stock' => $product->stock,
                'image_url' => $product->image
                    ? asset('storage/' . $product->image)
                    : null,
            ];
        });

        return Inertia::render('User/Products', [
            'products' => $products,
        ]);
    }
}
