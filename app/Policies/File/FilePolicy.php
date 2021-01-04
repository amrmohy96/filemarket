<?php

namespace App\Policies\File;

use App\Models\File\File;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class FilePolicy
{
    use HandlesAuthorization;


    /**
     * Determine whether the user can touch the model.
     *
     * @param \App\User $user
     * @param \App\Models\File\File $file
     * @return mixed
     */
    public function touch(User $user, File $file)
    {
        return $user->id === $file->user_id;
    }

}
