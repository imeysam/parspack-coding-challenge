<?php

namespace App\Services\Comment\Src;

use App\Models\Comment;
use App\Models\Product;
use App\Models\User;
use App\Services\Comment\Contracts\UserCommentLimitInterface;

class UserCommentLimitValidator implements UserCommentLimitInterface
{
    public function validate(Product $product, User $user): bool {

        $commentCount = Comment::
                            whereProduct($product)->
                            whereUser($user)->
                            count()
                            ;

        return $commentCount < 2;
    }
}
