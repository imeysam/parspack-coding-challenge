<?php

namespace App\Providers;

use App\Services\Comment\Contracts\UserCommentLimitInterface;
use App\Services\Comment\Src\CommentStoreService;
use App\Services\Comment\Src\UserCommentLimitValidator;
use Illuminate\Support\ServiceProvider;

class CommentStoreServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register()
    {
        $this->app->bind(UserCommentLimitInterface::class, UserCommentLimitValidator::class);

        $this->app->bind('comment-store-service', function ($app) {
            return new CommentStoreService($app->make(UserCommentLimitInterface::class));
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
