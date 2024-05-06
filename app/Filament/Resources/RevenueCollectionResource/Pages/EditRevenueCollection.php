<?php

namespace App\Filament\Resources\RevenueCollectionResource\Pages;

use App\Filament\Resources\RevenueCollectionResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditRevenueCollection extends EditRecord
{
    protected static string $resource = RevenueCollectionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }

    protected function getRedirectUrl(): string
    {
        return $this->previousUrl ?? $this->getResource()::getUrl('index');
    }
}
