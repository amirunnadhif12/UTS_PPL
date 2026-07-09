<?php
namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

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
            'nama_produk' => [
                'required', 'string', 'max:255',
                Rule::unique('products')->where(function ($query) use ($request) {
                    return $query->where('kategori', $request->kategori);
                }),
            ],
            'kategori' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',

            'gambar' => 'required|array|min:1|max:5',
            'gambar.*' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:5120',
        ], [
            'nama_produk.required' => 'Nama produk wajib diisi.',
            'nama_produk.string' => 'Nama produk harus berupa teks.',
            'nama_produk.max' => 'Nama produk tidak boleh lebih dari 255 karakter.',
            'nama_produk.unique' => 'Nama produk sudah ada dalam kategori ini.',
            'kategori.required' => 'Kategori wajib diisi.',
            'kategori.string' => 'Kategori harus berupa teks.',
            'kategori.max' => 'Kategori tidak boleh lebih dari 255 karakter.',
            'gambar.required' => 'Gambar produk wajib diupload minimal 1.',
            'gambar.array' => 'Gambar produk harus berupa array.',
            'gambar.min' => 'Gambar produk wajib diupload minimal 1.',
            'gambar.max' => 'Gambar produk tidak boleh lebih dari 5.',
            'gambar.*.required' => 'Setiap gambar produk wajib diupload.',
            'gambar.*.image' => 'Setiap file harus berupa gambar.',
            'gambar.*.mimes' => 'Format gambar harus berupa jpeg, png, jpg, gif, atau webp.',
            'gambar.*.max' => 'Ukuran gambar tidak boleh lebih dari 5 MB.',
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

        // 1. Optimistic Locking (BUG-003)
        $lastUpdatedAt = $request->input('last_updated_at');
        if ($lastUpdatedAt) {
            $currentUpdatedAt = $product->tanggal_update ? $product->tanggal_update->timestamp : ($product->tanggal_dibuat ? $product->tanggal_dibuat->timestamp : null);
            if ($currentUpdatedAt && (string)$lastUpdatedAt !== (string)$currentUpdatedAt) {
                return back()->withErrors([
                    'nama_produk' => 'Data produk ini telah diubah oleh sesi atau tab lain. Silakan muat ulang halaman untuk mendapatkan data terbaru.'
                ])->withInput();
            }
        }

        // 2. Identify remaining and deleted images (BUG-002, BUG-005)
        $oldImages = [];
        for ($i = 1; $i <= 5; $i++) {
            $field = 'gambar' . $i;
            if ($product->$field) {
                $oldImages[$field] = $product->$field;
            }
        }

        $deleteFields = $request->input('delete_images', []);
        $remainingImages = [];
        foreach ($oldImages as $field => $path) {
            if (!in_array($field, $deleteFields)) {
                $remainingImages[] = $path;
            }
        }

        $hasRemainingImages = count($remainingImages) > 0;

        // 3. Validation
        $rules = [
            'nama_produk' => [
                'required', 'string', 'max:255',
                Rule::unique('products')->where(function ($query) use ($request) {
                    return $query->where('kategori', $request->kategori);
                })->ignore($product->id),
            ],
            'kategori' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',

            'gambar' => ($hasRemainingImages ? 'nullable' : 'required') . '|array|max:' . (5 - count($remainingImages)),
            'gambar.*' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:5120',
        ];

        $request->validate($rules, [
            'nama_produk.required' => 'Nama produk wajib diisi.',
            'nama_produk.string' => 'Nama produk harus berupa teks.',
            'nama_produk.max' => 'Nama produk tidak boleh lebih dari 255 karakter.',
            'nama_produk.unique' => 'Nama produk sudah ada dalam kategori ini.',
            'kategori.required' => 'Kategori wajib diisi.',
            'kategori.string' => 'Kategori harus berupa teks.',
            'kategori.max' => 'Kategori tidak boleh lebih dari 255 karakter.',
            'gambar.required' => 'Gambar produk wajib diupload minimal 1.',
            'gambar.array' => 'Gambar produk harus berupa array.',
            'gambar.max' => 'Jumlah gambar baru melebihi batas maksimal 5 gambar.',
            'gambar.*.required' => 'Setiap gambar produk wajib diupload.',
            'gambar.*.image' => 'Setiap file harus berupa gambar.',
            'gambar.*.mimes' => 'Format gambar harus berupa jpeg, png, jpg, gif, atau webp.',
            'gambar.*.max' => 'Ukuran gambar tidak boleh lebih dari 5 MB.',
        ]);

        $data = $request->only(['nama_produk', 'kategori', 'deskripsi']);

        // 4. Handle new uploaded images
        $newImages = [];
        if ($request->hasFile('gambar')) {
            foreach ($request->file('gambar') as $file) {
                $newImages[] = $file->store('products', 'public');
            }
        }

        // 5. Combine and arrange contiguously (BUG-005)
        $allImages = array_merge($remainingImages, $newImages);
        $allImages = array_slice($allImages, 0, 5); // Safety limit

        // 6. Delete physical files that are removed (BUG-002)
        foreach ($oldImages as $path) {
            if (!in_array($path, $allImages)) {
                Storage::disk('public')->delete($path);
            }
        }

        // 7. Map to the database fields
        for ($i = 1; $i <= 5; $i++) {
            $field = 'gambar' . $i;
            $data[$field] = $allImages[$i - 1] ?? null;
        }

        // 8. Update timestamps
        $data['tanggal_update'] = now();

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
     * Bulk delete products.
     */
    public function bulkDestroy(Request $request)
    {
        $request->validate([
            'ids' => 'required|array|min:1',
            'ids.*' => 'required|integer|exists:products,id',
        ]);

        $products = Product::whereIn('id', $request->ids)->get();

        foreach ($products as $product) {
            for ($i = 1; $i <= 5; $i++) {
                $field = 'gambar' . $i;
                if ($product->$field) {
                    Storage::disk('public')->delete($product->$field);
                }
            }
            $product->delete();
        }

        return redirect()->route('admin.products.index')
            ->with('success', count($request->ids) . ' produk berhasil dihapus!');
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
