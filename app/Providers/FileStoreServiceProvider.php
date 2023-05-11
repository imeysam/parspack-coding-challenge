<?php

namespace App\Providers;

use App\Services\FileStore\Src\FileStoreService;
use App\Services\FileStore\Contracts\FileStoreServiceInterface;
use Illuminate\Support\ServiceProvider;

class FileStoreServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton(FileStoreServiceInterface::class, FileStoreService::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
