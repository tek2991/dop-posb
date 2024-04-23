<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OfficeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $divisions = \App\Models\Division::all();
        $officeTypes = \App\Models\OfficeType::all();
        $offices = \App\Models\Office::defaultOffices();

        foreach ($offices as $office => $data) {
            $division_name = $data['Division'];
            $office_type_name = $data['OfficeType'];
            \App\Models\Office::updateOrCreate([
                'name' => $office,
                'division_id' => $divisions->where('name', $division_name)->first()->id,
                'office_type_id' => $officeTypes->where('name', $office_type_name)->first()->id,
            ]);
        }
    }
}
