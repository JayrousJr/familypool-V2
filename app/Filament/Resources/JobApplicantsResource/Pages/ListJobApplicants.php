<?php

namespace App\Filament\Resources\JobApplicantsResource\Pages;

use App\Filament\Resources\JobApplicantsResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListJobApplicants extends ListRecords
{
    protected static string $resource = JobApplicantsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
