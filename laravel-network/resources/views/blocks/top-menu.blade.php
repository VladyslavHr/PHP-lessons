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

            <form class="navbar-search-form" id="main_search_form" action="{{ route('profiles.search') }}">
            <input name="query" value="{{ request()->get('query') }}" class="form-control global-search me-2" type="search" placeholder="Search" aria-label="Search" autocomplete="off">
            <ul class="search-autocomplete" id="search_autocomplete">

            </ul>
            <button class="btn btn-outline global-search-btn" type="submit">Search</button>
            </form>
            <script>
                var results_count = 0;
                $('input[name="query"]').on('input', function(e) {
                    if (this.value.length > 0) {
                      $.get('/api/search', {
                          query: this.value
                      }, function(data) {
                            if(data.status && data.status === 'ok'){
                                results_count = data.results_count
                                $('#search_autocomplete').html(data.search_list_html)
                            }
                      })
                    }else{
                        $('#search_autocomplete').html('')
                    }
                })

                var activeIndex = -1
                $('input[name="query"]').on('keydown', function(e){
                  if(e.which === 13 && $('#search_autocomplete li.active').length){
                      e.stopPropagation()
                      $('#search_autocomplete li.active a')[0].click()
                      return false
                  }
                  $('#search_autocomplete li.active').removeClass('active')
                  if (e.which === 38 || e.which === 40) {
                      if (e.which === 38) { // arrow up
                          activeIndex = in_range(activeIndex - 1, 0, results_count - 1)
                      }
                      if (e.which === 40) { // arrow down
                          activeIndex = in_range(activeIndex + 1, 0, results_count - 1)
                      }
                      $('#search_autocomplete li.result-item').eq(activeIndex).addClass('active')
                      return false
                  }else{
                      activeIndex = -1
                  }
                  log(activeIndex)
                })
                function in_range(num, min, max) {
                    if(num < min) return max
                    if(num > max) return min
                    return num
                }

                $('input[name="query"]').focus(function(){
                    document.body.classList.remove('ajax_loader')
                    $('#search_autocomplete').css('display', 'block')
                })
                // $('input[name="query"]').blur(function(){
                //     setTimeout(function(){
                // $('#search_autocomplete').css('display', 'none')
                //     }, 100)
                // })

                $('body').on('click', function(e){
                    if (!$(e.target).closest('#main_search_form').length && !$('input[name="query"]').length)
                    {
                        document.body.classList.add('ajax_loader')
                        $('#search_autocomplete').css('display', 'none')
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
                                <img src="{{ Auth::user()->avatar }}" alt="">
                            </div>

                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a href="{{ route('profiles.edit') }}" class="dropdown-item">Edit profile</a>
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

