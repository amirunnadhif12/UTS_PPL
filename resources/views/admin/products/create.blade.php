@extends('admin.layouts.admin')
@section('title', 'Tambah Produk')

@push('styles')
<style>
    .section-title {
        display: flex;
        align-items: center;
        gap: 0.8rem;
        margin: 2.5rem 0 1rem;
        padding-bottom: 0.8rem;
        border-bottom: 2px solid #eee;
        color: var(--dark);
        font-size: 1.1rem;
        font-weight: 600;
    }
    .section-title i {
        color: var(--primary);
        font-size: 1.2rem;
    }
    .required-star {
        color: #dc3545;
        margin-left: 2px;
    }
    .form-actions {
        margin-top: 2.5rem;
        padding-top: 1.5rem;
        border-top: 2px solid #eee;
        display: flex;
        gap: 1rem;
    }
    .image-upload-grid {
        display: grid;
        grid-template-columns: repeat(5, 1fr);
        gap: 1rem;
    }
    @media (max-width: 992px) {
        .image-upload-grid {
            grid-template-columns: repeat(3, 1fr);
        }
    }
    @media (max-width: 576px) {
        .image-upload-grid {
            grid-template-columns: repeat(2, 1fr);
        }
    }
</style>
@endpush

@section('content')
<div class="admin-header">
    <h1><i class="fas fa-plus-circle"></i> Tambah Produk Baru</h1>
    <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">
        <i class="fas fa-arrow-left"></i> Kembali
    </a>
</div>

<div class="card">
    <div class="card-header">
        <i class="fas fa-edit"></i> Form Tambah Produk
    </div>
    <div class="card-body">
        <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label class="form-label" for="nama_produk">Nama Produk <span style="color: red;">*</span></label>
                        <input type="text" name="nama_produk" id="nama_produk" class="form-control" 
                               value="{{ old('nama_produk') }}" required placeholder="Masukkan nama produk">
                        @error('nama_produk')
                            <span class="form-text" style="color: red;">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label class="form-label" for="kategori">Kategori <span style="color: red;">*</span></label>
                        <select name="kategori" id="kategori" class="form-control" required>
                            <option value="">Pilih Kategori</option>
                            <option value="Jubah" {{ old('kategori') == 'Jubah' ? 'selected' : '' }}>Jubah</option>
                            <option value="Baju Koko" {{ old('kategori') == 'Baju Koko' ? 'selected' : '' }}>Baju Koko</option>
                            <option value="Songkok" {{ old('kategori') == 'Songkok' ? 'selected' : '' }}>Songkok</option>
                            <option value="Peci" {{ old('kategori') == 'Peci' ? 'selected' : '' }}>Peci</option>
                        </select>
                        @error('kategori')
                            <span class="form-text" style="color: red;">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label class="form-label" for="deskripsi">Deskripsi Produk</label>
                <textarea name="deskripsi" id="deskripsi" class="form-control" 
                          placeholder="Masukkan deskripsi produk">{{ old('deskripsi') }}</textarea>
                @error('deskripsi')
                    <span class="form-text" style="color: red;">{{ $message }}</span>
                @enderror
            </div>

            <h4 class="section-title">
                <i class="fas fa-images"></i> Gambar Produk
            </h4>
            <p class="form-text" style="margin-bottom: 1.5rem;">Upload hingga 5 gambar produk (format: JPG, PNG, GIF, WebP. Max: 2MB per gambar)</p>

            <div class="image-upload-grid">
                @for($i = 1; $i <= 5; $i++)
                <div>
                    <div class="form-group">
                        <label class="form-label" for="gambar{{ $i }}">Gambar {{ $i }}</label>
                        <input type="file" name="gambar{{ $i }}" id="gambar{{ $i }}" class="form-control" 
                               accept="image/*" onchange="previewImage(this, 'preview{{ $i }}')">
                        <div id="preview{{ $i }}" class="image-preview"></div>
                        @error('gambar' . $i)
                            <span class="form-text" style="color: red;">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                @endfor
            </div>

            <div class="form-actions">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> Simpan Produk
                </button>
                <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">
                    <i class="fas fa-times"></i> Batal
                </a>
            </div>
        </form>
    </div>
</div>
@endsection

@push('scripts')
<script>
function previewImage(input, previewId) {
    const preview = document.getElementById(previewId);
    preview.innerHTML = '';
    
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = function(e) {
            const img = document.createElement('img');
            img.src = e.target.result;
            img.style.width = '100px';
            img.style.height = '100px';
            img.style.objectFit = 'cover';
            img.style.borderRadius = '8px';
            img.style.border = '2px solid #e0e0e0';
            preview.appendChild(img);
        }
        reader.readAsDataURL(input.files[0]);
    }
}
</script>
@endpush
