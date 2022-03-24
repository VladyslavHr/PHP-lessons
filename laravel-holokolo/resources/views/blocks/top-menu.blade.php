
<nav class="navbar navbar-expand-lg navbar-dark bg-dark top-menu">
    <div class="container d-flex">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" aria-current="page" href="{{ route('home') }}">Main page</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('names*') ? 'active' : '' }}" href="{{ route('names.index') }}">Name days</a>
            </li>
            </ul>
            <form class="d-flex  navbar-search-form" id="main_search_form" action="{{ route('names.search') }}">
                <input name="query" value="{{ request()->get('query') }}" class="form-control me-2" type="search" placeholder="Search" aria-label="Search" autocomplete="off">
                <ul class="search-autocomplete" id="search_autocomplete">
                    <li class="result-item"><a href="{{ route('names.search') }}">Name</a></li>
                    <li class="result-item"><a href="{{ route('names.search') }}">Name</a></li>
                    <li class="result-item"><a href="{{ route('names.search') }}">Name</a></li>
                    <li class="result-item"><a href="{{ route('names.search') }}">Name</a></li>
                    <li class="result-item"><a href="{{ route('names.search') }}">Name</a></li>
                </ul>
                <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
                <script>
                    var results_count = 0;
                    $('input[name="query"]').on('input', function(e) {
                        if (this.value.length > 0) {
                          $.get('/Name/search', {
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

            // <form class="d-flex  navbar-search-form" id="main_search_form" action="{{ route('names.search') }}">
            // <input name="query" value="{{ request()->get('query') }}" class="form-control me-2" type="search" placeholder="Search" aria-label="Search" autocomplete="off">
            // <ul class="search-autocomplete" id="search_autocomplete">
            //     {{-- <li class="result-item"><a href="#">Name</a></li>
            //     <li class="result-item"><a href="#">Name</a></li>
            //     <li class="result-item"><a href="#">Name</a></li>
            //     <li class="result-item"><a href="#">Name</a></li>
            //     <li class="result-item"><a href="#">Name</a></li> --}}
            // </ul>
            // <button class="btn btn-outline-success" type="submit">Search</button>
            // </form>
            // <script>
            //     var results_count = 0;
            //     $('input[name="query"]').on('input', function(e) {
            //         if (this.value.length > 0) {
            //           $.get('/api/search', {
            //               query: this.value
            //           }, function(data) {
            //                 if(data.status && data.status === 'ok'){
            //                     results_count = data.results_count
            //                     $('#search_autocomplete').html(data.search_list_html)
            //                 }
            //           })
            //         }else{
            //             $('#search_autocomplete').html('')
            //         }
            //     })
            </script>
        </div>
    </div>
</nav>


