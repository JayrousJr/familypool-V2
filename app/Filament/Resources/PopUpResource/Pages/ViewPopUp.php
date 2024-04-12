<?php

namespace App\Filament\Resources\PopUpResource\Pages;

use App\Filament\Resources\PopUpResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewPopUp extends ViewRecord
{
    protected static string $resource = PopUpResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
