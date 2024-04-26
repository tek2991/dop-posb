<?php

namespace App\Filament\Resources\PosbRateResource\Pages;

use App\Filament\Resources\PosbRateResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPosbRate extends EditRecord
{
    protected static string $resource = PosbRateResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
