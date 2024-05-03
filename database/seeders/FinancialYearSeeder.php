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
                'start_date' => '2023-04-01',
                'end_date' => '2025-03-31',
                'is_active' => true,
        ]);

    }
}
