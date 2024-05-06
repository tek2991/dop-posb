<?php

namespace App\Filament\Widgets;

use App\Models\CountOfAccountOpening;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class CountOverview extends BaseWidget
{
    protected static ?int $sort = 1;
    
    protected function getStats(): array
    {
        return [
            Stat::make('Total Account Opening', 
                CountOfAccountOpening::sum('sb') + CountOfAccountOpening::sum('rd') + CountOfAccountOpening::sum('mis') + CountOfAccountOpening::sum('ppf') + CountOfAccountOpening::sum('scss') + CountOfAccountOpening::sum('ssa') + CountOfAccountOpening::sum('td') + CountOfAccountOpening::sum('mssc')
            ),
            Stat::make('Total Certificates', 
                CountOfAccountOpening::sum('nsc') + CountOfAccountOpening::sum('kvp')
            ),
            Stat::make('Total Revenue', 'Upcomming...'),
        ];
    }
}
