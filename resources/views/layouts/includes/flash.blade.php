@if(session()->has('success'))
    <div class="notification is-link">
        {{ session('success') }}
    </div>
@endif

@if(session()->has('error'))
    <div class="notification is-danger">
        {{ session('error') }}
    </div>
@endif
