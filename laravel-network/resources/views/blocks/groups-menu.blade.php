<nav class="group-ind-menu-navbar navbar navbar-expand-lg navbar-light section-shadow">
    <div class="container-fluid">
        {{-- <a class="navbar-brand" href="{{ route('groups.index') }}">Groups</a> --}}
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
        <ul class="list-groups-ind navbar-nav me-auto mb-2 mb-lg-0 js-no-reload">
            <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Все</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="#">Мои группы</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('groups.subscribedGroups') }}">Мои подписки</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('groups.create') }}">Создать группу</a>
            </li>
            <li class="nav-item">
                 <a class="nav-link" href="#">Может быть интересным</a>
            </li>
            {{-- <li class="nav-item">
            <a class="nav-link disabled">Disabled</a>
            </li> --}}
        </ul>


        @if(routeIs('groups.show'))
            @if ($group->is_subscribed())
                <a href="{{ route('groups.subscribe') }}" class="groups-menu-show-btn btn btn-outline-success"
                onclick="group_subscribe(this, event)" data-groupid = {{ $group->id }}>Unsubscribe</a>
            @else
                <a href="{{ route('groups.subscribe') }}" class="groups-menu-show-btn btn btn-outline-success"
                onclick="group_subscribe(this, event)" data-groupid = {{ $group->id }}>Subscribe</a>
            @endif
        @endif
        </div>
    </div>
</nav>
