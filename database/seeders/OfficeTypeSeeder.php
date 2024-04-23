<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OfficeTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $officeTypes = \App\Models\OfficeType::defaultOfficeTypes();

        foreach ($officeTypes as $officeType) {
            \App\Models\OfficeType::updateOrCreate(['name' => $officeType]);
        }
    }
}
