@extends('admin.layouts.admin')
@section('title', 'Kelola Produk')

@section('content')
<div class="flex justify-between items-center mb-8">
    <h1 class="text-2xl font-bold text-dark flex items-center gap-3">
        <i class="fas fa-box text-primary"></i> Kelola Produk
    </h1>
    <a href="{{ route('admin.products.create') }}" class="inline-flex items-center gap-2 px-6 py-3 bg-islamic-gradient text-white rounded-xl font-semibold shadow-lg transition-all duration-300 hover:-translate-y-1 hover:shadow-xl">
        <i class="fas fa-plus"></i> Tambah Produk
    </a>
</div>

<div class="bg-white rounded-2xl shadow-lg overflow-hidden border border-gray-100">
    <div class="px-6 py-4 bg-gradient-to-r from-cream to-white border-b border-gray-100 flex items-center gap-3 font-semibold text-dark">
        <i class="fas fa-list text-primary"></i> Daftar Produk ({{ $products->count() }})
    </div>
    <div class="overflow-x-auto">
        @if($products->count() > 0)
            <table class="w-full">
                <thead>
                    <tr>
                        <th class="px-5 py-4 text-left bg-gradient-to-r from-cream to-white text-xs font-semibold uppercase tracking-wider text-dark border-b border-gray-100">Gambar</th>
                        <th class="px-5 py-4 text-left bg-gradient-to-r from-cream to-white text-xs font-semibold uppercase tracking-wider text-dark border-b border-gray-100">Nama Produk</th>
                        <th class="px-5 py-4 text-left bg-gradient-to-r from-cream to-white text-xs font-semibold uppercase tracking-wider text-dark border-b border-gray-100">Kategori</th>
                        <th class="px-5 py-4 text-left bg-gradient-to-r from-cream to-white text-xs font-semibold uppercase tracking-wider text-dark border-b border-gray-100">Deskripsi</th>
                        <th class="px-5 py-4 text-left bg-gradient-to-r from-cream to-white text-xs font-semibold uppercase tracking-wider text-dark border-b border-gray-100">Tanggal</th>
                        <th class="px-5 py-4 text-left bg-gradient-to-r from-cream to-white text-xs font-semibold uppercase tracking-wider text-dark border-b border-gray-100">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $product)
                    <tr class="hover:bg-gradient-to-r hover:from-primary/5 hover:to-secondary/5 transition-all duration-300">
                        <td class="px-5 py-4 border-b border-gray-50">
                            @if($product->gambar1)
                                <img src="{{ asset('storage/' . $product->gambar1) }}" alt="{{ $product->nama_produk }}" class="w-16 h-16 object-cover rounded-xl shadow-md">
                            @else
                                <div class="w-16 h-16 bg-gray-100 rounded-xl flex items-center justify-center">
                                    <i class="fas fa-image text-gray-300"></i>
                                </div>
                            @endif
                        </td>
                        <td class="px-5 py-4 border-b border-gray-50 font-semibold text-dark">{{ $product->nama_produk }}</td>
                        <td class="px-5 py-4 border-b border-gray-50">
                            <span class="inline-block px-4 py-1.5 bg-gradient-to-r from-primary/10 to-primary/15 text-primary rounded-full text-xs font-semibold">{{ $product->kategori }}</span>
                        </td>
                        <td class="px-5 py-4 border-b border-gray-50 text-gray-600 text-sm">{{ Str::limit($product->deskripsi, 50) }}</td>
                        <td class="px-5 py-4 border-b border-gray-50 text-gray-500 text-sm">{{ $product->tanggal_dibuat ? $product->tanggal_dibuat->format('d M Y') : '-' }}</td>
                        <td class="px-5 py-4 border-b border-gray-50">
                            <div class="flex gap-2">
                                <a href="{{ route('admin.products.edit', $product->id) }}" class="inline-flex items-center justify-center w-9 h-9 bg-gold-gradient text-dark rounded-lg shadow-md transition-all duration-300 hover:-translate-y-1 hover:shadow-lg" title="Edit">
                                    <i class="fas fa-edit text-sm"></i>
                                </a>
                                <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus produk ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="inline-flex items-center justify-center w-9 h-9 bg-gradient-to-r from-red-500 to-red-600 text-white rounded-lg shadow-md transition-all duration-300 hover:-translate-y-1 hover:shadow-lg" title="Hapus">
                                        <i class="fas fa-trash text-sm"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <div class="text-center py-16 px-8">
                <i class="fas fa-box-open text-6xl text-gray-200 mb-4 block"></i>
                <h3 class="text-lg font-semibold text-dark mb-2">Belum Ada Produk</h3>
                <p class="text-gray-500">Klik tombol "Tambah Produk" untuk menambahkan produk baru.</p>
            </div>
        @endif
    </div>
</div>
@endsection
