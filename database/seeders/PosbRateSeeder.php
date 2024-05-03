<?php

namespace Database\Seeders;

use App\Models\PosbRate;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PosbRateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $current_financial_year = \App\Models\FinancialYear::current()->first();
        $start_date = $current_financial_year->start_date;
        $end_date = $current_financial_year->end_date;

        PosbRate::create([
            'start_date' => $start_date,
            'end_date' => $end_date,
            'posb_in_cents' => 21923,
            'certificates_in_cents' => 7392,
            'mssc_in_cents' => 4000,
        ]);
    }
}
