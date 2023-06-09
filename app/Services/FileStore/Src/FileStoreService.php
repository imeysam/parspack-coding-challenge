<?php

namespace App\Services\FileStore\Src;

use App\Services\FileStore\Contracts\FileStoreServiceInterface;

class FileStoreService implements FileStoreServiceInterface
{
    /**
     * @var string
     */
    private $file_full_path;

    public function __construct()
    {
        $this->file_full_path = storage_path('product_comments');

        exec("touch {$this->file_full_path}");
    }

    public function empty()
    {
        $result = exec("cat /dev/null > {$this->file_full_path}");
        return $result;
    }

    public function store($name, $value)
    {
        $result = exec("grep -rnw '{$this->file_full_path}' -e '{$name}:.*'");
        if(strlen($result) > 0)
        {
            $result = exec("sed -i 's/{$name}:.*/{$name}: {$value}/gm' {$this->file_full_path}");
        }
        else
        {
            $result = exec("echo '{$name}: {$value}' >> {$this->file_full_path}");
        }

        return $result;
    }
}
