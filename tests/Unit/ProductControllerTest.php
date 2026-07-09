<?php

namespace Tests\Unit;

use App\Models\Product;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class ProductControllerTest extends TestCase
{
    use RefreshDatabase;

    private User $admin;

    protected function setUp(): void
    {
        parent::setUp();

        $this->admin = User::create([
            'name' => 'Admin Assabar',
            'email' => 'admin@assabar.co.id',
            'password' => bcrypt('password123'),
        ]);
    }

    /**
     * UT-PCTRL-001: Menampilkan daftar produk publik
     */
    public function test_index_displays_public_products_page(): void
    {
        Product::create([
            'nama_produk' => 'Songkok Test',
            'kategori' => 'Songkok',
            'deskripsi' => 'Deskripsi test',
        ]);

        $response = $this->get(route('products'));

        $response->assertStatus(200);
        $response->assertViewIs('products');
        $response->assertViewHas('products');
        $response->assertViewHas('categories');
    }

    /**
     * UT-PCTRL-002: Menampilkan daftar produk admin
     */
    public function test_admin_index_displays_products(): void
    {
        $this->actingAs($this->admin);

        Product::create([
            'nama_produk' => 'Songkok Test',
            'kategori' => 'Songkok',
        ]);

        $response = $this->get(route('admin.products.index'));

        $response->assertStatus(200);
        $response->assertViewIs('admin.products.index');
        $response->assertViewHas('products');
    }

    /**
     * UT-PCTRL-003: Menampilkan form create
     */
    public function test_create_displays_form(): void
    {
        $this->actingAs($this->admin);

        $response = $this->get(route('admin.products.create'));

        $response->assertStatus(200);
        $response->assertViewIs('admin.products.create');
    }

    /**
     * UT-PCTRL-004: Menyimpan produk baru dengan data valid
     */
    public function test_store_creates_product_with_valid_data(): void
    {
        Storage::fake('public');
        $this->actingAs($this->admin);

        $response = $this->post(route('admin.products.store'), [
            'nama_produk' => 'Songkok Premium',
            'kategori' => 'Songkok',
            'deskripsi' => 'Songkok kualitas premium',
            'gambar' => [
                UploadedFile::fake()->image('songkok.jpg', 800, 600),
            ],
        ]);

        $response->assertRedirect(route('admin.products.index'));
        $response->assertSessionHas('success', 'Produk berhasil ditambahkan!');

        $this->assertDatabaseHas('products', [
            'nama_produk' => 'Songkok Premium',
            'kategori' => 'Songkok',
            'deskripsi' => 'Songkok kualitas premium',
        ]);
    }

    /**
     * UT-PCTRL-005: Validasi gagal saat store tanpa nama_produk
     */
    public function test_store_fails_validation_without_nama_produk(): void
    {
        Storage::fake('public');
        $this->actingAs($this->admin);

        $response = $this->post(route('admin.products.store'), [
            'nama_produk' => '',
            'kategori' => 'Songkok',
            'gambar' => [
                UploadedFile::fake()->image('songkok.jpg'),
            ],
        ]);

        $response->assertSessionHasErrors('nama_produk');
        $this->assertDatabaseCount('products', 0);
    }

    /**
     * UT-PCTRL-006: Menampilkan detail produk
     */
    public function test_show_displays_product_detail(): void
    {
        $product = Product::create([
            'nama_produk' => 'Songkok Test',
            'kategori' => 'Songkok',
            'deskripsi' => 'Deskripsi test',
        ]);

        $response = $this->get(route('products.show', $product->id));

        $response->assertStatus(200);
        $response->assertViewIs('products.show');
        $response->assertViewHas('product');
    }

    /**
     * UT-PCTRL-007: Show produk gagal dengan id tidak ada
     */
    public function test_show_returns_404_for_nonexistent_product(): void
    {
        $response = $this->get(route('products.show', 99999));

        $response->assertStatus(404);
    }

    /**
     * UT-PCTRL-008: Menampilkan form edit
     */
    public function test_edit_displays_form(): void
    {
        $this->actingAs($this->admin);

        $product = Product::create([
            'nama_produk' => 'Songkok Test',
            'kategori' => 'Songkok',
        ]);

        $response = $this->get(route('admin.products.edit', $product->id));

        $response->assertStatus(200);
        $response->assertViewIs('admin.products.edit');
        $response->assertViewHas('product');
    }

    /**
     * UT-PCTRL-009: Update produk berhasil
     */
    public function test_update_product_successfully(): void
    {
        Storage::fake('public');
        $this->actingAs($this->admin);

        $product = Product::create([
            'nama_produk' => 'Songkok Lama',
            'kategori' => 'Songkok',
            'gambar1' => 'products/old-image.jpg',
        ]);

        $response = $this->put(route('admin.products.update', $product->id), [
            'nama_produk' => 'Songkok Updated',
            'kategori' => 'Songkok',
            'deskripsi' => 'Deskripsi baru',
        ]);

        $response->assertRedirect(route('admin.products.index'));
        $response->assertSessionHas('success', 'Produk berhasil diupdate!');

        $this->assertDatabaseHas('products', [
            'id' => $product->id,
            'nama_produk' => 'Songkok Updated',
        ]);
    }

    /**
     * UT-PCTRL-010: Hapus produk berhasil
     */
    public function test_destroy_deletes_product(): void
    {
        Storage::fake('public');
        $this->actingAs($this->admin);

        $product = Product::create([
            'nama_produk' => 'Produk Hapus',
            'kategori' => 'Test',
        ]);

        $response = $this->delete(route('admin.products.destroy', $product->id));

        $response->assertRedirect(route('admin.products.index'));
        $response->assertSessionHas('success', 'Produk berhasil dihapus!');
        $this->assertDatabaseMissing('products', ['id' => $product->id]);
    }

    /**
     * UT-PCTRL-011: Bulk delete produk berhasil
     */
    public function test_bulk_destroy_deletes_multiple_products(): void
    {
        Storage::fake('public');
        $this->actingAs($this->admin);

        $product1 = Product::create(['nama_produk' => 'Produk 1', 'kategori' => 'Test']);
        $product2 = Product::create(['nama_produk' => 'Produk 2', 'kategori' => 'Test']);

        $response = $this->post(route('admin.products.bulkDestroy'), [
            'ids' => [$product1->id, $product2->id],
        ]);

        $response->assertRedirect(route('admin.products.index'));
        $response->assertSessionHas('success', '2 produk berhasil dihapus!');
        $this->assertDatabaseCount('products', 0);
    }

    /**
     * UT-PCTRL-012: Delete image produk berhasil
     */
    public function test_delete_image_sets_field_to_null(): void
    {
        Storage::fake('public');
        $this->actingAs($this->admin);

        // Buat file palsu di storage
        Storage::disk('public')->put('products/test-image.jpg', 'fake content');

        $product = Product::create([
            'nama_produk' => 'Produk Gambar',
            'kategori' => 'Test',
            'gambar1' => 'products/test-image.jpg',
        ]);

        $response = $this->delete(route('admin.products.deleteImage', [
            'id' => $product->id,
            'imageField' => 'gambar1',
        ]));

        $response->assertRedirect();
        $response->assertSessionHas('success', 'Gambar berhasil dihapus!');

        $product->refresh();
        $this->assertNull($product->gambar1);
        Storage::disk('public')->assertMissing('products/test-image.jpg');
    }

    /**
     * UT-PCTRL-013: Optimistic Locking - Gagal update jika data sudah diubah oleh sesi lain
     */
    public function test_update_fails_with_optimistic_locking_mismatch(): void
    {
        $this->actingAs($this->admin);

        $product = Product::create([
            'nama_produk' => 'Produk A',
            'kategori' => 'Kategori A',
            'tanggal_dibuat' => now()->subMinutes(10),
            'tanggal_update' => now()->subMinutes(5),
        ]);

        // Coba kirim update dengan timestamp usang (misal subMinutes(10))
        $oldTimestamp = now()->subMinutes(10)->timestamp;

        $response = $this->from(route('admin.products.edit', $product->id))
            ->put(route('admin.products.update', $product->id), [
                'nama_produk' => 'Produk A Updated',
                'kategori' => 'Kategori A',
                'last_updated_at' => $oldTimestamp,
            ]);

        $response->assertRedirect(route('admin.products.edit', $product->id));
        $response->assertSessionHasErrors('nama_produk');
        
        $product->refresh();
        $this->assertEquals('Produk A', $product->nama_produk); // Data tidak berubah
    }

    /**
     * UT-PCTRL-014: Staging & Reordering Gambar - Gambar tersisa ditata ulang secara kontigu
     */
    public function test_update_stages_and_reorders_images_contiguously(): void
    {
        Storage::fake('public');
        $this->actingAs($this->admin);

        // Buat berkas-berkas gambar palsu
        $file1 = 'products/img1.jpg';
        $file2 = 'products/img2.jpg';
        $file3 = 'products/img3.jpg';
        Storage::disk('public')->put($file1, 'fake image 1');
        Storage::disk('public')->put($file2, 'fake image 2');
        Storage::disk('public')->put($file3, 'fake image 3');

        $product = Product::create([
            'nama_produk' => 'Baju Muslim',
            'kategori' => 'Gamis',
            'gambar1' => $file1,
            'gambar2' => $file2,
            'gambar3' => $file3,
        ]);

        $newImage = UploadedFile::fake()->image('new.jpg');

        // Update dengan menghapus gambar2 (tengah) dan menambahkan gambar baru
        $response = $this->put(route('admin.products.update', $product->id), [
            'nama_produk' => 'Baju Muslim',
            'kategori' => 'Gamis',
            'delete_images' => ['gambar2'],
            'gambar' => [$newImage],
        ]);

        $response->assertRedirect(route('admin.products.index'));

        $product->refresh();

        // Gambar 1 tetap file1
        $this->assertEquals($file1, $product->gambar1);
        // Gambar 2 (tengah) digantikan oleh file3 (karena bergeser mengisi slot kosong)
        $this->assertEquals($file3, $product->gambar2);
        // Gambar 3 diisi gambar baru yang diunggah
        $this->assertNotNull($product->gambar3);
        $this->assertNotEquals($file3, $product->gambar3);
        // Gambar 4 dan 5 kosong
        $this->assertNull($product->gambar4);
        $this->assertNull($product->gambar5);

        // Berkas img2.jpg harus terhapus secara fisik dari storage
        Storage::disk('public')->assertMissing($file2);
        Storage::disk('public')->assertExists($file1);
        Storage::disk('public')->assertExists($file3);
    }

    /**
     * UT-PCTRL-015: Validasi Bahasa Indonesia kustom
     */
    public function test_store_validation_uses_indonesian_error_messages(): void
    {
        $this->actingAs($this->admin);

        $response = $this->post(route('admin.products.store'), [
            'nama_produk' => '',
            'kategori' => '',
        ]);

        $response->assertSessionHasErrors([
            'nama_produk' => 'Nama produk wajib diisi.',
            'kategori' => 'Kategori wajib diisi.',
            'gambar' => 'Gambar produk wajib diupload minimal 1.',
        ]);
    }
}
