<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::insert([
            [
                'name' => 'admin',
                'email' => 'admin@gmail.com',
                'email_verified_at' => now(),
                'password' => Hash::make('admin'),
                'image' => 'default.png',
                'role_id' => 1,
            ],
            [
                'name' => 'guest',
                'email' => 'guest@gmail.com',
                'email_verified_at' => now(),
                'password' => Hash::make('guest'),
                'image' => 'default.png',
                'role_id' => 2,
            ],
        ]);
    }
}
