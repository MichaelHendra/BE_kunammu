<?php

namespace Database\Seeders;

use App\Models\Barang;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'username' => 'testUser',
            'password' => '123123123',
            'email' => 'test@example.com',
            'displayName' => 'test123',
            'saldo' => 0,
            'image' => 'test'
        ]);

        Barang::factory()->create([
            'nama_kunam' => 'test',
            'harga' => '10',
            'deskripsi' => 'test',
            'stok' => 0,
            'image' => 'test'

        ]);
    }
}
