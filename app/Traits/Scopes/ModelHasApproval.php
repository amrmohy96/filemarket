<?php


namespace App\Traits\Scopes;


use Illuminate\Database\Eloquent\Builder;

trait ModelHasApproval
{
    public function scopeApproved(Builder $builder): Builder
    {
        return $builder->where('approved',true);
    }

    public function scopeUnapproved(Builder $builder): Builder
    {
        return $builder->where('approved',false);
    }
}
