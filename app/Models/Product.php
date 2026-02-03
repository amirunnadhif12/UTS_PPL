<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'nama_produk',
        'kategori',
        'deskripsi',
        'gambar1',
        'gambar2',
        'gambar3',
        'gambar4',
        'gambar5',
    ];

    protected $casts = [
        'tanggal_dibuat' => 'datetime',
        'tanggal_update' => 'datetime',
    ];
}
