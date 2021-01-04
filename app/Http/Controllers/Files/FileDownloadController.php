<?php

namespace App\Http\Controllers\Files;

use App\Http\Controllers\Controller;
use App\Models\File\File;
use App\Models\Sale\Sale;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Madnest\Madzipper\Madzipper;

class FileDownloadController extends Controller
{
    protected $zipper;
    public function __construct(Madzipper $madzipper)
    {
        $this->zipper = $madzipper;
    }

    public function show(File $file,Sale $sale)
    {
        if (!$file->visible()){
            abort(403);
        }

        if (!$file->matchSale($sale)){
            abort(403);
        }
        $this->createZipForFileInPath($file,$path = $this->generateTemporaryPath($file));
        return response()->download($path)->deleteFileAfterSend(true);
    }

    public function createZipForFileInPath(File $file,$path)
    {
        $this->zipper->make($path)->add($file->getUploadsList())->close();
    }

    protected function generateTemporaryPath(File $file): string
    {
        return public_path('tmp/'.Str::slug($file->title).'.zip');
    }
}
