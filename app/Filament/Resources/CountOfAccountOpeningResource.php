<?php

namespace App\Filament\Resources;

use Closure;
use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use App\Models\CountOfAccountOpening;
use Filament\Tables\Actions\ExportAction;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Actions\ExportBulkAction;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Exports\CountOfAccountOpeningExporter;
use Coolsam\FilamentFlatpickr\Forms\Components\Flatpickr;
use App\Filament\Resources\CountOfAccountOpeningResource\Pages;
use App\Filament\Resources\CountOfAccountOpeningResource\RelationManagers;

class CountOfAccountOpeningResource extends Resource
{
    protected static ?string $model = CountOfAccountOpening::class;

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
                Forms\Components\TextInput::make('sb')
                    ->required()
                    ->numeric()
                    ->default(0),
                Forms\Components\TextInput::make('rd')
                    ->required()
                    ->numeric()
                    ->default(0),
                Forms\Components\TextInput::make('mis')
                    ->required()
                    ->numeric()
                    ->default(0),
                Forms\Components\TextInput::make('ppf')
                    ->required()
                    ->numeric()
                    ->default(0),
                Forms\Components\TextInput::make('scss')
                    ->required()
                    ->numeric()
                    ->default(0),
                Forms\Components\TextInput::make('ssa')
                    ->required()
                    ->numeric()
                    ->default(0),
                Forms\Components\TextInput::make('td')
                    ->required()
                    ->numeric()
                    ->default(0),
                Forms\Components\TextInput::make('mssc')
                    ->required()
                    ->numeric()
                    ->default(0),
                Forms\Components\TextInput::make('nsc')
                    ->required()
                    ->numeric()
                    ->default(0),
                Forms\Components\TextInput::make('kvp')
                    ->required()
                    ->numeric()
                    ->default(0),
                Forms\Components\DatePicker::make('month')
                    ->helperText('Select the first day of the month')
                    ->native(false)
                    ->required(),
                Forms\Components\Hidden::make('financial_year_id')
                    ->default(1)
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
                Tables\Columns\TextColumn::make('sb')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('rd')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('mis')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('ppf')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('scss')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('ssa')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('td')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('mssc')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('nsc')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('kvp')
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
                // ExportBulkAction::make()
                // ->exporter(CountOfAccountOpeningExporter::class)
                // ->columnMapping(false)
            ])
            ->headerActions([
                ExportAction::make()
                    ->exporter(CountOfAccountOpeningExporter::class)
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
            'index' => Pages\ListCountOfAccountOpenings::route('/'),
            'create' => Pages\CreateCountOfAccountOpening::route('/create'),
            'view' => Pages\ViewCountOfAccountOpening::route('/{record}'),
            'edit' => Pages\EditCountOfAccountOpening::route('/{record}/edit'),
        ];
    }
}
