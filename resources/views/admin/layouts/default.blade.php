@extends('layouts.app')

@section('content')
    @include('admin.layouts.includes.state')
    <section class="section">
        <div class="container">
            <div class="columns">
                <div class="column is-one-quarter">
                  @include('admin.layouts.includes.menu')
                </div>
                <div class="column">
                    @include('layouts.includes.flash')
                    @yield('admin.content')
                </div>
            </div>
        </div>
    </section>
@endsection
