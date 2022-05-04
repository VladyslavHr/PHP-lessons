{{-- <div class="top-navi">
<div class="friends-count">Друзья (кол-во)</div>
    <ul class="navi-list">
        <li><a href="{{ route('profiles.friends') }}">Друзья</a></li>
        <li><a href="{{ route('profiles.following') }}">Подписки</a></li>
        <li><a href="{{ route('profiles.followers') }}">Подписчики</a></li>
        <li><a href="#">Запрос</a></li>
        <li><button type="submit"><i class="bi bi-list"></i></button></li>
    </ul>
</div> --}}

<nav class="navbar navbar-expand-lg navbar-light section-shadow">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#friends-menu" aria-controls="friends-menu" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="friends-menu">
        <ul class="list-groups-ind navbar-nav me-auto mb-2 mb-lg-0 js-no-reload">
            <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{ route('profiles.friends') }}">Друзья</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="{{ route('profiles.following') }}">Подписки</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('profiles.followers') }}">Подписчики</a>
            </li>
            {{-- <li class="nav-item">
                <a class="nav-link" href="{{ route('products.create') }}">Добавить товар</a>
            </li> --}}
            {{-- <li class="nav-item">
                    <a class="nav-link" href="#">Может быть интересным</a>
            </li> --}}
            <li>
            </li>
        </ul>
        </div>
    </div>
</nav>

