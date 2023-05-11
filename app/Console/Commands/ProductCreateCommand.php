<?php

namespace App\Console\Commands;

use App\Models\Product;
use Illuminate\Console\Command;

class ProductCreateCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    // protected $signature = 'app:product-create-command';
    protected $signature = 'product:create {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'The command create a new product by name attribute if it is not available.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $name = $this->argument('name');

        $product = Product::where('name', $name)->first();
        if(!$product)
        {
            $product = Product::create(['name' => $name]);
        }

        $this->info("Product '{$product->name}' created!");
    }
}
