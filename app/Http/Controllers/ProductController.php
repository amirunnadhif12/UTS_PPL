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
        $products = Product::orderBy('tanggal_dibuat', 'desc')->get();
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
            'gambar' => 'nullable|array|max:5',
            'gambar.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:5120',
        ]);

        $data = $request->only(['nama_produk', 'kategori', 'deskripsi']);

        // Handle multiple image uploads
        if ($request->hasFile('gambar')) {
            $images = $request->file('gambar');
            $imageCount = min(count($images), 5); // Maksimal 5 gambar
            
            for ($i = 0; $i < $imageCount; $i++) {
                $field = 'gambar' . ($i + 1);
                $data[$field] = $images[$i]->store('products', 'public');
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
            'gambar' => 'nullable|array|max:5',
            'gambar.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:5120',
        ]);

        $data = $request->only(['nama_produk', 'kategori', 'deskripsi']);

        // Handle multiple new image uploads - fill empty slots
        if ($request->hasFile('gambar')) {
            $images = $request->file('gambar');
            $imageIndex = 0;
            
            // Find empty slots and fill them with new images
            for ($i = 1; $i <= 5 && $imageIndex < count($images); $i++) {
                $field = 'gambar' . $i;
                if (!$product->$field) {
                    $data[$field] = $images[$imageIndex]->store('products', 'public');
                    $imageIndex++;
                }
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
        if (!in_array($imageField, ['gambar1', 'gambar2', 'gambar3', 'gambar4', 'gambar5'])) {
            abort(403, 'Field tidak diizinkan.');
        }

        $product = Product::findOrFail($id);
        
        if ($product->$imageField) {
            Storage::disk('public')->delete($product->$imageField);
            $product->update([$imageField => null]);
        }

        return back()->with('success', 'Gambar berhasil dihapus!');
    }
}
