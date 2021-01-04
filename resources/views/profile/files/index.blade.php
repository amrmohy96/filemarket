@extends('profile.layouts.default')
@section('profile.content')
    <h1 class="title">Files</h1>
    @if(count($files))
    @each('profile.includes.file',$files,'file')
    @else
        <h5>No Files,Create Some.!</h5>
    @endif
@endsection
