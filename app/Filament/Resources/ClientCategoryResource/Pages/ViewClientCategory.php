<?php

namespace App\Filament\Resources\ClientCategoryResource\Pages;

use App\Filament\Resources\ClientCategoryResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewClientCategory extends ViewRecord
{
    protected static string $resource = ClientCategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
