<?php

namespace App\Filament\Resources\JobApplicantsResource\Pages;

use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\EditRecord;
use App\Filament\Resources\JobApplicantsResource;

class EditJobApplicants extends EditRecord
{
    protected static string $resource = JobApplicantsResource::class;

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
            ->title('Applicant Info')
            ->icon('heroicon-o-pencil-square')
            ->iconColor('success')
            ->body('the Applicant Informations have been changed')
            ->send();
    }
}
