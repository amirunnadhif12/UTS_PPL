<?php

namespace Tests\Feature;

use App\Models\Product;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class ProductCrudIntegrationTest extends TestCase
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

    // ============================
    // CREATE
    // ============================

    /**
     * IT-CRUD-001: Create produk → Data tersimpan di DB + Gambar di storage
     */
    public function test_create_product_saves_to_db_and_storage(): void
    {
        Storage::fake('public');
        $this->actingAs($this->admin);

        $image = UploadedFile::fake()->image('songkok.jpg', 800, 600);

        $response = $this->post(route('admin.products.store'), [
            'nama_produk' => 'Songkok Integration Test',
            'kategori' => 'Songkok',
            'deskripsi' => 'Test integrasi create produk',
            'gambar' => [$image],
        ]);

        // Verifikasi redirect
        $response->assertRedirect(route('admin.products.index'));
        $response->assertSessionHas('success');

        // Verifikasi data di database
        $this->assertDatabaseHas('products', [
            'nama_produk' => 'Songkok Integration Test',
            'kategori' => 'Songkok',
            'deskripsi' => 'Test integrasi create produk',
        ]);

        // Verifikasi gambar di storage
        $product = Product::where('nama_produk', 'Songkok Integration Test')->first();
        $this->assertNotNull($product->gambar1);
        Storage::disk('public')->assertExists($product->gambar1);
    }

    /**
     * IT-CRUD-002: Create produk gagal → Validasi + Redirect back
     */
    public function test_create_product_fails_validation_no_data_saved(): void
    {
        Storage::fake('public');
        $this->actingAs($this->admin);

        $response = $this->post(route('admin.products.store'), [
            'nama_produk' => '',
            'kategori' => '',
        ]);

        $response->assertSessionHasErrors(['nama_produk', 'kategori', 'gambar']);
        $this->assertDatabaseCount('products', 0);
    }

    /**
     * IT-CRUD-003: Create produk duplikat → Unique validation dalam kategori
     */
    public function test_create_duplicate_product_in_same_category_fails(): void
    {
        Storage::fake('public');
        $this->actingAs($this->admin);

        // Buat produk pertama
        Product::create([
            'nama_produk' => 'Songkok Duplikat',
            'kategori' => 'Songkok',
        ]);

        // Coba buat duplikat
        $response = $this->post(route('admin.products.store'), [
            'nama_produk' => 'Songkok Duplikat',
            'kategori' => 'Songkok',
            'gambar' => [UploadedFile::fake()->image('test.jpg')],
        ]);

        $response->assertSessionHasErrors('nama_produk');
        $this->assertDatabaseCount('products', 1); // Masih hanya 1
    }

    // ============================
    // READ
    // ============================

    /**
     * IT-CRUD-004: Daftar produk publik → Data dari DB ditampilkan di view
     */
    public function test_public_products_page_shows_db_data(): void
    {
        Product::create([
            'nama_produk' => 'Produk Publik A',
            'kategori' => 'Kategori A',
        ]);
        Product::create([
            'nama_produk' => 'Produk Publik B',
            'kategori' => 'Kategori B',
        ]);

        $response = $this->get(route('products'));

        $response->assertStatus(200);
        $response->assertViewIs('products');
        $response->assertViewHas('products', function ($products) {
            return $products->count() === 2;
        });
        $response->assertViewHas('categories', function ($categories) {
            return $categories->count() === 2;
        });
    }

    /**
     * IT-CRUD-005: Detail produk → Data lengkap dari DB ditampilkan
     */
    public function test_product_detail_shows_correct_data(): void
    {
        $product = Product::create([
            'nama_produk' => 'Produk Detail',
            'kategori' => 'Test',
            'deskripsi' => 'Deskripsi detail',
        ]);

        $response = $this->get(route('products.show', $product->id));

        $response->assertStatus(200);
        $response->assertViewIs('products.show');
        $response->assertViewHas('product', function ($viewProduct) use ($product) {
            return $viewProduct->id === $product->id;
        });
    }

    /**
     * IT-CRUD-006: Daftar produk admin → Auth + Data dari DB
     */
    public function test_admin_products_requires_auth_and_shows_data(): void
    {
        // Tanpa login → redirect
        $response = $this->get(route('admin.products.index'));
        $response->assertRedirect(route('admin.login'));

        // Dengan login → tampil data
        $this->actingAs($this->admin);

        Product::create([
            'nama_produk' => 'Produk Admin',
            'kategori' => 'Test',
        ]);

        $response = $this->get(route('admin.products.index'));
        $response->assertStatus(200);
        $response->assertViewHas('products');
    }

    // ============================
    // UPDATE
    // ============================

    /**
     * IT-CRUD-007: Update produk → Data diupdate di DB
     */
    public function test_update_product_changes_data_in_db(): void
    {
        Storage::fake('public');
        $this->actingAs($this->admin);

        $product = Product::create([
            'nama_produk' => 'Nama Lama',
            'kategori' => 'Kategori Lama',
            'deskripsi' => 'Deskripsi lama',
            'gambar1' => 'products/existing.jpg',
        ]);

        $response = $this->put(route('admin.products.update', $product->id), [
            'nama_produk' => 'Nama Baru',
            'kategori' => 'Kategori Baru',
            'deskripsi' => 'Deskripsi baru',
        ]);

        $response->assertRedirect(route('admin.products.index'));
        $response->assertSessionHas('success', 'Produk berhasil diupdate!');

        $this->assertDatabaseHas('products', [
            'id' => $product->id,
            'nama_produk' => 'Nama Baru',
            'kategori' => 'Kategori Baru',
            'deskripsi' => 'Deskripsi baru',
        ]);
    }

    /**
     * IT-CRUD-008: Update + tambah gambar baru → File di storage
     */
    public function test_update_adds_new_image_to_empty_slot(): void
    {
        Storage::fake('public');
        $this->actingAs($this->admin);

        // Produk dengan gambar1 sudah terisi
        $product = Product::create([
            'nama_produk' => 'Produk Gambar',
            'kategori' => 'Test',
            'gambar1' => 'products/existing.jpg',
        ]);

        $newImage = UploadedFile::fake()->image('new-image.jpg');

        $response = $this->put(route('admin.products.update', $product->id), [
            'nama_produk' => 'Produk Gambar',
            'kategori' => 'Test',
            'gambar' => [$newImage],
        ]);

        $response->assertRedirect(route('admin.products.index'));

        // Gambar baru harus masuk ke slot gambar2 (slot kosong pertama)
        $product->refresh();
        $this->assertNotNull($product->gambar2);
        Storage::disk('public')->assertExists($product->gambar2);
    }

    // ============================
    // DELETE
    // ============================

    /**
     * IT-CRUD-009: Hapus produk → Data dihapus dari DB + Gambar dari storage
     */
    public function test_delete_product_removes_from_db_and_storage(): void
    {
        Storage::fake('public');
        $this->actingAs($this->admin);

        // Buat file di storage
        Storage::disk('public')->put('products/test-delete.jpg', 'fake content');

        $product = Product::create([
            'nama_produk' => 'Produk Hapus',
            'kategori' => 'Test',
            'gambar1' => 'products/test-delete.jpg',
        ]);

        $response = $this->delete(route('admin.products.destroy', $product->id));

        $response->assertRedirect(route('admin.products.index'));
        $response->assertSessionHas('success', 'Produk berhasil dihapus!');

        // Verifikasi terhapus dari DB
        $this->assertDatabaseMissing('products', ['id' => $product->id]);

        // Verifikasi gambar terhapus dari storage
        Storage::disk('public')->assertMissing('products/test-delete.jpg');
    }

    /**
     * IT-CRUD-010: Bulk delete → Multiple data dihapus
     */
    public function test_bulk_delete_removes_multiple_products(): void
    {
        Storage::fake('public');
        $this->actingAs($this->admin);

        $product1 = Product::create(['nama_produk' => 'Bulk 1', 'kategori' => 'Test']);
        $product2 = Product::create(['nama_produk' => 'Bulk 2', 'kategori' => 'Test']);
        $product3 = Product::create(['nama_produk' => 'Bulk 3', 'kategori' => 'Test']);

        $response = $this->post(route('admin.products.bulkDestroy'), [
            'ids' => [$product1->id, $product2->id, $product3->id],
        ]);

        $response->assertRedirect(route('admin.products.index'));
        $response->assertSessionHas('success', '3 produk berhasil dihapus!');
        $this->assertDatabaseCount('products', 0);
    }

    /**
     * IT-CRUD-011: Delete image tertentu → Field jadi null
     */
    public function test_delete_specific_image_sets_field_to_null(): void
    {
        Storage::fake('public');
        $this->actingAs($this->admin);

        Storage::disk('public')->put('products/delete-me.jpg', 'fake content');

        $product = Product::create([
            'nama_produk' => 'Produk Delete Image',
            'kategori' => 'Test',
            'gambar1' => 'products/delete-me.jpg',
            'gambar2' => 'products/keep-me.jpg',
        ]);

        $response = $this->delete(route('admin.products.deleteImage', [
            'id' => $product->id,
            'imageField' => 'gambar1',
        ]));

        $response->assertRedirect();
        $response->assertSessionHas('success', 'Gambar berhasil dihapus!');

        $product->refresh();
        $this->assertNull($product->gambar1);
        $this->assertEquals('products/keep-me.jpg', $product->gambar2); // gambar2 tetap ada
        Storage::disk('public')->assertMissing('products/delete-me.jpg');
    }
}
