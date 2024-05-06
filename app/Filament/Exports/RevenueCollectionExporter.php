<?php

namespace App\Filament\Exports;

use App\Models\RevenueCollection;
use Filament\Actions\Exports\ExportColumn;
use Filament\Actions\Exports\Exporter;
use Filament\Actions\Exports\Models\Export;

class RevenueCollectionExporter extends Exporter
{
    protected static ?string $model = RevenueCollection::class;

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
            ExportColumn::make('posb_net'),
            ExportColumn::make('certificates_net'),
            ExportColumn::make('mssc_net'),
            ExportColumn::make('posb_revenue_₹')
                ->state(function (RevenueCollection $record) {
                    return $record->posb_net * \App\Models\PosbRate::current()->first()->posb_in_cents / 100;
                }),

            ExportColumn::make('certificates_revenue ₹')
                ->state(function (RevenueCollection $record) {
                    return $record->certificates_net * \App\Models\PosbRate::current()->first()->certificates_in_cents / 100;
                }),

            ExportColumn::make('mssc_revenue_₹')
                ->state(function (RevenueCollection $record) {
                    return $record->mssc_net * \App\Models\PosbRate::current()->first()->mssc_in_cents / 100;
                }),

            ExportColumn::make('month')
                ->state(function(RevenueCollection $revenueCollection) {
                    return $revenueCollection->month->format('F Y');
                }),
            ExportColumn::make('target')
                ->label('F.Y Target')
                ->state(function(RevenueCollection $record) {
                    return $record->FinancialYearTarget();
                }),
        ];
    }

    public static function getCompletedNotificationBody(Export $export): string
    {
        $body = 'Your revenue collection export has completed and ' . number_format($export->successful_rows) . ' ' . str('row')->plural($export->successful_rows) . ' exported.';

        if ($failedRowsCount = $export->getFailedRowsCount()) {
            $body .= ' ' . number_format($failedRowsCount) . ' ' . str('row')->plural($failedRowsCount) . ' failed to export.';
        }

        return $body;
    }
}
