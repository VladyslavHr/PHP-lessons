{{-- <div class="profile-banner">
    <img src="{{ asset ('images/banner1.jpg') }}" alt="">
</div> --}}
<div class="section-shadow mt-3" style="background-image: url('/images/cover-photo.jpg">
    <div class="container">

        <div class="profile-wrapp row">
            <label class="prof-avatar-main col-md-3  @if ($user->id === auth()->user()->id) {{'upload-image-label'}} @endif">
                @if ($user->id === auth()->user()->id)


                <img src="{{ $user->avatar }}" alt=""
                data-upload="image"
                data-ajaxurl="{{ route('profile.uploadAvatar') }}"
                data-width="500"
                data-height="500"
                data-modelid="{{ $user->id }}"
            >
            @else
                <img src="{{ $user->avatar }}" alt="">
            @endif
            </label>

            <div class="col-md-9 profile-header-right">

                <nav class="profile-list-menu-mobile navbar navbar-expand-lg navbar-light section-shadow">
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
                            <a class="nav-link" href="{{ route('albums.index') }}">Фотографии</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" href="{{ route('profiles.friends') }}">Друзья</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" href="#">Еще</a>
                          </li>

                        </ul>
                        <form class="d-flex">
                          {{-- <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"> --}}
                          {{-- <button class="profile-edit-btn btn btn-outline-success" type="submit">Редактировать</button> --}}
                        </form>
                      </div>
                    @if ($user->id === auth()->user()->id)
                        <a class="navbar-brand profile-edit-btn btn btn-outline-success" href="{{ route('profiles.edit') }}">Редактировать</a>
                    @elseif($user->is_friend)
                        <a class="navbar-brand profile-edit-btn btn btn-outline-success"
                        href="{{ route('profiles.unfollow') }}"
                        data-frienduserid="{{ $user->id }}"
                        onclick="follow(this, event)">Отписаться</a>
                    @else
                        <a class="navbar-brand profile-edit-btn btn btn-outline-success"
                        href="{{ route('profiles.follow') }}"
                        data-frienduserid="{{ $user->id }}"
                        onclick="follow(this, event)">Подписаться</a>
                    @endif

                    </div>
                  </nav>

                  @yield('dynamic-menu')

            </div>{{--col-9--}}

        </div>


    </div>
</div>
