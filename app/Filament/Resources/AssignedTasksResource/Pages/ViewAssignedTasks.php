<?php

namespace App\Filament\Resources\AssignedTasksResource\Pages;

use App\Filament\Resources\AssignedTasksResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewAssignedTasks extends ViewRecord
{
    protected static string $resource = AssignedTasksResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
