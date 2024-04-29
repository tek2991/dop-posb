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
            ExportColumn::make('id')
                ->label('ID'),
            ExportColumn::make('user_id'),
            ExportColumn::make('office_id'),
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
            ExportColumn::make('created_at'),
            ExportColumn::make('updated_at'),
            ExportColumn::make('month'),
            ExportColumn::make('financial_year_id'),
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
