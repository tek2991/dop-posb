<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RevenueCollectionSeeder extends Seeder
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
                \App\Models\RevenueCollection::create([
                    'user_id' => $user->id,
                    'office_id' => $office->id,
                    'posb_net' => rand(51, 250),
                    'certificates_net' => rand(51, 250),
                    'mssc_net' => rand(51, 250),
                    'month' => $date,
                    'financial_year_id' => \App\Models\FinancialYear::first()->id,
                ]);
            });
        });
    }
}
