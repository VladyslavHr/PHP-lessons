@extends('layouts.main')

@section('title', 'Groups page')

@section('content')

@include('blocks.profile-header')

<div class="container mt-5 bg-white">
    <div class="groups-show-menu-wrap row">
        <div class="col-sm-3"></div>
        <div class=" col-lg-12 col-xl-9 col-xxl-9">
            <nav class="group-show-menu-navbar navbar navbar-expand-lg navbar-light">
                <div class="container-fluid">
                  <a class="navbar-brand" href="{{ route('groups.index') }}">Groups</a>
                  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                  </button>
                  <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                    <ul class="list-groups-show navbar-nav me-auto mb-2 mb-lg-0">
                      <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Все</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="#">Мои группы</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="#">Мои подписки</a>
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
                      {{-- <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"> --}}
                      <button class="groups-menu-show-btn btn btn-outline-success" type="submit">Редактировать группу</button>
                    </form>
                  </div>
                </div>
              </nav>
            {{-- <div class="top-navi">
                <div class="friends-count">Группы (кол-во)</div>
                    <ul class="navi-list">
                        <li><a href="#">Все</a></li>
                        <li><a href="#">Мои группы</a></li>
                        <li><a href="#">Мои подписки</a></li>
                        <li><a href="{{ route('groups.create') }}">Создать группу</a></li>
                        <li><a href="#">Может быть интересным</a></li>
                        <li><button type="submit"><i class="bi bi-list"></i></button></li>
                    </ul>
            </div> --}}
        </div>
    </div>
</div>
{{--
col-xl-3 col-lg-4 col-md-6 col-sm-12 --}}

<div class="groups-main-wrap container">
    <div class="groups-main row">
        <div class="col-md-5">
            <div class="groups-block">
                <div class="groups-image">
                    <div>
                        <label class="upload-image-label">
                            <img src="{{ $group->avatar }}"
                                alt=""
                                data-upload="image"
                                data-ajaxurl="/groups/uploadAvatar"
                                data-width="800"
                                data-height="200"
                                data-modelid="{{ $group->id }}"
                            >
                        </label>
                    </div>
                </div>
                <div class="groups-name-desc-subsc">
                    <div>
                        <div class="group-name">{{$group->name}}</div>
                        <div class="group-description">{{$group->description}}</div>
                        <div class="group-subscribe">
                        <button type="submit">Subcribe</button>
                        </div>
                        <div class="group-description">{{$group->creator->name}}
                            @if ($group->creator->id === $group->creator->id)
                                <a href="{{ route('groups.edit', $group) }}"><i class="bi bi-pencil-square"></i></a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="groups-block">
                <ul class="group-list-link">
                    <li><a href="#" class="group-info-link">Подписчики</a></li>
                    <li><a href="#" class="group-info-link">Фото</a></li>
                    <li><a href="#" class="group-info-link">Мероприятия</a></li>
                    <li><a href="#" class="group-info-link">Темы</a></li>
                    <li><a href="#" class="group-info-link">Файлы</a></li>
                </ul>
            </div>
        </div>
        <div class="col-md-7">
            <div class="group-publish">
                @include('blocks.add-post-form')
            </div>
            <div class="publishing">
                {{ $group->posts_paginated->links() }}
                @foreach ($group->posts_paginated as $post_key => $post)

                @include('blocks.post-block')

                @endforeach
                {{ $group->posts_paginated->links() }}
            </div>
        </div>
    </div>
</div>


@endsection


