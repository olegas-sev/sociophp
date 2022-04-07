<header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container container-fluid">
            <a class="navbar-brand" href="{{ route('dashboard') }}">SocioPHP</a>

            @if(Auth::user())
                <form class="d-flex gap-3">
                    <a href="{{ route('account') }}" class="btn btn-primary" role="button">Profile</a>
                    <a href="{{ route('logout') }}" class="btn btn-danger" role="button">Logout</a>
                </form>
            @endif
        </div>
    </nav>
</header>
