<?php

namespace App\Filament\Resources\AssignedTasksResource\Pages;

use App\Filament\Resources\AssignedTasksResource;
use App\Models\Task;
use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;

class CreateAssignedTasks extends CreateRecord
{
    protected static string $resource = AssignedTasksResource::class;
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
    protected function getCreatedNotification(): ?Notification
    {
        return Notification::make()
            ->success()
            ->title('Task Assignment Created')
            ->icon('heroicon-o-plus')
            ->iconColor('success')
            ->body('New assignment has been created Successifully');
    }
    public function mutateFormDataBeforeCreate(array $data): array
    {
        $task = Task::find($data["task_id"]);
        $task->status = 1;
        $task->comments = "Completed";
        $task->save();
        return $data;
    }
}
