<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;
use App\Models\Product;

class ChartBarWidgets extends ChartWidget
{
    protected ?string $heading = 'Top 10 Product with the Most Stock';
    // protected ?string $maxHeight = '250px';

    protected function getData(): array
    {
        $topProduct = Product::orderBy('stock', 'desc')->take(10)->get();

        return [
            'datasets' => [
                [
                    'label' => 'Stock Quantity',
                    'data' => $topProduct->pluck('stock')->toArray(),
                    'backgroundColor' => 'rgba(54, 162, 235, 0.7)',
                ],
            ],
            'labels' => $topProduct->pluck('name')->toArray(),
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }

    protected function getOptions(): array
    {
        return [
            'responsive' => true,
            'plugins' => [
                'legend' => [
                    'position' => 'bottom',
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
