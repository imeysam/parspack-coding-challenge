<?php

namespace App\Services\Comment\Contracts;

use App\Models\Product;
use App\Models\User;

interface UserCommentLimitInterface {
    public function validate(Product $product, User $user): bool;
}
