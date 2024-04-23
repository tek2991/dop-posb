<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DivisionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $regions = \App\Models\Region::all();
        $divisions = \App\Models\Division::defaultDivisions();

        foreach ($divisions as $division => $region) {
            $region_name = $region['Region'];
            \App\Models\Division::updateOrCreate([
                'name' => $division,
                'region_id' => $regions->where('name', $region_name)->first()->id,
            ]);
        }
    }
}
