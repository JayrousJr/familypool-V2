<?php

namespace App\Filament\Resources\JobApplicantsResource\Pages;

use App\Filament\Resources\JobApplicantsResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewJobApplicants extends ViewRecord
{
    protected static string $resource = JobApplicantsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
