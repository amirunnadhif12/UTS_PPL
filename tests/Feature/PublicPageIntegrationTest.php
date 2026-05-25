<?php

namespace Tests\Feature;

use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PublicPageIntegrationTest extends TestCase
{
    use RefreshDatabase;

    /**
     * IT-PUB-001: Home page → Route mengarah ke view yang benar
     */
    public function test_home_page_loads_correctly(): void
    {
        $response = $this->get(route('home'));

        $response->assertStatus(200);
        $response->assertViewIs('home');
    }

    /**
     * IT-PUB-002: About page → Route mengarah ke view yang benar
     */
    public function test_about_page_loads_correctly(): void
    {
        $response = $this->get(route('about'));

        $response->assertStatus(200);
        $response->assertViewIs('about');
    }

    /**
     * IT-PUB-003: Products page → Route + Controller + DB + View
     */
    public function test_products_page_shows_data_from_database(): void
    {
        // Buat data produk
        Product::create([
            'nama_produk' => 'Produk Integrasi',
            'kategori' => 'Test Kategori',
            'deskripsi' => 'Deskripsi test integrasi',
        ]);

        $response = $this->get(route('products'));

        $response->assertStatus(200);
        $response->assertViewIs('products');
        $response->assertViewHas('products');
        $response->assertViewHas('categories');
        $response->assertSee('Produk Integrasi');
    }

    /**
     * IT-PUB-004: Article page → Route dengan parameter slug
     */
    public function test_article_page_receives_slug_parameter(): void
    {
        $response = $this->get(route('articles.show', 'test-artikel-slug'));

        $response->assertStatus(200);
        $response->assertViewIs('articles.show');
        $response->assertViewHas('slug', 'test-artikel-slug');
    }

    /**
     * IT-PUB-005: Contact & FAQ → Static pages load correctly
     */
    public function test_static_pages_load_correctly(): void
    {
        // Contact
        $response = $this->get(route('contact'));
        $response->assertStatus(200);
        $response->assertViewIs('contact');

        // FAQ
        $response = $this->get(route('faq'));
        $response->assertStatus(200);
        $response->assertViewIs('faq');
    }
}
