<?php


namespace App\Traits\User;


use App\Models\Upload\Upload;

trait UserHasManyUploads
{
    public function uploads(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Upload::class);
    }
}
