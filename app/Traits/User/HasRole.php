<?php


namespace App\Traits\User;


use App\Models\Role\Role;

trait HasRole
{
    public function roles(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Role::class,'user_role');
    }

    public function hasRole($role):bool
    {
        if ( $this->roles->contains('name',$role)){
            return true;
        }
        return false;
    }
}
