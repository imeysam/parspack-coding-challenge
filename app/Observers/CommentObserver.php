<?php

namespace App\Observers;

use App\Events\Comment\NewCommentEvent;
use App\Models\Comment;

class CommentObserver
{
    /**
     * Handle the Product "created" event.
     */
    public function created(Comment $comment): void
    {
        NewCommentEvent::dispatch($comment->product);
    }
}
