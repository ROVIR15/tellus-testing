<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected function getCards(): array
    {
        // Dummy metrics for now; replace with real queries when models exist
        return [
            Stat::make('Total Users', '1,248')
                ->description('Up 4.2% from last week')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->color('success'),

            Stat::make('News Articles', '12')
                ->description('3 published this week')
                ->descriptionIcon('heroicon-m-newspaper')
                ->color('primary'),

            Stat::make('Inquiries', '27')
                ->description('5 awaiting response')
                ->descriptionIcon('heroicon-m-envelope')
                ->color('warning'),
        ];
    }
}