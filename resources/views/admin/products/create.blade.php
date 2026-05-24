@extends('admin.layouts.admin')
@section('title', 'Tambah Produk')

@section('content')
<div class="flex justify-between items-center mb-8">
    <h1 class="text-2xl font-bold text-dark flex items-center gap-3">
        <i class="fas fa-plus-circle text-primary"></i> Tambah Produk Baru
    </h1>
    <a href="{{ route('admin.products.index') }}" class="inline-flex items-center gap-2 px-6 py-3 bg-gold-gradient text-dark rounded-xl font-semibold shadow-lg transition-all duration-300 hover:-translate-y-1 hover:shadow-xl">
        <i class="fas fa-arrow-left"></i> Kembali
    </a>
</div>

<div class="bg-white rounded-2xl shadow-lg overflow-hidden border border-gray-100">
    <div class="px-6 py-4 bg-gradient-to-r from-cream to-white border-b border-gray-100 flex items-center gap-3 font-semibold text-dark">
        <i class="fas fa-edit text-primary"></i> Form Tambah Produk
    </div>
    <div class="p-6">
        <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block mb-2 font-semibold text-dark text-sm" for="nama_produk">Nama Produk <span class="text-red-500">*</span></label>
                    <input type="text" name="nama_produk" id="nama_produk" 
                           class="w-full py-3 px-4 border-2 border-gray-200 rounded-xl font-sans transition-all duration-300 focus:outline-none focus:border-primary focus:ring-4 focus:ring-primary/10 hover:border-gray-300" 
                           value="{{ old('nama_produk') }}" required placeholder="Masukkan nama produk">
                    @error('nama_produk')
                        <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label class="block mb-2 font-semibold text-dark text-sm" for="kategori">Kategori <span class="text-red-500">*</span></label>
                    <select name="kategori" id="kategori" 
                            class="w-full py-3 px-4 border-2 border-gray-200 rounded-xl font-sans transition-all duration-300 focus:outline-none focus:border-primary focus:ring-4 focus:ring-primary/10 hover:border-gray-300 cursor-pointer appearance-none bg-[url('data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2212%22%20height%3D%2212%22%20viewBox%3D%220%200%2012%2012%22%3E%3Cpath%20fill%3D%22%23333%22%20d%3D%22M6%208L1%203h10z%22%2F%3E%3C%2Fsvg%3E')] bg-no-repeat bg-[right_1rem_center] pr-10" required>
                        <option value="">Pilih Kategori</option>
                        <option value="Gamis" {{ old('kategori') == 'Gamis' ? 'selected' : '' }}>Gamis</option>
                        <option value="Baju Koko" {{ old('kategori') == 'Baju Koko' ? 'selected' : '' }}>Baju Koko</option>
                        <option value="Songkok" {{ old('kategori') == 'Songkok' ? 'selected' : '' }}>Songkok</option>
                        <option value="Peci" {{ old('kategori') == 'Peci' ? 'selected' : '' }}>Peci</option>
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
                          placeholder="Masukkan deskripsi produk">{{ old('deskripsi') }}</textarea>
                @error('deskripsi')
                    <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span>
                @enderror
            </div>

            <h4 class="flex items-center gap-3 mt-10 mb-4 pb-3 border-b-2 border-gray-100 text-dark text-lg font-semibold">
                <i class="fas fa-images text-primary text-xl"></i> Gambar Produk
            </h4>
            <p class="text-gray-500 text-sm mb-6">Upload hingga 5 gambar produk (format: JPG, PNG, GIF, WebP.)</p>

            <div class="grid grid-cols-1 gap-4">
                <div>
                    <label class="block mb-2 font-medium text-dark text-sm">Upload Gambar (Maksimal 5) <span class="text-red-500">*</span></label>
                    <div id="dropZone" class="border-2 border-dashed border-gray-300 rounded-xl p-8 text-center transition-all duration-300 hover:border-primary hover:bg-primary/5 cursor-pointer">
                        <input type="file" name="gambar[]" id="gambarInput" 
                               class="hidden" 
                               accept="image/*" multiple>
                        <div class="flex flex-col items-center gap-3">
                            <div class="w-16 h-16 bg-primary/10 rounded-full flex items-center justify-center text-primary text-2xl">
                                <i class="fas fa-cloud-upload-alt"></i>
                            </div>
                            <div>
                                <p class="font-semibold text-dark">Klik atau drag & drop gambar di sini</p>
                                <p class="text-gray-500 text-sm mt-1">Format: JPG, PNG, GIF, WebP (Maksimal 5 gambar)</p>
                            </div>
                        </div>
                    </div>
                    <p id="fileCount" class="text-sm text-gray-500 mt-2"></p>
                    @error('gambar')
                        <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span>
                    @enderror
                    @error('gambar.*')
                        <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span>
                    @enderror
                </div>
                
                <!-- Preview Container -->
                <div id="previewContainer" class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-5 gap-4 mt-4"></div>
            </div>

            <div class="mt-10 pt-6 border-t-2 border-gray-100 flex gap-4">
                <button type="submit" class="inline-flex items-center gap-2 px-6 py-3 bg-islamic-gradient text-white rounded-xl font-semibold shadow-lg transition-all duration-300 hover:-translate-y-1 hover:shadow-xl">
                    <i class="fas fa-save"></i> Simpan Produk
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
const dropZone = document.getElementById('dropZone');
const fileInput = document.getElementById('gambarInput');
const previewContainer = document.getElementById('previewContainer');
const fileCount = document.getElementById('fileCount');

let selectedFiles = [];

// Click to open file dialog
dropZone.addEventListener('click', () => fileInput.click());

// Drag and drop events
dropZone.addEventListener('dragover', (e) => {
    e.preventDefault();
    dropZone.classList.add('border-primary', 'bg-primary/10');
});

dropZone.addEventListener('dragleave', (e) => {
    e.preventDefault();
    dropZone.classList.remove('border-primary', 'bg-primary/10');
});

dropZone.addEventListener('drop', (e) => {
    e.preventDefault();
    dropZone.classList.remove('border-primary', 'bg-primary/10');
    
    const files = Array.from(e.dataTransfer.files).filter(file => file.type.startsWith('image/'));
    handleFiles(files);
});

// File input change
fileInput.addEventListener('change', (e) => {
    const files = Array.from(e.target.files);
    handleFiles(files);
});

function handleFiles(files) {
    // Check max 5 files
    const remainingSlots = 5 - selectedFiles.length;
    
    if (remainingSlots <= 0) {
        alert('Maksimal 5 gambar yang dapat diupload!');
        return;
    }
    
    const filesToAdd = files.slice(0, remainingSlots);
    
    if (files.length > remainingSlots) {
        alert(`Hanya ${remainingSlots} gambar lagi yang dapat ditambahkan. ${files.length - remainingSlots} gambar diabaikan.`);
    }
    
    filesToAdd.forEach(file => {
        selectedFiles.push(file);
        createPreview(file, selectedFiles.length - 1);
    });
    
    updateFileInput();
    updateFileCount();
}

function createPreview(file, index) {
    const reader = new FileReader();
    
    reader.onload = function(e) {
        const previewDiv = document.createElement('div');
        previewDiv.className = 'relative group';
        previewDiv.id = `preview-${index}`;
        
        previewDiv.innerHTML = `
            <img src="${e.target.result}" class="w-full h-32 object-cover rounded-xl border-2 border-gray-200 group-hover:border-primary transition-colors">
            <button type="button" onclick="removeImage(${index})" 
                    class="absolute -top-2 -right-2 w-7 h-7 bg-red-500 text-white rounded-full flex items-center justify-center text-sm shadow-lg opacity-0 group-hover:opacity-100 transition-opacity hover:bg-red-600">
                <i class="fas fa-times"></i>
            </button>
            <p class="text-xs text-gray-500 mt-1 truncate">${file.name}</p>
        `;
        
        previewContainer.appendChild(previewDiv);
    }
    
    reader.readAsDataURL(file);
}

function removeImage(index) {
    selectedFiles.splice(index, 1);
    refreshPreviews();
    updateFileInput();
    updateFileCount();
}

function refreshPreviews() {
    previewContainer.innerHTML = '';
    selectedFiles.forEach((file, index) => {
        createPreview(file, index);
    });
}

function updateFileInput() {
    // Create a new DataTransfer to update the file input
    const dataTransfer = new DataTransfer();
    selectedFiles.forEach(file => dataTransfer.items.add(file));
    fileInput.files = dataTransfer.files;
}

function updateFileCount() {
    if (selectedFiles.length > 0) {
        fileCount.innerHTML = `<span class="text-primary font-medium">${selectedFiles.length}</span> dari 5 gambar dipilih`;
    } else {
        fileCount.innerHTML = '';
    }
}
</script>
@endpush
