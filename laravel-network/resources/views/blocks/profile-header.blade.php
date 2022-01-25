<div class="profile-banner">
    <img src="{{ asset ('images/banner1.jpg') }}" alt="">
</div>
<div class="bg-white">
    <div class="container">

        <div class="profile-wrapp row align-items-start">
            <div class="prof-avatar-main col-sm-3">
                <img src="{{ asset ('images/cat.jpg') }}" alt="">
            </div>

            {{-- <div class="profile-menu "> --}}
                <nav class="profile-list-menu-mobile navbar navbar-expand-lg navbar-light col-sm-9">
                    <div class="container-fluid">
                      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo04" aria-controls="navbarTogglerDemo04" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                      </button>
                      <a class="navbar-brand" href="/">Home</a>
                      <div class="collapse navbar-collapse" id="navbarTogglerDemo04">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                          <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Публикации</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" href="#">О себе</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" href="#">Фотографии</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" href="{{ route('friends') }}">Друзья</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" href="#">Еще</a>
                          </li>
                          {{-- <li class="nav-item">
                            <a class="nav-link disabled">Disabled</a>
                          </li> --}}
                        </ul>
                        <form class="d-flex">
                          {{-- <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"> --}}
                          <button class="profile-edit-btn btn btn-outline-success" type="submit">Редактировать</button>
                        </form>
                      </div>
                    </div>
                  </nav>


                {{-- <ul class="prof-list">
                    <li><a href="#">Публикации</a></li>
                    <li><a href="#">О себе</a></li>
                    <li><a href="#">Фотографии</a></li>
                    <li><a href="/friends">Друзья</a></li>
                    <li><a href="#">Еще</a></li>
                </ul>
                <div class="prof-edit">
                    <a href="#">Редактировать</a>
                </div>
            </div> --}}
        {{-- </div> --}}


    </div>
</div>
