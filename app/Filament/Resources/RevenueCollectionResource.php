<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RevenueCollectionResource\Pages;
use App\Filament\Resources\RevenueCollectionResource\RelationManagers;
use App\Models\RevenueCollection;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class RevenueCollectionResource extends Resource
{
    protected static ?string $model = RevenueCollection::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('office_id')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('user_id')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('posb_net')
                    ->required()
                    ->numeric()
                    ->default(0),
                Forms\Components\TextInput::make('certificates_net')
                    ->required()
                    ->numeric()
                    ->default(0),
                Forms\Components\TextInput::make('mssc_net')
                    ->required()
                    ->numeric()
                    ->default(0),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('office_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('user_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('posb_net')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('certificates_net')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('mssc_net')
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
            'index' => Pages\ListRevenueCollections::route('/'),
            'create' => Pages\CreateRevenueCollection::route('/create'),
            'view' => Pages\ViewRevenueCollection::route('/{record}'),
            'edit' => Pages\EditRevenueCollection::route('/{record}/edit'),
        ];
    }
}
