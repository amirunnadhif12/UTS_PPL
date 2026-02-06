@extends('admin.layouts.admin')
@section('title', 'Edit Produk')

@section('content')
<div class="flex justify-between items-center mb-8">
    <h1 class="text-2xl font-bold text-dark flex items-center gap-3">
        <i class="fas fa-edit text-primary"></i> Edit Produk
    </h1>
    <a href="{{ route('admin.products.index') }}" class="inline-flex items-center gap-2 px-6 py-3 bg-gold-gradient text-dark rounded-xl font-semibold shadow-lg transition-all duration-300 hover:-translate-y-1 hover:shadow-xl">
        <i class="fas fa-arrow-left"></i> Kembali
    </a>
</div>

<div class="bg-white rounded-2xl shadow-lg overflow-hidden border border-gray-100">
    <div class="px-6 py-4 bg-gradient-to-r from-cream to-white border-b border-gray-100 flex items-center gap-3 font-semibold text-dark">
        <i class="fas fa-edit text-primary"></i> Form Edit Produk
    </div>
    <div class="p-6">
        <form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block mb-2 font-semibold text-dark text-sm" for="nama_produk">Nama Produk <span class="text-red-500">*</span></label>
                    <input type="text" name="nama_produk" id="nama_produk" 
                           class="w-full py-3 px-4 border-2 border-gray-200 rounded-xl font-sans transition-all duration-300 focus:outline-none focus:border-primary focus:ring-4 focus:ring-primary/10 hover:border-gray-300" 
                           value="{{ old('nama_produk', $product->nama_produk) }}" required placeholder="Masukkan nama produk">
                    @error('nama_produk')
                        <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label class="block mb-2 font-semibold text-dark text-sm" for="kategori">Kategori <span class="text-red-500">*</span></label>
                    <select name="kategori" id="kategori" 
                            class="w-full py-3 px-4 border-2 border-gray-200 rounded-xl font-sans transition-all duration-300 focus:outline-none focus:border-primary focus:ring-4 focus:ring-primary/10 hover:border-gray-300 cursor-pointer appearance-none bg-[url('data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2212%22%20height%3D%2212%22%20viewBox%3D%220%200%2012%2012%22%3E%3Cpath%20fill%3D%22%23333%22%20d%3D%22M6%208L1%203h10z%22%2F%3E%3C%2Fsvg%3E')] bg-no-repeat bg-[right_1rem_center] pr-10" required>
                        <option value="">Pilih Kategori</option>
                        <option value="Jubah" {{ old('kategori', $product->kategori) == 'Jubah' ? 'selected' : '' }}>Jubah</option>
                        <option value="Baju Koko" {{ old('kategori', $product->kategori) == 'Baju Koko' ? 'selected' : '' }}>Baju Koko</option>
                        <option value="Songkok" {{ old('kategori', $product->kategori) == 'Songkok' ? 'selected' : '' }}>Songkok</option>
                        <option value="Peci" {{ old('kategori', $product->kategori) == 'Peci' ? 'selected' : '' }}>Peci</option>
                    </select>
                    @error('kategori')
                        <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="mt-6">
                <label class="block mb-2 font-semibold text-dark text-sm" for="deskripsi">Deskripsi Produk</label>
                <textarea name="deskripsi" id="deskripsi" 
                          class="w-full py-3 px-4 border-2 border-gray-200 rounded-xl font-sans transition-all duration-300 focus:outline-none focus:border-primary focus:ring-4 focus:ring-primary/10 hover:border-gray-300 min-h-32 resize-y" 
                          placeholder="Masukkan deskripsi produk">{{ old('deskripsi', $product->deskripsi) }}</textarea>
                @error('deskripsi')
                    <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span>
                @enderror
            </div>

            <h4 class="flex items-center gap-3 mt-10 mb-4 pb-3 border-b-2 border-gray-100 text-dark text-lg font-semibold">
                <i class="fas fa-images text-primary text-xl"></i> Gambar Produk
            </h4>
            <p class="text-gray-500 text-sm mb-6">Upload gambar baru untuk mengganti yang lama (format: JPG, PNG, GIF, WebP. Max: 2MB per gambar)</p>

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
            <div class="bg-gradient-to-r from-cream to-white rounded-2xl p-6 mb-6 border border-gray-100">
                <label class="font-semibold text-dark mb-4 flex items-center gap-2">
                    <i class="fas fa-photo-video text-primary"></i> Gambar Saat Ini:
                </label>
                <div class="flex flex-wrap gap-4">
                    @for($i = 1; $i <= 5; $i++)
                        @php $field = 'gambar' . $i; @endphp
                        @if($product->$field)
                        <div class="relative w-28 h-28 group">
                            <img src="{{ asset('storage/' . $product->$field) }}" alt="Gambar {{ $i }}" class="w-full h-full object-cover rounded-xl border-2 border-gray-200 transition-all duration-300 group-hover:border-primary group-hover:scale-105">
                            <button type="button" 
                                    onclick="deleteImage('{{ $product->id }}', '{{ $field }}')" 
                                    title="Hapus Gambar"
                                    class="absolute -top-2 -right-2 w-7 h-7 bg-red-500 text-white border-2 border-white rounded-full flex items-center justify-center text-xs shadow-lg transition-all duration-300 hover:scale-110 hover:bg-red-600">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                        @endif
                    @endfor
                </div>
            </div>
            @endif

            <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-5 gap-4">
                @for($i = 1; $i <= 5; $i++)
                @php $field = 'gambar' . $i; @endphp
                <div>
                    <label class="block mb-2 font-medium text-dark text-sm" for="gambar{{ $i }}">
                        {{ $product->$field ? 'Ganti' : 'Upload' }} Gambar {{ $i }}
                    </label>
                    <input type="file" name="gambar{{ $i }}" id="gambar{{ $i }}" 
                           class="w-full py-2 px-3 border-2 border-gray-200 rounded-xl text-sm transition-all duration-300 focus:outline-none focus:border-primary focus:ring-4 focus:ring-primary/10 file:mr-2 file:py-1 file:px-2 file:rounded-lg file:border-0 file:bg-primary/10 file:text-primary file:font-medium file:cursor-pointer" 
                           accept="image/*" onchange="previewImage(this, 'preview{{ $i }}')">
                    <div id="preview{{ $i }}" class="mt-2"></div>
                    @error('gambar' . $i)
                        <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span>
                    @enderror
                </div>
                @endfor
            </div>

            <div class="mt-10 pt-6 border-t-2 border-gray-100 flex gap-4">
                <button type="submit" class="inline-flex items-center gap-2 px-6 py-3 bg-islamic-gradient text-white rounded-xl font-semibold shadow-lg transition-all duration-300 hover:-translate-y-1 hover:shadow-xl">
                    <i class="fas fa-save"></i> Update Produk
                </button>
                <a href="{{ route('admin.products.index') }}" class="inline-flex items-center gap-2 px-6 py-3 bg-gray-200 text-gray-700 rounded-xl font-semibold transition-all duration-300 hover:bg-gray-300">
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
            img.className = 'w-24 h-24 object-cover rounded-xl border-2 border-gray-200';
            preview.appendChild(img);
        }
        reader.readAsDataURL(input.files[0]);
    }
}

function deleteImage(productId, imageField) {
    if (confirm('Hapus gambar ini?')) {
        const form = document.createElement('form');
        form.method = 'POST';
        form.action = `/admin/products/${productId}/image/${imageField}`;
        
        const csrfInput = document.createElement('input');
        csrfInput.type = 'hidden';
        csrfInput.name = '_token';
        csrfInput.value = '{{ csrf_token() }}';
        
        const methodInput = document.createElement('input');
        methodInput.type = 'hidden';
        methodInput.name = '_method';
        methodInput.value = 'DELETE';
        
        form.appendChild(csrfInput);
        form.appendChild(methodInput);
        document.body.appendChild(form);
        form.submit();
    }
}
</script>
@endpush
