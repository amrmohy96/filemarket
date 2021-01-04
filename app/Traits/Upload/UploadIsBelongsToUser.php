<?php


namespace App\Traits\Upload;


use App\User;

trait UploadIsBelongsToUser
{
    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
