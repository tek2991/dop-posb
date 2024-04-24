<?php

namespace App\Filament\Widgets;

use App\Models\Office;
use App\Models\Division;
use App\Models\OfficeType;
use Filament\Widgets\ChartWidget;
use App\Models\CountOfAccountOpening;

class CountChart extends ChartWidget
{
    protected static ?string $heading = 'Account Opened in Divisions';

    protected function getData(): array
    {
        $divisions = Division::all();
        // $head_office_type_id = OfficeType::where('name', 'Head Office')->first()->id;
        // $head_offices = Office::where('office_type_id', $head_office_type_id)->get();

        $types_of_accounts = ['sb', 'rd', 'mis', 'ppf', 'scss', 'ssa', 'td', 'mssc', 'nsc', 'kvp',];

        $data = [];

        foreach ($divisions as $division) {
            $office_ids = $division->offices->pluck('id');

            $sum_of_accounts = 0;

            foreach ($types_of_accounts as $type) {
                $sum_of_accounts += CountOfAccountOpening::whereIn('office_id', $office_ids)->sum($type);
            }

            $data[] = $sum_of_accounts;
        }
        

        return [
            'datasets' => [
                [
                    'label' => 'Total Accounts in Divisions',
                    'data' => $data,
                ],
            ],
            'labels' => $divisions->pluck('name')->toArray(),
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
