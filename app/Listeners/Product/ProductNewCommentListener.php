<?php

namespace App\Listeners\Product;

use App\Events\Comment\NewCommentEvent;
use App\Services\FileStore\Contracts\FileStoreServiceInterface;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class ProductNewCommentListener
{
    /**
     * Create the event listener.
     */
    public function __construct(public FileStoreServiceInterface $fileStoreService)
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(NewCommentEvent $event): void
    {
        $comments_count = $event->product->comments()->count();

        $this->fileStoreService->store($event->product->name, $comments_count);
    }
}
