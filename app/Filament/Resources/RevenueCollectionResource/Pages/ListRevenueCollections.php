<?php

namespace App\Filament\Resources\RevenueCollectionResource\Pages;

use App\Filament\Resources\RevenueCollectionResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListRevenueCollections extends ListRecords
{
    protected static string $resource = RevenueCollectionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
