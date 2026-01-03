<?php

namespace App\Observers;

use App\Models\StockMovement;
use Illuminate\Support\Facades\DB;

class StockMovementObserver
{
    /**
     * Handle the StockMovement "created" event.
     */
    public function created(StockMovement $stockMovement): void
    {
        DB::transaction(function () use ($stockMovement) {
            $product = $stockMovement->product()->lockForUpdate()->first();

            if(!$product) {
                throw new \Exception("Product not found for StockMovement ID: " . $stockMovement->id);
            }

            switch ($stockMovement->movement_type) {
                case 'in':
                    $product->stock += $stockMovement->quantity;
                    break;
                case 'out':
                    $product->stock -= $stockMovement->quantity;
                    break;
                case 'adjust':
                    $product->stock = $stockMovement->quantity;
                    break;
            }
            $product->save();
        });
    }

    /**
     * Handle the StockMovement "updated" event.
     */
    public function updated(StockMovement $stockMovement): void
    {
        //
    }

    /**
     * Handle the StockMovement "deleted" event.
     */
    public function deleted(StockMovement $stockMovement): void
    {
        //
    }

    /**
     * Handle the StockMovement "restored" event.
     */
    public function restored(StockMovement $stockMovement): void
    {
        //
    }

    /**
     * Handle the StockMovement "force deleted" event.
     */
    public function forceDeleted(StockMovement $stockMovement): void
    {
        //
    }
}
