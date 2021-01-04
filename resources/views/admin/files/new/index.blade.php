@extends('admin.layouts.default')
@section('admin.content')
    @if($files->count())
        @each('admin.includes.file_to_approve',$files,'file')
    @else
        <p class="has-text-weight-bold">No files to approved</p>
    @endif
@endsection
