@extends('layouts.main')

@section('title', 'Groups page')

@section('content')

@include('/blocks.profile-header')

<div class="container mt-5">
    <div class="row">
        <div class="col-sm-3"></div>
        <div class="col-sm-9">
            <div class="top-navi">
                <div class="friends-count">Группы (кол-во)</div>
                    <ul class="navi-list">
                        <li><a href="#">Все</a></li>
                        <li><a href="#">Мои группы</a></li>
                        <li><a href="#">Мои подписки</a></li>
                        <li><a href="{{ route('groups.create') }}">Создать группу</a></li>
                        <li><a href="#">Может быть интересным</a></li>
                        <li><button type="submit"><i class="bi bi-list"></i></button></li>
                    </ul>
            </div>
        </div>
    </div>
</div>
{{--
col-xl-3 col-lg-4 col-md-6 col-sm-12 --}}

<div class="groups-main-wrap container">
    <div class="groups-main row">
        <div class="col-sm-5">
            <div class="groups-block">
                <div class="groups-image">
                    <div>
                        <img src="{{ $group->avatar }}" alt="">
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
            <div class="group-info-list">
                <ul class="group-list-link">
                    <li><a href="#" class="group-info-link">Подписчики</a></li>
                    <li><a href="#" class="group-info-link">Фото</a></li>
                    <li><a href="#" class="group-info-link">Мероприятия</a></li>
                    <li><a href="#" class="group-info-link">Темы</a></li>
                    <li><a href="#" class="group-info-link">Файлы</a></li>
                </ul>
            </div>
        </div>
        <div class="col-sm-7">
            <div class="group-publish">
                <form class="avatar-publish" action="" method="POST">

                    <div class="publish-block">
                        <img src="{{ asset ('images/cat.jpg') }}" alt="">
                        <input type="text" placeholder="Заголовок">
                        <label class="post-status-select">Доступ публикаций</label>
                        <select class="post-status-choose" name="post_status">
                            <option value="0">Выберите доступ</option>
                            <option value="1">Доступно всем</option>
                            <option value="2">Доступно только подписчикам</option>
                        </select>
                        <label for="post_text"></label>
                        <textarea class="post-text-place" name="publish_text" type="text" id="post_text" placeholder="Напишите что-нибудь"></textarea>
                        <button type="submit">Поделиться</button>
                    </div>
                </form>
            </div>
            <div class="publishing">
                @foreach ($group->posts as $post)
                <div class="post-block">
                    <div class="post-title">
                        <div class="user-image">
                            <img src="{{ asset ('images/cat.jpg') }}" alt="">
                        </div>
                        <div class="user-info">
                            <span class="user-name">{{ $post->author->name }}</span>
                            <span class="post-time">{{ $post->date_formated() }}</span>
                        </div>
                        <div class="post-set-bar">
                            <a href="#"><i class="bi bi-list"></i></a>
                        </div>
                    </div>
                    <div class="post-content">
                        <p>
                            {{$post->content}}
                        </p>
                        <img src="{{ asset ('images/banner1.jpg') }}" alt="">
                    </div>
                    <div class="post-summery">
                        <div class="post-like">
                            <a href="#">
                                <i class="bi bi-suit-heart"></i>
                                <span class="like-count">Вам и еще 110 людям это понравилось</span>
                            </a>
                        </div>
                        <div class="post-comments">
                            <a href="#">
                                <i class="bi bi-chat-dots"></i>
                                <span  class="count">{{$post->comment_count}}</span>
                            </a>
                        </div>
                        <div class="post-share">
                            <a href="#">
                                <i class="bi bi-share"></i>
                                <span class="count">6</span>
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

@endsection
