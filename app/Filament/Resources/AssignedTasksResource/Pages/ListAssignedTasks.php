<?php

namespace App\Filament\Resources\AssignedTasksResource\Pages;

use App\Filament\Resources\AssignedTasksResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAssignedTasks extends ListRecords
{
    protected static string $resource = AssignedTasksResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
