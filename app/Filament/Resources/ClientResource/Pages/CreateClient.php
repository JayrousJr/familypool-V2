<?php

namespace App\Filament\Resources\ClientResource\Pages;

use Filament\Actions;
use Filament\Notifications\Notification;
use App\Filament\Resources\ClientResource;
use Filament\Resources\Pages\CreateRecord;

class CreateClient extends CreateRecord
{
    protected static string $resource = ClientResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
    protected function getCreatedNotification(): ?Notification
    {
        return Notification::make()
            ->success()
            ->title('Clent')
            ->icon('heroicon-o-plus')
            ->iconColor('success')
            ->body('New Clent has been created Successifully');
    }
}
