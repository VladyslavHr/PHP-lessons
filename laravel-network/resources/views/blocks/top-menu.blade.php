<div class="container">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
        <a class="navbar-brand" href="#">
            <div class="logo-wrapper-mobile">
                <img src="{{ asset('images/logo.png') }}" alt="">
            </div>
            <span class="navbar-sitename">Navbar</span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" aria-current="page" href="{{ route('home') }}">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs(['profile','main']) ? 'active' : '' }}" href="{{ route('profile') }}">Profile</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('groups*') ? 'active' : '' }}" href="{{ route('groups.index') }}">Groups</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('profiles.friends') ? 'active' : '' }}" href="{{ route('profiles.friends') }}">Friendds</a>
            </li>
            </ul>

            <div class="logo-wrapper">
                <img src="{{ asset('images/logo.png') }}" alt="">
            </div>

            <form class="navbar-search-form" action="{{ route('profiles.search') }}">
            <input name="query" value="{{ request()->get('query') }}" class="form-control global-search me-2" type="search" placeholder="Search" aria-label="Search" autocomplete="off">
            <ul class="search-autocomplete" id="search_autocomplete">
                <li> <a href="#">Hello</a> </li>
                <li> <a href="#">World</a> </li>
            </ul>
            <button class="btn btn-outline global-search-btn" type="submit">Search</button>
            </form>
            <script>
                $('input[name="query"]').on('keyup', function(e){
                    log(this.value)
                    if(this.value.lenght > 1 ) {
                        $.get('/api/search', {
                            query: this.value
                        }, function(data){

                        })
                    }
                })
            </script>

            <ul class="navbar-nav ms-auto">
                <!-- Authentication Links -->
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                    @endif

                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            <div class="navbar-avatar-wrapper">
                                <img src="{{ Auth::user()->avatarUrl() }}" alt="">
                            </div>

                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
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
            </ul>
        </div>
        </div>
    </nav>
</div>

