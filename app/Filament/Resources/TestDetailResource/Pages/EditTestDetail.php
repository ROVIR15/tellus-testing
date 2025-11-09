<?php

namespace App\Filament\Resources\TestDetailResource\Pages;

use App\Filament\Resources\TestDetailResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTestDetail extends EditRecord
{
    protected static string $resource = TestDetailResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}