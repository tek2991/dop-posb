<?php

namespace App\Filament\Exports;

use App\Models\CountOfAccountOpening;
use Filament\Actions\Exports\ExportColumn;
use Filament\Actions\Exports\Exporter;
use Filament\Actions\Exports\Models\Export;

class CountOfAccountOpeningExporter extends Exporter
{
    protected static ?string $model = CountOfAccountOpening::class;

    public static function getColumns(): array
    {
        return [
            ExportColumn::make('user.name')
                ->label('User'),
            ExportColumn::make('office.name')
                ->label('Office'),
            ExportColumn::make('office.division.name')
                ->label('Division'),
            ExportColumn::make('office.officeType.name')
                ->label('Office Type'),
            ExportColumn::make('sb'),
            ExportColumn::make('rd'),
            ExportColumn::make('mis'),
            ExportColumn::make('ppf'),
            ExportColumn::make('scss'),
            ExportColumn::make('ssa'),
            ExportColumn::make('td'),
            ExportColumn::make('mssc'),
            ExportColumn::make('nsc'),
            ExportColumn::make('kvp'),
            ExportColumn::make('month')
        ];
    }

    public static function getCompletedNotificationBody(Export $export): string
    {
        $body = 'Your count of account opening export has completed and ' . number_format($export->successful_rows) . ' ' . str('row')->plural($export->successful_rows) . ' exported.';

        if ($failedRowsCount = $export->getFailedRowsCount()) {
            $body .= ' ' . number_format($failedRowsCount) . ' ' . str('row')->plural($failedRowsCount) . ' failed to export.';
        }

        return $body;
    }
}
