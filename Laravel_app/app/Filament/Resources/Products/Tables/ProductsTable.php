<?php

namespace App\Filament\Resources\Products\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ExportAction;
use App\Filament\Exports\ProductExporter;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ProductsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('sku')
                    ->label('SKU')
                    ->searchable(),
                TextColumn::make('name')
                    ->label(__('products.fields.name'))
                    ->searchable(),
                TextColumn::make('price')
                    ->label(__('products.fields.price'))
                    ->toggleable()
                    ->money()
                    ->sortable(),
                TextColumn::make('cost')
                    ->label(__('products.fields.cost'))
                    ->toggleable()
                    ->money()
                    ->sortable(),
                TextColumn::make('stock')
                    ->label(__('products.fields.stock'))
                    ->toggleable()
                    ->numeric()
                    ->sortable(),
                TextColumn::make('min_stock')
                    ->label(__('products.fields.min_stock'))
                    ->toggleable()
                    ->numeric()
                    ->sortable(),
                TextColumn::make('category.name')
                    ->label(__('products.fields.category'))
                    ->toggleable()
                    ->searchable()
                    ->sortable(),
                TextColumn::make('supplier.name')
                    ->label(__('products.fields.supplier'))
                    ->toggleable()
                    ->searchable()
                    ->sortable(),
                TextColumn::make('created_at')
                    ->label(__('products.fields.created_at'))
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: false),
                TextColumn::make('updated_at')
                    ->label(__('products.fields.updated_at'))
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                    // ExportBulkAction::make()
                    //     ->exporter(ProductExporter::class)
                    //     ->fileDisk('local')
                    //     ->formats([ExportFormat::Csv]),
                ]),
            ])
            ->headerActions([
                ExportAction::make()
                    ->exporter(ProductExporter::class),
            ]);
    }
}
