<?php

namespace App\Services\Product\Src;

use App\Models\Product;

class ProductCreateService
{
    public function create(string $name): Product
    {
        $record = Product::firstOrCreate(
            ['name' => $name],
            ['name' => $name],
        );

        return $record;
    }
}
