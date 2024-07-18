<?php

namespace App\Filament\Resources\TaskResource\Pages;

use App\Filament\Resources\TaskResource;
use App\Models\ServiceRequest;
use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;

class CreateTask extends CreateRecord
{
    protected static string $resource = TaskResource::class;
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
    protected function getCreatedNotification(): ?Notification
    {
        return Notification::make()
            ->success()
            ->title('Task Created')
            ->icon('heroicon-o-plus')
            ->iconColor('success')
            ->body('New Task has been created Successifully');
    }



    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $serviceRequest = ServiceRequest::find($data['service_request_id']);
        if ($serviceRequest) {
            $serviceRequest->assigned = 1;
            $serviceRequest->save();
        }
        // dd($serviceRequest);
        return $data;
    }
}
