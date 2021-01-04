<?php


namespace App\Traits\User;


use App\Models\File\File;

trait UserHasManyFiles
{
    public function files(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(File::class);
    }
}
