<?php


namespace App\Traits\File;


trait FileIsVisible
{
    public function visible(): bool
    {
        if (auth()->user()->isAdmin()) {
            return true;
        }
        if (UserOwnsFile($this->user->id)) {
            return true;
        }
        return $this->live && $this->approved;
    }
}
