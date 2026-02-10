<?php

namespace App\Filament\Resources\Files\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class FileForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                FileUpload::make('path')
                    ->label('File')
                    ->disk('public')
                    ->directory('uploads')
                    ->required()
                    ->storeFileNamesIn('original_name'),
                
                // Hidden fields to store metadata, populated via logic or just kept hidden if auto-calculated
                Hidden::make('original_name'),
                Hidden::make('filename'),
                Hidden::make('disk')->default('public'),
                Hidden::make('extension'),
                Hidden::make('mime_type'),
                Hidden::make('size'),
            ]);
    }
}
