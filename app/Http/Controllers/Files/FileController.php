<?php

namespace App\Http\Controllers\Files;

use App\Http\Controllers\Controller;
use App\Models\File\File;
use Illuminate\Http\Request;

class FileController extends Controller
{
    public function show(File $file)
    {
        if (!$file->visible()){
            return  abort(404);
        }
        $uploads = $file->uploads()->approved()->get();
        return view('files.show',compact('file','uploads'));
    }
}
