<div class="profile-banner">
    <img src="{{ asset ('images/banner1.jpg') }}" alt="">
</div>
<div class="bg-white">
    <div class="container">

        <div class="profile-wrapp row align-items-start">
            <label class="prof-avatar-main col-sm-3">
                <img id="profile_avatar_{{ $user->id }}" src="{{ asset ('images/cat.jpg') }}" alt="">
            </label>

            <script>
                window.addEventListener('DOMContentLoaded', function () {
                    upload_image({
                    ui_avatar: 'profile_avatar_{{ $user->id }}'
                })
                });
            </script>

            <div class="col-lg-9 ">

                <nav class="profile-list-menu-mobile navbar navbar-expand-lg navbar-light">
                    <div class="container-fluid">
                      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo04" aria-controls="navbarTogglerDemo04" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                      </button>

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
                          {{-- <button class="profile-edit-btn btn btn-outline-success" type="submit">Редактировать</button> --}}
                        </form>
                      </div>
                      <a class="navbar-brand profile-edit-btn btn btn-outline-success" href="/">Редактировать</a>
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
                </div> --}}
            </div>
        </div>


    </div>
</div>
