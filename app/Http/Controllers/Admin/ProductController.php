<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Inertia\Inertia;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Tampilkan semua produk.
     */
    public function index()
    {
        return Inertia::render('Admin/Products/Index', [
            'products' => Product::latest()->get(),
        ]);
    }

    /**
     * Tampilkan form tambah produk.
     */
    public function create()
    {
        return Inertia::render('Admin/Products/Create');
    }

    /**
     * Simpan produk baru.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'category' => 'required|string|max:255',
            'stock' => 'required|integer|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('products', 'public');
        }

        Product::create($data);

        return redirect()->route('admin.products.index')
            ->with('success', 'Produk berhasil ditambahkan.');
    }

    /**
     * Tampilkan detail produk (opsional).
     */
    public function show(Product $product)
    {
        return Inertia::render('Admin/Products/Show', [
            'product' => $product
        ]);
    }

    /**
     * Tampilkan form edit produk.
     */
    public function edit(Product $product)
    {
        // Tambahkan URL lengkap untuk preview gambar
        $product->image_url = $product->image ? asset('storage/' . $product->image) : null;

        return Inertia::render('Admin/Products/Edit', [
            'product' => $product,
        ]);
    }

    /**
     * Update data produk.
     */
    public function update(Request $request, Product $product)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'category' => 'required|string|max:255',
            'stock' => 'required|integer|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($product->image && Storage::disk('public')->exists($product->image)) {
                Storage::disk('public')->delete($product->image);
            }

            $data['image'] = $request->file('image')->store('products', 'public');
        }

        $product->update($data);

        return redirect()->route('admin.products.index')
            ->with('success', 'Produk berhasil diperbarui.');
    }

    /**
     * Hapus produk.
     */
    public function destroy(Product $product)
    {
        try {
            // Hapus gambar jika ada
            if ($product->image && Storage::disk('public')->exists($product->image)) {
                Storage::disk('public')->delete($product->image);
            }

            $product->delete();

            return redirect()->route('admin.products.index')
                ->with('success', 'Produk berhasil dihapus!');
        } catch (\Exception $e) {
            return redirect()->route('admin.products.index')
                ->with('error', 'Gagal menghapus produk: ' . $e->getMessage());
        }
    }
}
