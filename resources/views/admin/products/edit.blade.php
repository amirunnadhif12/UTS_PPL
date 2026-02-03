@extends('admin.layouts.admin')
@section('title', 'Edit Produk')

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
    .marketplace-label {
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }
    .marketplace-label .shopee { color: #EE4D2D; }
    .marketplace-label .tokopedia { color: #42B549; }
    .marketplace-label .lazada { color: #0F146D; }
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
    .marketplace-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 1rem;
    }
    @media (max-width: 768px) {
        .marketplace-grid {
            grid-template-columns: 1fr;
        }
    }
    .current-images {
        background: linear-gradient(135deg, var(--cream) 0%, #fff 100%);
        border-radius: 16px;
        padding: 1.5rem;
        margin-bottom: 1.5rem;
        border: 1px solid #eee;
    }
    .current-images-label {
        font-weight: 600;
        color: var(--dark);
        margin-bottom: 1rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }
    .current-images-label i {
        color: var(--primary);
    }
</style>
@endpush

@section('content')
<div class="admin-header">
    <h1><i class="fas fa-edit"></i> Edit Produk</h1>
    <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">
        <i class="fas fa-arrow-left"></i> Kembali
    </a>
</div>

<div class="card">
    <div class="card-header">
        <i class="fas fa-edit"></i> Form Edit Produk
    </div>
    <div class="card-body">
        <form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label class="form-label" for="nama_produk">Nama Produk <span style="color: red;">*</span></label>
                        <input type="text" name="nama_produk" id="nama_produk" class="form-control" 
                               value="{{ old('nama_produk', $product->nama_produk) }}" required placeholder="Masukkan nama produk">
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
                            <option value="Jubah" {{ old('kategori', $product->kategori) == 'Jubah' ? 'selected' : '' }}>Jubah</option>
                            <option value="Baju Koko" {{ old('kategori', $product->kategori) == 'Baju Koko' ? 'selected' : '' }}>Baju Koko</option>
                            <option value="Songkok" {{ old('kategori', $product->kategori) == 'Songkok' ? 'selected' : '' }}>Songkok</option>
                            <option value="Peci" {{ old('kategori', $product->kategori) == 'Peci' ? 'selected' : '' }}>Peci</option>
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
                          placeholder="Masukkan deskripsi produk">{{ old('deskripsi', $product->deskripsi) }}</textarea>
                @error('deskripsi')
                    <span class="form-text" style="color: red;">{{ $message }}</span>
                @enderror
            </div>

            <h4 class="section-title">
                <i class="fas fa-images"></i> Gambar Produk
            </h4>
            <p class="form-text" style="margin-bottom: 1.5rem;">Upload gambar baru untuk mengganti yang lama (format: JPG, PNG, GIF, WebP. Max: 2MB per gambar)</p>

            <!-- Current Images -->
            @php
                $hasImages = false;
                for ($i = 1; $i <= 5; $i++) {
                    $field = 'gambar' . $i;
                    if ($product->$field) {
                        $hasImages = true;
                        break;
                    }
                }
            @endphp

            @if($hasImages)
            <div class="current-images">
                <label class="current-images-label"><i class="fas fa-photo-video"></i> Gambar Saat Ini:</label>
                <div class="image-preview" style="display: flex; flex-wrap: wrap; gap: 1rem;">
                    @for($i = 1; $i <= 5; $i++)
                        @php $field = 'gambar' . $i; @endphp
                        @if($product->$field)
                        <div class="image-preview-item">
                            <img src="{{ asset('storage/' . $product->$field) }}" alt="Gambar {{ $i }}">
                            <form action="{{ route('admin.products.deleteImage', [$product->id, $field]) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="delete-btn" onclick="return confirm('Hapus gambar ini?')" title="Hapus Gambar">
                                    <i class="fas fa-times"></i>
                                </button>
                            </form>
                        </div>
                        @endif
                    @endfor
                </div>
            </div>
            @endif

            <div class="image-upload-grid">
                @for($i = 1; $i <= 5; $i++)
                @php $field = 'gambar' . $i; @endphp
                <div>
                    <div class="form-group">
                        <label class="form-label" for="gambar{{ $i }}">
                            {{ $product->$field ? 'Ganti' : 'Upload' }} Gambar {{ $i }}
                        </label>
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

            <h4 class="section-title">
                <i class="fas fa-shopping-bag"></i> Link Marketplace
            </h4>
            <p class="form-text" style="margin-bottom: 1.5rem;">Masukkan link produk di marketplace (opsional)</p>

            <div class="marketplace-grid">
                <div class="form-group">
                    <label class="form-label marketplace-label" for="link_shopee">
                        <i class="fas fa-shopping-cart shopee"></i> Link Shopee
                    </label>
                    <input type="url" name="link_shopee" id="link_shopee" class="form-control" 
                           value="{{ old('link_shopee', $product->link_shopee) }}" placeholder="https://shopee.co.id/...">
                    @error('link_shopee')
                        <span class="form-text" style="color: red;">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="form-label marketplace-label" for="link_tokopedia">
                        <i class="fas fa-store tokopedia"></i> Link Tokopedia
                    </label>
                    <input type="url" name="link_tokopedia" id="link_tokopedia" class="form-control" 
                           value="{{ old('link_tokopedia', $product->link_tokopedia) }}" placeholder="https://tokopedia.com/...">
                    @error('link_tokopedia')
                        <span class="form-text" style="color: red;">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="form-label marketplace-label" for="link_lazada">
                        <i class="fas fa-shopping-basket lazada"></i> Link Lazada
                    </label>
                    <input type="url" name="link_lazada" id="link_lazada" class="form-control" 
                           value="{{ old('link_lazada', $product->link_lazada) }}" placeholder="https://lazada.co.id/...">
                    @error('link_lazada')
                        <span class="form-text" style="color: red;">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="form-actions">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> Update Produk
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
