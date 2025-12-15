<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;
use App\Models\Category;

class ChartPieWidgets extends ChartWidget
{
    protected ?string $heading = 'Chart Pie Widgets';

    protected function getData(): array
    {
        $categories = Category::withCount('products')->get();
        $data = $categories->pluck('products_count')->toArray();
        $labels = $categories->pluck('name')->toArray();

        return [
            'datasets' => [
                [
                    'label' => 'Number of Products',
                    'data' => $data,
                    'backgroundColor' => [
                        '#FF6384',
                        '#36A2EB',
                        '#FFCE56',
                        '#4BC0C0',
                        '#9966FF',
                        '#FF9F40',
                        '#E7E9ED',
                        '#76FF03',
                        '#D500F9',
                        '#00BFA5',
                    ],
                ],
            ],
            'labels' => $labels,
        ];
    }

    protected function getType(): string
    {
        return 'pie';
    }
        protected function getOptions(): array
    {
        return [
            'responsive' => true,
            'plugins' => [
                'legend' => [
                    'position' => 'right',
                ],
            ],
            'scales' => [
                'y' => [
                    'ticks' => [
                        'stepSize' => 1,
                    ],
                ],
            ],
        ];
    }
}
