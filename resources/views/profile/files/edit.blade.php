@extends('profile.layouts.default')

@section('profile.content')
    <h1 class="title">Make changes to {{$file->title}}</h1>
    @if($approval)
        @include('profile.files.includes.approval_changes')
    @endif
    <form action="{{route('files.update',$file)}}" method="post" class="form">
        @csrf
        @method('patch')
        <input type="hidden" name="live" value="false">

        <div class="field">
            <div id="file" class="dropzone {{ $errors->has('uploads') ? ' is-danger' : '' }}"></div>
            @if ($errors->has('uploads'))
                <p class="help is-danger">{{ $errors->first('uploads') }}</p>
            @endif
        </div>


        <div class="field">
            <p class="control">
                <label for="live" class="checkbox">
                    <input type="checkbox" name="live" id="live"{{ $file->live ? ' checked' : '' }}>
                    Live
                </label>
            </p>
        </div>

        <div class="field">
            <label for="title" class="label">Title</label>
            <p class="control">
                <input type="text" name="title" id="title" value="{{old('title') ? old('title'): $file->title}}"
                       class="input{{ $errors->has('title') ? ' is-danger' : '' }}">
            </p>
            @if ($errors->has('title'))
                <p class="help is-danger">{{ $errors->first('title') }}</p>
            @endif
        </div>

        <div class="field">
            <label for="overview_short" class="label">Short overview</label>
            <p class="control">
                <input type="text" name="overview_short" id="overview_short"
                       value="{{ old('overview_short') ? old('overview_short') : $file->overview_short }}"
                       class="input{{ $errors->has('overview_short') ? ' is-danger' : '' }}">
            </p>
            @if ($errors->has('overview_short'))
                <p class="help is-danger">{{ $errors->first('overview_short') }}</p>
            @endif
        </div>

        <div class="field">
            <label for="overview" class="label">Overview</label>
            <p class="control">
                <textarea name="overview" id="overview"
                          class="textarea{{ $errors->has('overview') ? ' is-danger' : '' }}">{{ old('overview') ? old('overview') : $file->overview }}</textarea>
            </p>
            @if ($errors->has('overview'))
                <p class="help is-danger">{{ $errors->first('overview') }}</p>
            @endif
        </div>

        <div class="field">
            <label for="price" class="label">Price (£)</label>
            <p class="control">
                <input type="text" name="price" id="price" value="{{ old('price') ? old('price') : $file->price }}" class="input{{ $errors->has('price') ? ' is-danger' : '' }}">
            </p>
            @if ($errors->has('price'))
                <p class="help is-danger">{{ $errors->first('price') }}</p>
            @endif
        </div>

        <div class="field is-grouped">
            <p class="control">
                <button class="button is-link">Save</button>
            </p>
            <p>We'll review your file before it goes live.</p>
        </div>
    </form>
@endsection
@section('scripts')
    @include('files.includes.js')
@endsection
