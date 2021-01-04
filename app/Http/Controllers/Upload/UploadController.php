<?php

namespace App\Http\Controllers\Upload;

use App\Http\Controllers\Controller;
use App\Models\File\File;
use App\Models\Upload\Upload;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;



class UploadController extends Controller
{
    public function __construct()
    {
        return $this->middleware(['auth']);
    }

    public function store(File $file,Request $request)
    {
        $upload = $request->file('file');
        $upload_file = $this->storeUpload($file,$upload);
        Storage::disk('local')
            ->putFileAs(
                'files/'.$file->identifier,
                $upload,
                $upload_file->filename
            );
        return response()->json([
           'id' => $upload_file->id
        ]);
    }

    public function storeUpload(File $file,UploadedFile $uploadedFile)
    {
        $upload = new Upload;
        $upload->fill([
            'filename' => $this->generateFileName($uploadedFile),
            'size' => $uploadedFile->getSize()
        ]);
        $upload->file()->associate($file);
        $upload->user()->associate(auth()->user());
        $upload->save();
        return $upload;
    }

    public function generateFileName(UploadedFile $uploadedFile):string
    {
        return $uploadedFile->getClientOriginalName();
    }

    public function destroy(File $file,Upload $upload)
    {
        $this->authorize('touch',$file);
        if ($file->uploads->count() == 1){
            return response()->json([null,422]);
        }
        $upload->delete();
    }

}
