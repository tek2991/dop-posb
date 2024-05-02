<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PosbRateResource\Pages;
use App\Filament\Resources\PosbRateResource\RelationManagers;
use App\Models\PosbRate;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PosbRateResource extends Resource
{
    protected static ?string $model = PosbRate::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Organisation Setup';

    protected static ?int $navigationSort = 4;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\DatePicker::make('start_date')
                    ->required(),
                Forms\Components\DatePicker::make('end_date')
                    ->required(),
                Forms\Components\TextInput::make('posb_in_cents')
                    ->required()
                    ->numeric()
                    ->default(21923),
                Forms\Components\TextInput::make('certificates_in_cents')
                    ->required()
                    ->numeric()
                    ->default(7392),
                Forms\Components\TextInput::make('mssc_in_cents')
                    ->required()
                    ->numeric()
                    ->default(4000),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('start_date')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('end_date')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('posb_in_cents')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('certificates_in_cents')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('mssc_in_cents')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPosbRates::route('/'),
            'create' => Pages\CreatePosbRate::route('/create'),
            'view' => Pages\ViewPosbRate::route('/{record}'),
            'edit' => Pages\EditPosbRate::route('/{record}/edit'),
        ];
    }
}
