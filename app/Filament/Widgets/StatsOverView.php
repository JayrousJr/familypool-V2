<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverView extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('We now Serve In all USA', '15 Cities')
                ->description('Including Cities in TN')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->color('success'),
            Stat::make('Services We Offer', '7 Services')
                ->description('Including Pool Closing and Opening')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->color('danger'),
            Stat::make('Our Happy Customers', '100k +')
                ->description('To Us, you are the king')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->color('success'),
        ];
    }
}
