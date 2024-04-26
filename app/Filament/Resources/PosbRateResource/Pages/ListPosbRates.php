<?php

namespace App\Filament\Resources\PosbRateResource\Pages;

use App\Filament\Resources\PosbRateResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPosbRates extends ListRecords
{
    protected static string $resource = PosbRateResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
