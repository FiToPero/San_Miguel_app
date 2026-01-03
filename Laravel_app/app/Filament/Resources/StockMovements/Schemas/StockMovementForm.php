<?php

namespace App\Filament\Resources\StockMovements\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Schemas\Schema;

class StockMovementForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('product_id')
                    ->required()
                    ->relationship('product', 'name')
                    ->searchable()
                    ->preload()
                    ->label('Product'),
                TextInput::make('quantity')
                    ->required()
                    ->numeric(),
                Select::make('movement_type')
                    ->options(['in' => 'In', 'out' => 'Out', 'adjust' => 'Adjust'])
                    ->required(),
                TextInput::make('reference'),
                TextInput::make('notes'),
                Select::make('user_id')
                    ->required()
                    ->relationship('user', 'name')
                    ->searchable()
                    ->preload()
                    ->label('User'),
            ]);
    }
}
