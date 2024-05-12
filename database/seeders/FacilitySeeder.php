<?php

namespace Database\Seeders;

use App\Models\Facility;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class FacilitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Facility::insert([
            [
                'name' => 'Meja',
                'type_of_facility_id' => 4,
            ],
            [
                'name' => 'Shower',
                'type_of_facility_id' => 4,
            ],
            [
                'name' => 'Lemari',
                'type_of_facility_id' => 4,
            ],
            [
                'name' => 'AC',
                'type_of_facility_id' => 4,
            ],
            [
                'name' => 'Area Bebas Rokok',
                'type_of_facility_id' => 1,
            ],
            [
                'name' => 'Area Rerokok',
                'type_of_facility_id' => 1,
            ],
            [
                'name' => 'Laundry',
                'type_of_facility_id' => 2,
            ],
        ]);
    }
}
