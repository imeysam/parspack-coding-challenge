<?php

namespace App\Services\Comment\Src;

use App\Models\Comment;
use App\Models\Product;
use App\Models\User;
use App\Services\Comment\Contracts\UserCommentLimitInterface;
use App\Services\Product\Src\ProductCreateService;
use Exception;

class CommentStoreService
{
    private $product;

    private $user;

    public function __construct(private UserCommentLimitInterface $userCommentLimit)
    {
    }

    public function product(Product $product)
    {
        $this->product = $product;
        return $this;
    }

    public function user(User $user)
    {
        $this->user = $user;
        return $this;
    }

    public function store(string $context): Comment
    {
        $limit_validation_result = $this->userCommentLimit->validate($this->product, $this->user);
        if($limit_validation_result === false)
        {
            throw new Exception("You may only create 2 comments per product.");
        }

        return Comment::create([
            'product_id' => $this->product->id,
            'user_id' => $this->user->id ?? auth()->id(),
            'context' => $context,
        ]);
    }
}
