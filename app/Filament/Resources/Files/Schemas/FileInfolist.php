<?php

namespace App\Filament\Resources\Files\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class FileInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('original_name'),
                TextEntry::make('filename'),
                TextEntry::make('path'),
                TextEntry::make('disk'),
                TextEntry::make('extension')
                    ->placeholder('-'),
                TextEntry::make('mime_type')
                    ->placeholder('-'),
                TextEntry::make('size')
                    ->numeric(),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}
