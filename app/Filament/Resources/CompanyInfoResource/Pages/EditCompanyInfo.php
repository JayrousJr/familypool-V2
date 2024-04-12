<?php

namespace App\Filament\Resources\CompanyInfoResource\Pages;

use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\EditRecord;
use App\Filament\Resources\CompanyInfoResource;

class EditCompanyInfo extends EditRecord
{
    protected static string $resource = CompanyInfoResource::class;

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
            ->title('Website About')
            ->icon('heroicon-o-pencil-square')
            ->iconColor('success')
            ->body('The About website details have been changed')
            ->send();
    }
}
