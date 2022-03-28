
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
            <form class="d-flex  navbar-search-form" id="main_search_form" action="{{ route('names.result') }}">
                <input name="query" value="{{ request()->get('query') }}" class="form-control me-2" type="search" placeholder="Search" aria-label="Search" autocomplete="off">
                <ul class="search-autocomplete" id="search_autocomplete">

                </ul>
                <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
                <script>
                    var results_count = 0;
                    $('input[name="query"]').on('input', function(e) {
                        if (this.value.length > 0) {
                          $.get('/names/search', {
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

                $('body').on('click', function(e){
                    if (!$(e.target).closest('#main_search_form').length && !$('input[name="query"]').length)
                    {
                        document.body.classList.add('ajax_loader')
                        $('#search_autocomplete').css('display', 'none')
                    }
                })
            </script>
        </div>
    </div>
</nav>


