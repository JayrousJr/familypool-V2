<?php

namespace App\Filament\Resources\ServiceRequestResource\Pages;

use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;
use App\Filament\Resources\ServiceRequestResource;

class CreateServiceRequest extends CreateRecord
{
    protected static string $resource = ServiceRequestResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
    protected function getCreatedNotification(): ?Notification
    {
        return Notification::make()
            ->success()
            ->title('Service request Created')
            ->icon('heroicon-o-plus')
            ->iconColor('success')
            ->body('New Service has been created Successifully');
    }
}
