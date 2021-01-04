<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\File\File;
use Illuminate\Http\Request;

class FileUpdatedController extends Controller
{
    public function index()
    {
        $files = File::whereHas('approvals')->oldest()->get();
        return view('admin.files.updated.index',compact('files'));
    }

    public function update(File $file)
    {
        $file->mergeApprovalProperties();
        $file->approveAllUploads();
        $file->deleteAllApprovals();
        return back()->withSuccess("{$file->title} changes have been approved.");
    }

    public function destroy(File $file)
    {

         $file->deleteAllApprovals();
         $file->deleteUnapprovedUploads();
        return back()->withSuccess("{$file->title} changes have been rejected.");
    }
}
