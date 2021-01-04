<?php


namespace App\Traits\FileApproval;


use App\Models\File\File;

trait FileApprovalIsBelongsToFile
{
    public function file(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(File::class);
    }
}
