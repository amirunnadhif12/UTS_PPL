@extends('admin.layouts.admin')
@section('title', 'Kelola Produk')

@section('content')
<div class="admin-header">
    <h1><i class="fas fa-box"></i> Kelola Produk</h1>
    <a href="{{ route('admin.products.create') }}" class="btn btn-primary">
        <i class="fas fa-plus"></i> Tambah Produk
    </a>
</div>

<div class="card">
    <div class="card-header">
        <i class="fas fa-list"></i> Daftar Produk ({{ $products->count() }})
    </div>
    <div class="card-body" style="padding: 0;">
        @if($products->count() > 0)
            <table class="table">
                <thead>
                    <tr>
                        <th>Gambar</th>
                        <th>Nama Produk</th>
                        <th>Kategori</th>
                        <th>Deskripsi</th>
                        <th>Tanggal Dibuat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $product)
                    <tr>
                        <td>
                            @if($product->gambar1)
                                <img src="{{ asset('storage/' . $product->gambar1) }}" alt="{{ $product->nama_produk }}">
                            @else
                                <div style="width: 60px; height: 60px; background: #eee; border-radius: 8px; display: flex; align-items: center; justify-content: center;">
                                    <i class="fas fa-image" style="color: #ccc;"></i>
                                </div>
                            @endif
                        </td>
                        <td><strong>{{ $product->nama_produk }}</strong></td>
                        <td><span class="badge badge-primary">{{ $product->kategori }}</span></td>
                        <td>{{ Str::limit($product->deskripsi, 50) }}</td>
                        <td>{{ $product->tanggal_dibuat ? $product->tanggal_dibuat->format('d M Y') : '-' }}</td>
                        <td>
                            <div class="actions">
                                <a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-secondary btn-sm" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus produk ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" title="Hapus">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <div class="empty-state">
                <i class="fas fa-box-open"></i>
                <h3>Belum Ada Produk</h3>
                <p>Klik tombol "Tambah Produk" untuk menambahkan produk baru.</p>
            </div>
        @endif
    </div>
</div>
@endsection
