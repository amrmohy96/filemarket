<?php


namespace App\Traits\File;


use Illuminate\Database\Eloquent\Builder;

trait FileIsFree
{
    public function isFree(): bool
    {
        return $this->price == 0;
    }
}
