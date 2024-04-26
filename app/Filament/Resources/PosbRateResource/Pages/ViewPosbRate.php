<?php

namespace App\Filament\Resources\PosbRateResource\Pages;

use App\Filament\Resources\PosbRateResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewPosbRate extends ViewRecord
{
    protected static string $resource = PosbRateResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
