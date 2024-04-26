<?php

namespace App\Filament\Resources\FinancialYearResource\Pages;

use App\Filament\Resources\FinancialYearResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewFinancialYear extends ViewRecord
{
    protected static string $resource = FinancialYearResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
