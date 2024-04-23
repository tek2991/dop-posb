<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RegionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $regions = \App\Models\Region::defaultRegions();

        foreach ($regions as $region) {
            \App\Models\Region::updateOrCreate(['name' => $region]);
        }
    }
}
