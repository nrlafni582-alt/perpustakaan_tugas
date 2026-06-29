<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kategori;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Kategori::insert([
            [
                'nama_kategori' => 'Programming',
                'deskripsi' => 'Buku pemrograman dan coding',
                'icon' => 'code-slash',
                'warna' => 'primary',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_kategori' => 'Database',
                'deskripsi' => 'Buku tentang database',
                'icon' => 'database',
                'warna' => 'success',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_kategori' => 'Web Design',
                'deskripsi' => 'Buku desain website',
                'icon' => 'palette',
                'warna' => 'info',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_kategori' => 'Networking',
                'deskripsi' => 'Buku jaringan komputer',
                'icon' => 'wifi',
                'warna' => 'warning',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_kategori' => 'Data Science',
                'deskripsi' => 'Buku data science dan AI',
                'icon' => 'graph-up',
                'warna' => 'danger',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
