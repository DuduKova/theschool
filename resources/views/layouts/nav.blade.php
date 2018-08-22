<nav class="navbar navbar-expand navbar-light bg-info font-weight-bold">
    <img src="/storage/uploads/logo.png" width="100px" height="50px">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample02"
            aria-controls="navbarsExample02" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

        <ul class="navbar-nav mr-auto">
            <li class="nav-item {{ Request::segment(1) === 'theschool' ? 'active' : null }}">
                <a class="nav-link" href="/theschool">School</a>
            </li>

            @guest

            @else


                <li class="nav-item {{ Request::segment(1) === 'users' ? 'active' : null }}">
                    @if(Auth::user()->role !== 'sales')
                        <a class="nav-link" href="/users">Administration</a>
                    @endif
                </li>
        </ul>
    <!-- Right Side Of Navbar -->
    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <a class="nav-link pr-4" href="/users/{{Auth::user()->id}}" role="button"
               aria-haspopup="true">
                {{ Auth::user()->name }}, {{ Auth::user()->role }} <span class="caret"></span>
            </a>
            <a class="nav-item float-right btn btn-sm btn-dark" href="{{ route('logout') }}"
               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                @csrf
            </form>
        </li>
        <li> <img src="/storage/uploads/{{Auth::user()->img}}" class="rounded-circle float-right" width="50px"
                  height="50px"></li>

    </ul>

            @endguest

</nav>