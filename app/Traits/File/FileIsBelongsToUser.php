<?php


namespace App\Traits\File;


use App\User;

trait FileIsBelongsToUser
{
    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
