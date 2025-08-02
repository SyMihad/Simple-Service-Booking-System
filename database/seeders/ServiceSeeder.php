<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Service::insert([
            ['name' => 'AC Repair', 'description' => 'Repair air conditioner', 'price' => 1000, 'status' => 1],
            ['name' => 'Ac Wash', 'description' => 'Wash air conditioner', 'price' => 800, 'status' => 1]
        ]);
    }
}
