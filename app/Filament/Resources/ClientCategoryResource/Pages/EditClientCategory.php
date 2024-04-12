<?php

namespace App\Filament\Resources\ClientCategoryResource\Pages;

use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\EditRecord;
use App\Filament\Resources\ClientCategoryResource;

class EditClientCategory extends EditRecord
{
    protected static string $resource = ClientCategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
            Actions\ForceDeleteAction::make(),
            Actions\RestoreAction::make(),
        ];
    }
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
    protected function getSavedNotification(): ?Notification
    {
        return Notification::make()
            ->success()
            ->title('Category')
            ->icon('heroicon-o-pencil-square')
            ->iconColor('success')
            ->body('The Category details have been changed')
            ->send();
    }
}
