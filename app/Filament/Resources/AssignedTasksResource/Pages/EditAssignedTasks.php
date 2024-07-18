<?php

namespace App\Filament\Resources\AssignedTasksResource\Pages;

use App\Filament\Resources\AssignedTasksResource;
use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\EditRecord;

class EditAssignedTasks extends EditRecord
{
    protected static string $resource = AssignedTasksResource::class;

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
            ->title('Task Assignment')
            ->icon('heroicon-o-pencil-square')
            ->iconColor('success')
            ->body('The Task Assignment details have been edited')
            ->send();
    }
}
