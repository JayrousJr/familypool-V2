<?php

namespace App\Filament\Resources\PopUpResource\Pages;

use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\EditRecord;
use App\Filament\Resources\PopUpResource;

class EditPopUp extends EditRecord
{
    protected static string $resource = PopUpResource::class;

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
            ->title('PopUp')
            ->icon('heroicon-o-pencil-square')
            ->iconColor('success')
            ->body('The Popup details have been changed')
            ->send();
    }
}
