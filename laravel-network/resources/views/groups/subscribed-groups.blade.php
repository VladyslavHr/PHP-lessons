@extends('layouts.main')


@section('title', 'Create group')

@section('content')

@include('blocks.profile-header')

<div class="container mt-5">
    <div class="row">
        <div class="col-sm-3"></div>
        <div class="menu-wrap-groups-ind col-xl-9">
            <nav class="group-ind-menu-navbar navbar navbar-expand-lg navbar-light section-shadow">
                <div class="container-fluid">
                    {{-- <a class="navbar-brand" href="{{ route('groups.index') }}">Groups</a> --}}
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                    <ul class="list-groups-ind navbar-nav me-auto mb-2 mb-lg-0">
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
                    <form class="d-flex">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="groups-update-btn btn btn-outline-success" type="submit">Искать</button>
                    </form>
                    </div>
                </div>
            </nav>
        </div>
    </div>
</div>

<div class="groups-main-wrap container">
    <div class="groups-main row">

        @foreach ($groups as $group)
            <div class="col-sm-4">
            <div class="groups-block row">
                <div class="groups-image col-sm-12">
                    <a href="{{ route('groups.show', $group->id ) }}">
                        <img src="{{ $group->avatar }}" alt="">
                    </a>
                </div>
                <div class="groups-name-desc-subsc col-sm-12">
                    <a href="{{ route('groups.show', $group->id ) }}">
                        <div class="group-name">{{$group->name}}</div>
                        <div class="group-name">Has {{count($group->posts)}} posts</div>
                        <div class="group-description">{{$group->description}}</div>
                    </a>
                    <div class="group-subscribe">
                        <a href="{{ route('profiles.show', $group->creator->id) }}">
                            <b>{{ $group->creator->name }}</b>
                        </a>
                     </div>
                </div>
            </div>
        </div>
        @endforeach

    </div>
</div>

@endsection
