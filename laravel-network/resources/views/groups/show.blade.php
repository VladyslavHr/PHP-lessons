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
                <div class="avatar-publish">
                    <img src="{{ asset ('images/cat.jpg') }}" alt="">
                    <div class="publish-block">
                        <input type="text" placeholder="Напишите что-нибудь">
                        <button type="submit">Поделиться</button>
                    </div>
                </div>
            </div>
            <div class="publishing">
                @foreach ($users as $user)
                <div class="post-block">
                    <div class="post-title">
                        <div class="user-image">
                            <img src="{{ asset ('images/cat.jpg') }}" alt="">
                        </div>
                        <div class="user-info">
                            <span class="user-name">{{ $user->name }}</span>
                            <span class="post-time">20 min ago</span>
                        </div>
                        <div class="post-set-bar">
                            <a href="#"><i class="bi bi-list"></i></a>
                        </div>
                    </div>
                    <div class="post-content">
                        <p>
                            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ipsa quam voluptate perferendis dolores cum doloremque
                            quia mollitia voluptas saepe, fugit eveniet beatae tempore omnis sed repellendus error laborum, vel vitae.
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
                                <span  class="count">20</span>
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
