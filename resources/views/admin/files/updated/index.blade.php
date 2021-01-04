@extends('admin.layouts.default')
@section('admin.content')
   @if($files->count())
       @each('admin.includes.file_to_updated',$files,'file')
   @else
       <p>No files to be updated</p>
   @endif
@endsection
