<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TargetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $current_financial_year = \App\Models\FinancialYear::current()->first();
        $offices = \App\Models\Office::all();
        $start_date = $current_financial_year->start_date;
        $end_date = $current_financial_year->end_date;

        foreach ($offices as $office) {
            \App\Models\Target::create([
                'office_id' => $office->id,
                'start_date' => $start_date,
                'end_date' => $end_date,
                'total_revenue_target_in_cents' => rand(1000000, 10000000),
                'total_account_opening' => rand(10, 100),
            ]);
        }
    }
}
