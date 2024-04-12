<?php

namespace App\Filament\Resources\PopUpResource\Pages;

use Filament\Actions;
use Filament\Notifications\Notification;
use App\Filament\Resources\PopUpResource;
use Filament\Resources\Pages\CreateRecord;

class CreatePopUp extends CreateRecord
{
    protected static string $resource = PopUpResource::class;
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
    protected function getCreatedNotification(): ?Notification
    {
        return Notification::make()
            ->success()
            ->title('PopUp Created')
            ->icon('heroicon-o-plus')
            ->iconColor('success')
            ->body('New PopUp has been created Successifully');
    }
}
