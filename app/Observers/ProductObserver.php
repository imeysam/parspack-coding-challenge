<?php

namespace App\Observers;

use App\Models\Product;
use App\Services\FileStore\Contracts\FileStoreServiceInterface;

class ProductObserver
{
    /**
     * Handle the Product "created" event.
     */
    public function created(Product $product): void
    {
        app(FileStoreServiceInterface::class)->store($product->name, 0);
    }
}
