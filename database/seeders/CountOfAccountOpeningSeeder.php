<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CountOfAccountOpeningSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Seed data for every office for every 1st day on the month for the past 12 months
        $offices = \App\Models\Office::all();
        $user = \App\Models\Role::where('name', 'admin')->first();

        $dates = collect(range(1, 12))->map(function ($i) {
            return now()->subMonths($i)->startOfMonth();
        });

        $offices->each(function ($office) use ($dates, $user) {
            $dates->each(function ($date) use ($office, $user) {
                \App\Models\CountOfAccountOpening::create([
                    'user_id' => $user->id,
                    'office_id' => $office->id,
                    'sb' => rand(1, 100),
                    'rd' => rand(1, 100),
                    'mis' => rand(1, 100),
                    'ppf' => rand(1, 100),
                    'scss' => rand(1, 100),
                    'ssa' => rand(1, 100),
                    'td' => rand(1, 100),
                    'mssc' => rand(1, 100),
                    'nsc' => rand(1, 100),
                    'kvp' => rand(1, 100),
                    'month' => $date,
                    'financial_year_id' => \App\Models\FinancialYear::first()->id,
                ]);
            });
        });
    }
}
