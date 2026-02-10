<?php

namespace App\Filament\Resources\Files\Tables;

use Filament\Actions\Action;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Support\Number;

class FilesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('original_name')
                    ->label('Name')
                    ->searchable()
                    ->sortable()
                    ->limit(50),
                TextColumn::make('extension')
                    ->label('Type')
                    ->badge()
                    ->color('gray')
                    ->sortable(),
                TextColumn::make('size')
                    ->label('Size')
                    ->formatStateUsing(fn ($state) => Number::fileSize($state, 2))
                    ->sortable(),
                TextColumn::make('mime_type')
                    ->label('MIME Type')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->searchable(),
                TextColumn::make('path')
                    ->label('Path')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->searchable(),
                TextColumn::make('created_at')
                    ->label('Uploaded At')
                    ->dateTime()
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                Action::make('download')
                    ->label('Download')
                    ->icon('heroicon-o-arrow-down-tray')
                    ->url(fn ($record) => $record->url)
                    ->openUrlInNewTab(),
                ViewAction::make(),
                EditAction::make(),
                Action::make('copy_url')
                    ->label('Copy URL')
                    ->icon('heroicon-o-clipboard')
                    ->action(function () {
                        //
                    })
                    ->extraAttributes(fn ($record) => [
                        'x-on:click' => 'window.navigator.clipboard.writeText(' . json_encode($record->url) . ')',
                    ])
                    ->requiresConfirmation(false)
                    ->tooltip('Copy Link'),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('created_at', 'desc');
    }
}
