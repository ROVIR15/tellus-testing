<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TestDetailResource\Pages;
use App\Models\TestDetail;
use Filament\Forms;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;
use Filament\Resources\Resource;
use Filament\Tables\Table;
use Filament\Tables;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;

class TestDetailResource extends Resource
{
    protected static ?string $model = TestDetail::class;

    protected static \BackedEnum|string|null $navigationIcon = 'heroicon-o-book-open';

    protected static \UnitEnum|string|null $navigationGroup = 'Content';

    protected static ?string $navigationLabel = 'Test Details';

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->schema([
                Section::make('Test Detail')
                    ->schema([
                        TextInput::make('label')
                            ->label('Label')
                            ->required()
                            ->maxLength(255),
                        Textarea::make('description')
                            ->label('Description')
                            ->rows(4),
                        Textarea::make('details')
                            ->label('Details')
                            ->rows(6),
                        Toggle::make('is_published')
                            ->label('Published')
                            ->default(true),
                        TextInput::make('order')
                            ->label('Order')
                            ->numeric()
                            ->default(0),
                    ])->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('label')->label('Label')->searchable()->sortable(),
                IconColumn::make('is_published')->label('Published')->boolean()->sortable(),
                TextColumn::make('order')->label('Order')->sortable(),
                TextColumn::make('created_at')->label('Created')->dateTime()->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTestDetails::route('/'),
            'create' => Pages\CreateTestDetail::route('/create'),
            'edit' => Pages\EditTestDetail::route('/{record}/edit'),
        ];
    }
}