<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\File\FileApproved;
use App\Mail\File\FileRejected;
use App\Models\File\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class FileNewController extends Controller
{

    public function index()
    {
        $files = File::unapproved()->oldest()->get();
        return view('admin.files.new.index',compact('files'));
    }

    public function update(File $file)
    {
        $file->approve();
        //Mail::to($file->user)->send(new FileApproved($file));
        return back()->withSuccess('File has been approved.');
    }


    public function destroy(File $file)
    {
        $file->delete();
        $file->uploads->each->delete();
       // Mail::to($file->user)->send(new FileRejected($file));
        return back()->withSuccess('File has been rejected.');
    }
}
