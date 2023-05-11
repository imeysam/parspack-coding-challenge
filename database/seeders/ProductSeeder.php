<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Services\FileStore\Contracts\FileStoreServiceInterface;
use App\Services\Product\Src\ProductCreateService;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        app(FileStoreServiceInterface::class)->empty();

        $productCreateService = app(ProductCreateService::class);

        $productCreateService->create('A');

        $productCreateService->create('B');

        $productCreateService->create('C');
    }
}
