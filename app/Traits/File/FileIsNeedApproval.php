<?php


namespace App\Traits\File;


use Illuminate\Support\Arr;

trait FileIsNeedApproval
{
    public function needsApproval(array $approvalProperties):bool
    {
        if ($this->compareOldToNewData($approvalProperties)) {
            return true;
        }
        if ($this->uploads()->unapproved()->count()){
            return true;
        }
        return false;
    }

    private function compareOldToNewData(array $props): bool
    {
        return Arr::only($this->toArray(), self::APPROVAL_PROPERTIES) != $props;
    }
}
