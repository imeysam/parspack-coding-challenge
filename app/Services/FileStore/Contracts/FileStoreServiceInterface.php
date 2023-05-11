<?php

namespace App\Services\FileStore\Contracts;

interface FileStoreServiceInterface
{
    public function empty();

    public function store($name, $value);
}
