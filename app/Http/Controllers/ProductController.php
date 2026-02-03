<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource (public).
     */
    public function index(Request $request)
    {
        $query = Product::query();
        
        if ($request->has('category') && $request->category != 'all') {
            $query->where('kategori', $request->category);
        }
        
        $products = $query->orderBy('tanggal_dibuat', 'desc')->get();
        $categories = Product::select('kategori')->distinct()->pluck('kategori');
        
        return view('products', compact('products', 'categories'));
    }

    /**
     * Admin: Display all products.
     */
    public function adminIndex()
    {
        $products = Product::orderBy('tanggal_dibuat', 'desc')->get();
        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_produk' => 'required|string|max:255',
            'kategori' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'gambar1' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'gambar2' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'gambar3' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'gambar4' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'gambar5' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'link_shopee' => 'nullable|url|max:500',
            'link_tokopedia' => 'nullable|url|max:500',
            'link_lazada' => 'nullable|url|max:500',
        ]);

        $data = $request->only(['nama_produk', 'kategori', 'deskripsi', 'link_shopee', 'link_tokopedia', 'link_lazada']);

        // Handle image uploads
        for ($i = 1; $i <= 5; $i++) {
            $field = 'gambar' . $i;
            if ($request->hasFile($field)) {
                $data[$field] = $request->file($field)->store('products', 'public');
            }
        }

        Product::create($data);

        return redirect()->route('admin.products.index')
            ->with('success', 'Produk berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::findOrFail($id);
        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::findOrFail($id);
        return view('admin.products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $product = Product::findOrFail($id);

        $request->validate([
            'nama_produk' => 'required|string|max:255',
            'kategori' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'gambar1' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'gambar2' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'gambar3' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'gambar4' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'gambar5' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'link_shopee' => 'nullable|url|max:500',
            'link_tokopedia' => 'nullable|url|max:500',
            'link_lazada' => 'nullable|url|max:500',
        ]);

        $data = $request->only(['nama_produk', 'kategori', 'deskripsi', 'link_shopee', 'link_tokopedia', 'link_lazada']);

        // Handle image uploads
        for ($i = 1; $i <= 5; $i++) {
            $field = 'gambar' . $i;
            if ($request->hasFile($field)) {
                // Delete old image if exists
                if ($product->$field) {
                    Storage::disk('public')->delete($product->$field);
                }
                $data[$field] = $request->file($field)->store('products', 'public');
            }
        }

        $product->update($data);

        return redirect()->route('admin.products.index')
            ->with('success', 'Produk berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);

        // Delete all images
        for ($i = 1; $i <= 5; $i++) {
            $field = 'gambar' . $i;
            if ($product->$field) {
                Storage::disk('public')->delete($product->$field);
            }
        }

        $product->delete();

        return redirect()->route('admin.products.index')
            ->with('success', 'Produk berhasil dihapus!');
    }

    /**
     * Delete specific image from product.
     */
    public function deleteImage(string $id, string $imageField)
    {
        $product = Product::findOrFail($id);
        
        if ($product->$imageField) {
            Storage::disk('public')->delete($product->$imageField);
            $product->update([$imageField => null]);
        }

        return back()->with('success', 'Gambar berhasil dihapus!');
    }
}
