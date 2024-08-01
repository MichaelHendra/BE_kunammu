<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'username'	=> 'a',
            'password'	=> bcrypt('a'),
            'email'	=>  'a@a.com',
            'displayName' => 'testUser',
            'saldo' => '0',
            'image' => 'test'
        ]);
    }
}
