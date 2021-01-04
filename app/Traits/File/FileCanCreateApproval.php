<?php


namespace App\Traits\File;


trait FileCanCreateApproval
{
    public function createApproval(array $approval_properties)
    {
        $this->approvals()->create($approval_properties);
    }
}
