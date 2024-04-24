<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FinancialYearSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\FinancialYear::updateOrCreate([
                'start_date' => '2023-03-01',
                'end_date' => '2024-02-29',
                'is_active' => true,
        ]);

    }
}
