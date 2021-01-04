@extends('layouts.app')

@section('content')
    @include('profile.layouts.state')
    <section class="section">
        <div class="container">
            <div class="columns">
                <div class="column is-one-quarter">
                   @include('profile.layouts.menu')
                </div>
                <div class="column">
                    @include('layouts.includes.flash')
                    @yield('profile.content')
                </div>
            </div>
        </div>
    </section>
@endsection
