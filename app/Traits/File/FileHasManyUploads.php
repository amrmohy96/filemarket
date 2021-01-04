<?php


namespace App\Traits\File;


use App\Models\Upload\Upload;

trait FileHasManyUploads
{
    public function uploads(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Upload::class);
    }
}
