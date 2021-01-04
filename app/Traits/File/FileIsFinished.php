<?php


namespace App\Traits\File;


use Illuminate\Database\Eloquent\Builder;

trait FileIsFinished
{
    public function scopeFinished(Builder $builder): Builder
    {
        return $builder->where('finished',true);
    }
}
