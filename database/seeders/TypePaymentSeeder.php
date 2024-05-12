<?php

namespace Database\Seeders;

use App\Models\TypePayment;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TypePaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TypePayment::insert([
            [
                'name' => 'Transfer'
            ],
            [
                'name' => 'COD'
            ],
        ]);
    }
}
