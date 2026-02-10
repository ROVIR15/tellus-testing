<?php

namespace App\Filament\Resources\Files\Pages;

use App\Filament\Resources\Files\FileResource;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Storage;

class CreateFile extends CreateRecord
{
    protected static string $resource = FileResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        // The file is already uploaded by Filament to the path specified in the form component
        $path = $data['path'];
        
        // Handle case where path might be an array (though unlikely with current config)
        if (is_array($path)) {
            $path = reset($path);
        }

        $disk = $data['disk'] ?? 'public';

        if ($path && Storage::disk($disk)->exists($path)) {
            $data['filename'] = basename($path);
            
            try {
                $data['size'] = Storage::disk($disk)->size($path);
            } catch (\Throwable $e) {
                $data['size'] = 0;
            }

            try {
                $data['mime_type'] = Storage::disk($disk)->mimeType($path);
            } catch (\Throwable $e) {
                $data['mime_type'] = null;
            }

            $data['extension'] = pathinfo($path, PATHINFO_EXTENSION);
            
            // original_name is populated by storeFileNamesIn() in the form
            // but if it's missing for some reason, fallback to filename
            if (empty($data['original_name'])) {
                $data['original_name'] = $data['filename'];
            }
        }

        return $data;
    }
}
