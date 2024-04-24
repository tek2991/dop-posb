<?php

namespace App\Filament\Resources\RevenueCollectionResource\Pages;

use App\Filament\Resources\RevenueCollectionResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewRevenueCollection extends ViewRecord
{
    protected static string $resource = RevenueCollectionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
