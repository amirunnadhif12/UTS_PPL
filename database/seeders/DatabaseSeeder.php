<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Buat user admin jika belum ada
        if (!User::where('email', 'admin@assabar.co.id')->exists()) {
            User::create([
                'name' => 'Admin Assabar',
                'email' => 'admin@assabar.co.id',
                'password' => bcrypt('password123'),
            ]);
        }
    }
}
