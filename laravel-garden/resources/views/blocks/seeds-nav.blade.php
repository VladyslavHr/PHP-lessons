<div class="seeds-navigation mb-5">
    <ul class="nav ">
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('seeds.index') ? 'active' : '' }}" aria-current="page" href="{{ route('seeds.index') }}">Все семена</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('seeds.create') ? 'active' : '' }}" href="{{ route('seeds.create') }}">Добавить семена</a>
        </li>
    </ul>
</div>
