<?php

namespace App\Http\Controllers\Profile\File;

use App\Http\Controllers\Controller;
use App\Http\Requests\File\StoreFileRequest;
use App\Http\Requests\File\UpdateFileRequest;
use App\Models\File\File;
use App\Traits\File\createSkeletonFile;

class FileController extends Controller
{
    use createSkeletonFile;

    public function index()
    {
        $files = userFiles();
        return view('profile.files.index', compact('files'));
    }

    public function create(File $file)
    {
        if (!$file->exists) {
            $file = $this->createSkeletonFile();
            return redirect()->route('files.create.before', $file);
        }
        $this->authorize('touch', $file);
        return view('profile.files.create', compact('file'));
    }

    public function store(StoreFileRequest $request, File $file)
    {
        $this->authorize('touch', $file);
        $file->fill($request->only(['title', 'overview_short', 'overview', 'price']));
        $file->finished = true;
        $file->save();
        return redirect()->route('files')->withSuccess('File Submitted');
    }

    public function edit(File $file)
    {
        $this->authorize('touch', $file);
        $approval = $file->approvals->first();
        return view('profile.files.edit', compact('file','approval'));
    }

    public function update(File $file, UpdateFileRequest $request)
    {
        $this->authorize('touch', $file);

        $approval_properties = $request->only(File::APPROVAL_PROPERTIES);

        if ($file->needsApproval($approval_properties)) {
            $file->createApproval($approval_properties);
            return back()->withSuccess('we,will review file changes');
        }

        $file->update($request->only(['live', 'price']));
        return redirect()->route('files')->withSuccess('File updated');
    }
}
