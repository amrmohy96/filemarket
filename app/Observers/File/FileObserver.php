<?php

namespace App\Observers\File;

use App\Models\File\File;

class FileObserver
{

    public function creating(File $file)
    {
        $file->identifier = uniqid(true);
    }
}
