<?php

namespace App\Filament\Resources;

use Closure;
use App\Filament\Resources\TargetResource\Pages;
use App\Filament\Resources\TargetResource\RelationManagers;
use App\Models\Target;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TargetResource extends Resource
{
    protected static ?string $model = Target::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        $current_financial_year = \App\Models\FinancialYear::current()->first();

        return $form
            ->schema([
                Forms\Components\Hidden::make('user_id')
                    ->default(auth()->id())
                    ->required(),
                Forms\Components\Select::make('office_id')
                    ->required()
                    ->relationship('office', 'name')
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
                Forms\Components\DatePicker::make('start_date')
                    ->default($current_financial_year->start_date)
                    ->helperText('Locked to current financial year start date.')
                    ->readOnly()
                    ->required(),
                Forms\Components\DatePicker::make('end_date')
                    ->default($current_financial_year->end_date)
                    ->helperText('Locked to current financial year end date.')
                    ->readOnly()
                    ->required(),
                Forms\Components\TextInput::make('total_revenue_target_in_cents')
                    ->required()
                    ->numeric()
                    ->default(0),
                Forms\Components\TextInput::make('total_account_opening')
                    ->required()
                    ->numeric()
                    ->default(0),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('office.name')
                    ->label('Office')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('start_date')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('end_date')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('revenue_target')
                    ->state(function(Target $record) {
                        return $record->total_revenue_target_in_cents/100;
                    }),
                Tables\Columns\TextColumn::make('total_account_opening')
                    ->label('Account Opening')
                    ->numeric()
                    ->sortable(),
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
            'index' => Pages\ListTargets::route('/'),
            'create' => Pages\CreateTarget::route('/create'),
            'view' => Pages\ViewTarget::route('/{record}'),
            'edit' => Pages\EditTarget::route('/{record}/edit'),
        ];
    }
}
