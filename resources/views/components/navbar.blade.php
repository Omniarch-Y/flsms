<nav class="main-header navbar navbar-expand navbar-white navbar-light">

    <ul class="navbar-nav">
        <li class="nav-item d-none d-sm-inline-block">
            @if(auth()->user()->role == 'loan_officer')
            <a href="/customers" class="nav-link">Home</a>
            @elseif(auth()->user()->role == 'admin')
            <a href="/users" class="nav-link">Home</a>
            @else
            <a href="/loans" class="nav-link">Home</a>
            @endif
        </li>
    </ul>

    <ul class="navbar-nav ml-auto">

        <li class="nav-item">
            <div class="user-panel mt-1 d-flex me-2">
                <div class="image">
                    <img src="{{ Storage::url(auth()->user()->picture) }}" class="img-circle elevation-2"
                        alt="User Image">
                </div>
                <div class="info">
                    <a href="#"
                        class="d-block text-dark">{{ auth()->user()->first_name }}{{ ' ' }}{{ auth()->user()->middle_name }}</a>
                </div>
                
            </div>
        </li>
        @guest
        @if (Route::has('login'))
            <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
            </li>
        @endif
    @else
        <li class="nav-item dropdown">
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                {{ Auth::user()->name }}
            </a>

            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </li>
    @endguest
        <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                <i class="fas fa-expand-arrows-alt"></i>
            </a>
        </li>
    </ul>
</nav>
