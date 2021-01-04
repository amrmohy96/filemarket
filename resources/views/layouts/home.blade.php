<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    @include ('layouts.includes.header')
</head>
<body>
<div id="app">
    <section class="hero is-link is-large">
        <div class="hero-head">
            @include('layouts.includes.nav')
        </div>
        @yield('content')
    </section>
</div>
</body>
</html>
