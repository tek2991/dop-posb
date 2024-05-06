<?php

namespace App\Filament\Resources\CountOfAccountOpeningResource\Pages;

use App\Filament\Resources\CountOfAccountOpeningResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateCountOfAccountOpening extends CreateRecord
{
    protected static string $resource = CountOfAccountOpeningResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->previousUrl ?? $this->getResource()::getUrl('index');
    }
}
