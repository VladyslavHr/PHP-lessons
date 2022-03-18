<div class="container">
    <div class="row">
        <div class="col-sm-3">
            <!-- Default dropup button -->
            <div class="btn-group dropup footer-search-block">
                <input type="search" class="dropdown-toggle footer-search-input" data-bs-toggle="dropdown" aria-expanded="false" placeholder="Search your friend">
                <button>
                    <i class="bi bi-search"></i>
                </button>
                <ul class="dropdown-menu footer-search-menu">
                    <div class="footer-search-menu-head row align-items-center">
                        <a href="#" class="footer-search-settings col-sm-3 text-center">
                            <i class="bi bi-gear"></i>
                        </a>
                        <div class="footer-search-title col-sm-6 text-center">
                            <h5>Search friends</h5>
                        </div>
                        <div class="footer-search-close col-sm-3 text-center" aria-expanded="false">
                            <i class="bi bi-x-lg"></i>
                        </div>
                    </div>
                @foreach (auth()->user()->friends as $user)
                    <div class="footer-user-list">
                        <a href="#" class="footer-user-link">
                            <div class="footer-user-avatar-search col-sm-2">
                                <img src="{{ $user->avatar }}" alt="">
                            </div>
                            <div class="footer-user-name col-sm-10">{{ $user->name }}</div>
                        </a>
                    </div>
                @endforeach
                </ul>
            </div>
        </div>
        <div class="col-sm-6">
            {{-- <div id="carouselExampleControlsNoTouching" class="carousel slide" data-bs-touch="false" data-bs-interval="false"> --}}
                    <div class="scrolling-carousel">
                        @foreach (auth()->user()->friends as $user)
                        <div class="scrolling-carousel-item">
                                <div class="footer-user-avatar-block">
                                    <a href="#">
                                        <img src="{{ $user->avatar }}" alt="">
                                    </a>

                                </div>
                        </div>
                        @endforeach
                    </div>

                {{-- <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControlsNoTouching" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                  </button>
                  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControlsNoTouching" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                  </button> --}}
            {{-- </div> --}}
        </div>
        <div class="col-sm-3">
            <form class="footer-message-block row">
                <textarea class="footer-textarea col-sm-10" type="text" placeholder="text message"></textarea>
                <button class="col-sm-2 footer-textarea-button">
                    Send
                    {{-- <i class="bi bi-send-fill"></i> --}}
                </button>

            </form>
        </div>
    </div>
</div>
