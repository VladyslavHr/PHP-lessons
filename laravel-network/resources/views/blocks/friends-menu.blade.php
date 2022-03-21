<div class="container mt-5">
    <div class="row">
        <div class="col-sm-3"></div>
        <div class="col-sm-9">
            <div class="top-navi">
                <div class="friends-count">Друзья (кол-во)</div>
                    <ul class="navi-list">
                        <li><a href="{{ route('profiles.friends') }}">Все</a></li>
                        <li><a href="{{ route('profiles.mutualFollow') }}">Друзья</a></li>
                        <li><a href="{{ route('profiles.following') }}">Подписки</a></li>
                        <li><a href="{{ route('profiles.followers') }}">Подписчики</a></li>
                        <li><a href="#">Запрос</a></li>
                        <li><button type="submit"><i class="bi bi-list"></i></button></li>
                    </ul>
            </div>
        </div>
    </div>
</div>
