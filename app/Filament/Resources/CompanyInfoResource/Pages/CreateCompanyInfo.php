<?php

namespace App\Filament\Resources\CompanyInfoResource\Pages;

use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;
use App\Filament\Resources\CompanyInfoResource;

class CreateCompanyInfo extends CreateRecord
{
    protected static string $resource = CompanyInfoResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
    protected function getCreatedNotification(): ?Notification
    {
        return Notification::make()
            ->success()
            ->title('Comapny Info')
            ->icon('heroicon-o-plus')
            ->iconColor('success')
            ->body('New Company Info been created Successifully');
    }
}
