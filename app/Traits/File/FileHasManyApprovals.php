<?php


namespace App\Traits\File;


use App\Models\FileApproval\FileApproval;

trait FileHasManyApprovals
{
    public function approvals(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(FileApproval::class);
    }
}
