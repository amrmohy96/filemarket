<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('layouts.includes.header')
</head>
<body>
    <div id="app">
        @include('layouts.includes.nav')
        @yield('content')
    </div>
@include('layouts.includes.scripts')
    @yield('scripts')
</body>
</html>
