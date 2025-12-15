<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\Category;
use App\Models\Product;
use App\Models\Supplier;
use Filament\Support\Enums\IconPosition;

class CardsWidgets extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Categories', Category::query()->count())
                ->description('Total Categories')
                ->descriptionIcon('heroicon-o-folder', IconPosition::Before)
                ->chart([10, 15, 12, 8, 20, 18, 25])
                ->color('primary'),
            Stat::make('Products', Product::query()->count())
                ->description('Total Products')
                ->descriptionIcon('heroicon-o-cube', IconPosition::Before)
                ->chart([5, 8, 90, 12, 9, 76, 18])
                ->color('danger'),
            Stat::make('Suppliers', Supplier::query()->count())
                ->description('Total Suppliers')
                ->descriptionIcon('heroicon-o-truck', IconPosition::Before)
                ->chart([7, 60, 9, 33, 11, 16, 7])
                ->color('warning'),
        ];
    }
}
