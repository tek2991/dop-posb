<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use App\Models\RevenueCollection;
use Filament\Tables\Actions\ExportAction;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Exports\RevenueCollectionExporter;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\RevenueCollectionResource\Pages;
use App\Filament\Resources\RevenueCollectionResource\RelationManagers;

class RevenueCollectionResource extends Resource
{
    protected static ?string $model = RevenueCollection::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Hidden::make('user_id')
                    ->default(auth()->id())
                    ->required(),
                Forms\Components\Select::make('office_id')
                    ->required()
                    ->relationship('office', 'name')
                    // ->searchable()
                    ->placeholder('Select Office')
                    ->rules([
                        function () {
                            return function (string $attribute, $value, Closure $fail) {
                                // If admin then allow all office
                                if (auth()->user()->isAdmin()) {
                                    return;
                                }

                                // If divisional user then allow only offices of his division
                                if (auth()->user()->isDivisionalUser()) {
                                    if (auth()->user()->division_id != \App\Models\Office::find($value)->division_id) {
                                        $fail('You can only select office of your division');
                                    }
                                    return;
                                }

                                // If office user then allow only his office
                                if (auth()->user()->office_id != $value) {
                                    $fail('You can only select your office');
                                }
                            };
                        },
                    ]),
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
                Forms\Components\DatePicker::make('month')
                    ->helperText('Select the first day of the month')
                    ->native(false)
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user.name')
                    ->label('User')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('office.name')
                    ->label('Office')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('office.division.name')
                    ->label('Division')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('office.officeType.name')
                    ->label('Office Type')
                    ->searchable()
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
                // Posb calculation
                Tables\Columns\TextColumn::make('posb_revenue')
                    ->state(function(RevenueCollection $record) {
                        return 'Rs ' . $record->posb_net * \App\Models\PosbRate::current()->first()->posb_in_cents/100;
                    }),
                // Certificates calculation
                Tables\Columns\TextColumn::make('certificates_revenue')
                    ->state(function(RevenueCollection $record) {
                        return 'Rs ' . $record->certificates_net * \App\Models\PosbRate::current()->first()->certificates_in_cents/100;
                    }),
                // Mssc calculation
                Tables\Columns\TextColumn::make('mssc_revenue')
                    ->state(function(RevenueCollection $record) {
                        return 'Rs ' . $record->mssc_net * \App\Models\PosbRate::current()->first()->mssc_in_cents/100;
                    }),
                Tables\Columns\TextColumn::make('month')
                    ->date()
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('office_id')
                    ->options(fn () => \App\Models\Office::pluck('name', 'id')->toArray())
                    ->label('Office'),
                Tables\Filters\SelectFilter::make('office.division_id')
                    ->options(fn () => \App\Models\Division::pluck('name', 'id')->toArray())
                    ->label('Division'),
            ])
            ->actions([
                // Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->headerActions([
                ExportAction::make()
                    ->exporter(RevenueCollectionExporter::class)
                    ->columnMapping(false)
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
