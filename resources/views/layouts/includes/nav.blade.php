<nav class="navbar has-text-weight-bold" role="navigation" aria-label="main navigation">
    <div class="container">
        <div class="navbar-brand">
            <a class="navbar-item" href="{{route('home')}}">
                {{config('app.name','file')}}
            </a>

            <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false"
               data-target="navbarBasicExample">
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
            </a>
        </div>
        <div id="navbarBasicExample" class="navbar-menu">
            <div class="navbar-start">
                <a class="navbar-item">
                    Home
                </a>
            </div>

            <div class="navbar-end">
                <div class="navbar-item">
                    <div class="buttons">
                        @if(auth()->check())

                            @role('admin')
                            <a href="{{route('admin.index')}}" class="button is-link has-text-weight-bold">
                                Admin
                            </a>
                            @endrole

                            <a href="{{route('profile')}}" class="button is-link">
                                Your profile
                            </a>

                            <a href="{{route('logout')}}" class="button is-light"
                               onclick="event.preventDefault(); document.getElementById('logout').submit();">
                                Sign out
                            </a>
                        @else
                            <a href="{{route('login')}}" class="button is-link">
                                <strong>Sign up</strong>
                            </a>
                            <a href="{{route('register')}}" class="button is-light">
                                Start selling
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>
<form id="logout" action="{{ route('logout') }}" method="POST" class="is-hidden">
    {{ csrf_field() }}
</form>
