<?php


namespace App\Traits\Upload;


use App\Models\File\File;

trait UploadIsBelongsToFile
{
    public function file(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(File::class);
    }
}
