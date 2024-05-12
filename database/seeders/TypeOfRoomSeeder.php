<?php

namespace Database\Seeders;

use App\Models\TypeOfRoom;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TypeOfRoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TypeOfRoom::insert([
            [
                'name' => 'Superior Double Room'
            ],
            [
                'name' => 'Superior Twin Room'
            ],
        ]);
    }
}
