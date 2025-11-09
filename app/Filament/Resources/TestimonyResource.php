<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TestimonyResource\Pages;
use App\Models\Testimony;
use Filament\Forms;
use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\TextInput\Mask;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\IconColumn;
use Filament\Actions\EditAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\ReplicateAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;

class TestimonyResource extends Resource
{
    protected static ?string $model = Testimony::class;

    protected static \BackedEnum|string|null $navigationIcon = 'heroicon-o-chat-bubble-left-ellipsis';
    protected static \UnitEnum|string|null $navigationGroup = 'Content';
    protected static ?string $navigationLabel = 'Testimonies';
    protected static ?string $modelLabel = 'Testimony';
    protected static ?string $pluralModelLabel = 'Testimonies';

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->schema([
                TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                TextInput::make('role')
                    ->maxLength(255),
                TextInput::make('company')
                    ->maxLength(255),
                TextInput::make('location')
                    ->maxLength(255),
                FileUpload::make('avatar_path')
                    ->image()
                    ->directory('testimonies')
                    ->disk('public')
                    ->nullable(),
                Textarea::make('quote')
                    ->rows(4)
                    ->columnSpanFull(),
                TextInput::make('source')
                    ->maxLength(255),
                Toggle::make('is_published')
                    ->label('Published')
                    ->default(true),
                TextInput::make('order')
                    ->numeric()
                    ->default(0),
            ])
            ->columns(2);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('avatar_path')
                    ->label('Avatar')
                    ->disk('public')
                    ->square(),
                TextColumn::make('name')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('role')
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('company')
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('location')
                    ->toggleable(isToggledHiddenByDefault: true),
                IconColumn::make('is_published')
                    ->boolean()
                    ->label('Status'),
                TextColumn::make('order')
                    ->sortable(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->recordActions([
                EditAction::make(),
                DeleteAction::make(),
                ReplicateAction::make()
                    ->excludeAttributes(['avatar_path'])
            ])
            ->groupedBulkActions([
                DeleteBulkAction::make(),
            ]);
    }

    public static function getNavigationBadge(): ?string
    {
        return (string) Testimony::count();
    }

    public static function getNavigationBadgeColor(): ?string
    {
        return 'primary';
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTestimonies::route('/'),
            'create' => Pages\CreateTestimony::route('/create'),
            'edit' => Pages\EditTestimony::route('/{record}/edit'),
        ];
    }
}