<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\User;
use App\Models\News;
use App\Models\Inquiry;

class StatsOverview extends BaseWidget
{
    protected function getCards(): array
    {
        $usersTotal = User::count();
        $usersWeek = User::where('created_at', '>=', now()->subDays(7))->count();

        $newsTotal = News::query()
            ->where('is_published', true)
            ->where(function ($q) {
                $q->whereNull('published_at')->orWhere('published_at', '<=', now());
            })
            ->count();
        $newsWeek = News::query()
            ->where('is_published', true)
            ->where(function ($q) {
                $q->where('published_at', '>=', now()->subDays(7))
                  ->orWhere(function ($qq) {
                      $qq->whereNull('published_at')->where('created_at', '>=', now()->subDays(7));
                  });
            })
            ->count();

        $inquiriesTotal = Inquiry::count();
        $inquiriesWeek = Inquiry::where('created_at', '>=', now()->subDays(7))->count();

        return [
            Stat::make('Total Users', number_format($usersTotal))
                ->description('New in 7 days: ' . number_format($usersWeek))
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->color('success'),

            Stat::make('News Articles', number_format($newsTotal))
                ->description('Published in 7 days: ' . number_format($newsWeek))
                ->descriptionIcon('heroicon-m-newspaper')
                ->color('primary'),

            Stat::make('Inquiries', number_format($inquiriesTotal))
                ->description('Last 7 days: ' . number_format($inquiriesWeek))
                ->descriptionIcon('heroicon-m-envelope')
                ->color('warning'),
        ];
    }
}
