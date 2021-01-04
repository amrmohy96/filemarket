<?php


namespace App\Traits\User;


trait UserIsAdmin
{
    public function isAdmin(): bool
    {
        return $this->hasRole('admin');
    }
}
