<?php

namespace App\Observers\FileApproval;

use App\Models\FileApproval\FileApproval;

class FileApprovalObserver
{

    public function creating(FileApproval $fileApproval)
    {
        return $fileApproval->file->approvals->each->delete();
    }

}
