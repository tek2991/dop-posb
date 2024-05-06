<?php

namespace App\Filament\Resources\CountOfAccountOpeningResource\Pages;

use App\Filament\Resources\CountOfAccountOpeningResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCountOfAccountOpening extends EditRecord
{
    protected static string $resource = CountOfAccountOpeningResource::class;

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
