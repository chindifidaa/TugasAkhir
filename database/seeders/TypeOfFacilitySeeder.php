<?php

namespace Database\Seeders;

use App\Models\TypeOfFacility;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TypeOfFacilitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TypeOfFacility::insert([
            [
                'name' => 'Umum',
            ],
            [
                'name' => 'Servis Hotel',
            ],
            [
                'name' => 'Fasilitas Publik',
            ],
            [
                'name' => 'Fasilitas Kamar',
            ],
            [
                'name' => 'Makan Dan Minuman',
            ],
            [
                'name' => 'Konektivitas',
            ],
            [
                'name' => 'Jasa Antar Jemput',
            ],
        ]);
    }
}
