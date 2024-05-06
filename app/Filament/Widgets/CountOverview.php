<?php

namespace App\Filament\Widgets;

use App\Models\PosbRate;
use App\Models\CountOfAccountOpening;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class CountOverview extends BaseWidget
{
    protected static ?int $sort = 1;
    
    protected function getStats(): array
    {
        $rates = PosbRate::current()->first();
        $types_of_accounts = [
            'posb' => $rates->posb_in_cents / 100,
            'certificates' => $rates->certificates_in_cents / 100,
            'mssc' => $rates->mssc_in_cents / 100,
        ];

        return [
            Stat::make('Total Account Opening', 
                CountOfAccountOpening::sum('sb') + CountOfAccountOpening::sum('rd') + CountOfAccountOpening::sum('mis') + CountOfAccountOpening::sum('ppf') + CountOfAccountOpening::sum('scss') + CountOfAccountOpening::sum('ssa') + CountOfAccountOpening::sum('td') + CountOfAccountOpening::sum('mssc')
            ),
            Stat::make('Total Certificates', 
                CountOfAccountOpening::sum('nsc') + CountOfAccountOpening::sum('kvp')
            ),
            Stat::make('Total Revenue',
            'Rs ' . \App\Models\RevenueCollection::sum('posb_net') * $types_of_accounts['posb']
             + \App\Models\RevenueCollection::sum('certificates_net') * $types_of_accounts['certificates']
             + \App\Models\RevenueCollection::sum('mssc_net') * $types_of_accounts['mssc']
            ),
        ];
    }
}
