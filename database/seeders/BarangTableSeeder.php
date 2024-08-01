<?php

namespace Database\Seeders;

use App\Models\Barang;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BarangTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Barang::create([
            'nama_kunam' => 'test',
            'harga' => '10',
            'deskripsi' => 'test',
            'stok' => 0,
            'image' => 'test'
        ]);
    }
}
