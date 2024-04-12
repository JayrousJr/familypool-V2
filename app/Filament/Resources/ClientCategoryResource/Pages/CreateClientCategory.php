<?php

namespace App\Filament\Resources\ClientCategoryResource\Pages;

use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;
use App\Filament\Resources\ClientCategoryResource;

class CreateClientCategory extends CreateRecord
{
    protected static string $resource = ClientCategoryResource::class;
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
    protected function getCreatedNotification(): ?Notification
    {
        return Notification::make()
            ->success()
            ->title('Category Created')
            ->icon('heroicon-o-plus')
            ->iconColor('success')
            ->body('New Client category has been created Successifully');
    }
}
