<?php

namespace Tests\Unit;

use App\Models\Product;
use PHPUnit\Framework\TestCase;

class ProductModelTest extends TestCase
{
    /**
     * UT-PROD-001: Memastikan Product model dapat diinstansiasi
     */
    public function test_product_can_be_instantiated(): void
    {
        $product = new Product();
        $this->assertInstanceOf(Product::class, $product);
    }

    /**
     * UT-PROD-002: Memastikan atribut fillable sesuai konfigurasi
     */
    public function test_product_has_correct_fillable_attributes(): void
    {
        $product = new Product();
        $expectedFillable = [
            'nama_produk',
            'kategori',
            'deskripsi',
            'gambar1',
            'gambar2',
            'gambar3',
            'gambar4',
            'gambar5',
        ];

        $this->assertEquals($expectedFillable, $product->getFillable());
    }

    /**
     * UT-PROD-003: Memastikan timestamps dinonaktifkan
     */
    public function test_product_has_timestamps_disabled(): void
    {
        $product = new Product();
        $this->assertFalse($product->timestamps);
    }

    /**
     * UT-PROD-004: Memastikan casting tanggal_dibuat ke datetime
     */
    public function test_product_casts_tanggal_dibuat_to_datetime(): void
    {
        $product = new Product();
        $casts = $product->getCasts();

        $this->assertArrayHasKey('tanggal_dibuat', $casts);
        $this->assertEquals('datetime', $casts['tanggal_dibuat']);
    }

    /**
     * UT-PROD-005: Memastikan casting tanggal_update ke datetime
     */
    public function test_product_casts_tanggal_update_to_datetime(): void
    {
        $product = new Product();
        $casts = $product->getCasts();

        $this->assertArrayHasKey('tanggal_update', $casts);
        $this->assertEquals('datetime', $casts['tanggal_update']);
    }
}
