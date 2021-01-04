<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\File\File;
use Illuminate\Http\Request;

class FileController extends Controller
{
    public function show(File $file)
    {
        $file = $this->previewFileChanges($file);
        return view('files.show',[
            'file' => $file,
            'uploads' => $file->uploads
        ]);
    }

    public function previewFileChanges(File $file): File
    {
        if ($file->approvals->count()){
            $file->fill($file->approvals->first()->toArray());
        }
        return $file;
    }

}
