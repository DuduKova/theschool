<nav class="navbar navbar-expand navbar-dark bg-info">
    <img src="{{ asset('uploads/CodePro School-logo.png') }}" width="100px" height="50px">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample02"
            aria-controls="navbarsExample02" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExample02">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="/theschool">School</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/users">Administration</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/students/create">student create</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/courses/create">course create</a>
            </li>
        </ul>
        <!-- Right Side Of Navbar -->
        <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#" role="button"
                       aria-haspopup="true">
                        {{ Auth::user()->name }}, {{ Auth::user()->role }} <span class="caret"></span>
                    </a>

                        <a class="nav-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST">
                            @csrf
                        </form>
                </li>
        </ul>
    </div>
</nav>