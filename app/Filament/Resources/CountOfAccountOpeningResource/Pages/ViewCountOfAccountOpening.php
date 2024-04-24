<?php

namespace App\Filament\Resources\CountOfAccountOpeningResource\Pages;

use App\Filament\Resources\CountOfAccountOpeningResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewCountOfAccountOpening extends ViewRecord
{
    protected static string $resource = CountOfAccountOpeningResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
