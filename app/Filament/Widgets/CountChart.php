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
        $types_of_accounts = ['sb', 'rd', 'mis', 'ppf', 'scss', 'ssa', 'td', 'mssc', 'nsc', 'kvp',];

        $datasets = [];

        $colors = [
            '#caf270',
            '#8daa4a',
            '#65d632',
            '#45c490',
            '#fee08b',
            '#e6f598',
            '#008d93',
            '#66c2a5',
            '#3288bd',
            '#2e5468'
        ];  

        $loop_count = 0;
        $current_div_id  = null;

        $offices = Office::orderBy('division_id')->get();
        
        foreach($offices as $office) {
            $label = $office->name;
            $data = [];
            
            foreach(Division::get() as $division) {
                $data_count = 0;

                if($division->id == $office->division_id) {
                    foreach($types_of_accounts as $type) {
                        $data_count += CountOfAccountOpening::where('office_id', $office->id)->sum($type);
                    }
                    if($current_div_id == $division->id) {
                        $loop_count++;
                    }else{
                        $loop_count = 0;
                        $current_div_id = $division->id;
                    }
                }else{
                    $data_count = 0;
                }
                
                $data[] = $data_count;
            }
            
            $datasets[] = [
                'label' => $label,
                'data' => $data,
                'backgroundColor' => $colors[$loop_count],
            ];

            if($loop_count == count($colors)) {
                $loop_count = 0;
            }
        }

        // dd($datasets);
        
        return [
            'datasets' => $datasets,
            'labels' => Division::get()->pluck('name')->toArray(),
        ];
    }

    protected static ?array $options = [

            'scales' => [
                'y' => [
                    'stacked' => true,
                    'type' => 'linear',
                ],
                'x' => [
                    'stacked' => true,
                ],
            ],
            'plugins' => [
                'legend' => false,
            ],
            'responsive' => true,
            'borderWidth' => 0,
    ];

    protected function getType(): string
    {
        return 'bar';
    }
}
