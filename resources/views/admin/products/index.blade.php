@extends('admin.layouts.admin')
@section('title', 'Kelola Produk')

@section('content')
<div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-8">
    <h1 class="text-2xl font-bold text-dark flex items-center gap-3">
        <i class="fas fa-box text-primary"></i> Kelola Produk
    </h1>
    <a href="{{ route('admin.products.create') }}" class="inline-flex items-center gap-2 px-6 py-3 bg-islamic-gradient text-white rounded-xl font-semibold shadow-lg transition-all duration-300 hover:-translate-y-1 hover:shadow-xl">
        <i class="fas fa-plus"></i> Tambah Produk
    </a>
</div>

<!-- Search -->
<div class="mb-6">
    <div class="relative">
        <input type="text" id="searchProduct" placeholder="Cari produk berdasarkan nama atau kategori..." class="w-full py-3 pl-12 pr-4 bg-white border-2 border-gray-200 rounded-xl text-gray-700 placeholder-gray-400 transition-all duration-300 focus:outline-none focus:border-primary focus:ring-4 focus:ring-primary/10 hover:border-gray-300 shadow-sm" oninput="filterProducts()">
        <div class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400">
            <i class="fas fa-search"></i>
        </div>
    </div>
</div>

<div class="bg-white rounded-2xl shadow-lg overflow-hidden border border-gray-100">
    <div class="px-6 py-4 bg-gradient-to-r from-cream to-white border-b border-gray-100 flex items-center justify-between">
        <div class="flex items-center gap-3 font-semibold text-dark">
            <i class="fas fa-list text-primary"></i> Daftar Produk ({{ $products->count() }})
        </div>
        <button type="button" id="bulkDeleteBtn" onclick="submitBulkDelete()" class="hidden items-center gap-2 px-4 py-2 bg-gradient-to-r from-red-500 to-red-600 text-white rounded-lg font-semibold text-sm shadow-md transition-all duration-300 hover:-translate-y-1 hover:shadow-lg">
            <i class="fas fa-trash"></i> Hapus Terpilih (<span id="selectedCount">0</span>)
        </button>
    </div>
    <form id="bulkDeleteForm" action="{{ route('admin.products.bulkDestroy') }}" method="POST">
        @csrf
    <div class="overflow-x-auto">
        @if($products->count() > 0)
            <table class="w-full">
                <thead>
                    <tr>
                        <th class="px-4 py-4 bg-gradient-to-r from-cream to-white border-b border-gray-100 w-12">
                            <input type="checkbox" id="selectAll" onclick="toggleSelectAll()" class="w-4 h-4 rounded border-gray-300 text-primary focus:ring-primary cursor-pointer">
                        </th>
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
                        <td class="px-4 py-4 border-b border-gray-50">
                            <input type="checkbox" name="ids[]" value="{{ $product->id }}" class="product-checkbox w-4 h-4 rounded border-gray-300 text-primary focus:ring-primary cursor-pointer" onclick="updateBulkButton()">
                        </td>
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
                                <button type="button" onclick="deleteSingleProduct('{{ route('admin.products.destroy', $product->id) }}')" class="inline-flex items-center justify-center w-9 h-9 bg-gradient-to-r from-red-500 to-red-600 text-white rounded-lg shadow-md transition-all duration-300 hover:-translate-y-1 hover:shadow-lg" title="Hapus">
                                    <i class="fas fa-trash text-sm"></i>
                                </button>
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
    </form>
</div>
@endsection

@push('scripts')
<script>
function toggleSelectAll() {
    const selectAll = document.getElementById('selectAll');
    const checkboxes = document.querySelectorAll('.product-checkbox');
    checkboxes.forEach(cb => cb.checked = selectAll.checked);
    updateBulkButton();
}

function updateBulkButton() {
    const checkboxes = document.querySelectorAll('.product-checkbox:checked');
    const bulkBtn = document.getElementById('bulkDeleteBtn');
    const selectedCount = document.getElementById('selectedCount');
    const selectAll = document.getElementById('selectAll');
    const allCheckboxes = document.querySelectorAll('.product-checkbox');

    selectedCount.textContent = checkboxes.length;

    if (checkboxes.length > 0) {
        bulkBtn.classList.remove('hidden');
        bulkBtn.classList.add('inline-flex');
    } else {
        bulkBtn.classList.add('hidden');
        bulkBtn.classList.remove('inline-flex');
    }

    selectAll.checked = allCheckboxes.length > 0 && checkboxes.length === allCheckboxes.length;
    selectAll.indeterminate = checkboxes.length > 0 && checkboxes.length < allCheckboxes.length;
}

function submitBulkDelete() {
    const count = document.querySelectorAll('.product-checkbox:checked').length;
    if (confirm('Yakin ingin menghapus ' + count + ' produk yang dipilih?')) {
        document.getElementById('bulkDeleteForm').submit();
    }
}

function filterProducts() {
    const keyword = document.getElementById('searchProduct').value.toLowerCase();
    const rows = document.querySelectorAll('#bulkDeleteForm tbody tr');
    let visibleCount = 0;

    rows.forEach(row => {
        const nama = row.querySelector('td:nth-child(3)')?.textContent.toLowerCase() || '';
        const kategori = row.querySelector('td:nth-child(4)')?.textContent.toLowerCase() || '';

        if (nama.includes(keyword) || kategori.includes(keyword)) {
            row.style.display = '';
            visibleCount++;
        } else {
            row.style.display = 'none';
        }
    });
}

function deleteSingleProduct(url) {
    if (!confirm('Yakin ingin menghapus produk ini?')) return;

    fetch(url, {
        method: 'DELETE',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            'Accept': 'application/json',
        },
    }).then(response => {
        if (response.ok || response.redirected) {
            window.location.reload();
        } else {
            alert('Gagal menghapus produk. Silakan coba lagi.');
        }
    }).catch(() => {
        alert('Terjadi kesalahan. Silakan coba lagi.');
    });
}
</script>
@endpush
