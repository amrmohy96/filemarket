<?php


namespace App\Traits\File;


trait FileIsApproved
{
    public function approve()
    {
        $this->updateFileToBeVisible();
        $this->approveAllUploads();
    }

    public function updateFileToBeVisible()
    {
        $this->update([
            'live' => true,
            'approved' => true
        ]);
    }

    public function approveAllUploads()
    {
        $this->uploads()->update([
            'approved' => true
        ]);
    }
}
