@extends('layouts.main')

@section('title', 'Profile-page')



@section('content')

@include('/blocks.profile-header')

<div class="prof-main-content container">
    <div class="row">
        <div class="col-lg-3">
            <div class="left-content">
                <div class="user-info-block">
                    <div class="name">
                        <span>{{ $user->name }}</span>
                    </div>
                    <div class="info-text">
                        <p>
                            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ullam incidunt, perferendis eius modi voluptates atque, numquam quae ducimus
                            sed architecto eligendi veniam repellat nesciunt fuga earum optio culpa molestias. Accusantium.
                        </p>
                    </div>
                    <div class="info-list-wrap">
                        <ul class="info-list">
                            <li>
                                <a><i class="bi bi-briefcase"></i>Работа</a></li>
                            <li>
                                <a><i class="bi bi-house-door"></i>Дом</a></li>
                            <li>
                                <a><i class="bi bi-geo-alt"></i>Место</a></li>
                            <li>
                                <a><i class="bi bi-hand-thumbs-up"></i>Интересы</a></li>
                        </ul>
                    </div>
                </div>

                <div class="memories-block">
                    <div class="memories-title">
                        <span>Воспоминания</span>
                    </div>
                    <div class="memories-pictures row row-5">
                    <div class="col-4"><a href="#"><img src="{{ asset ('images/banner1.jpg') }}" alt=""></a></div>
                    <div class="col-4"><a href="#"><img src="{{ asset ('images/banner1.jpg') }}" alt=""></a></div>
                    <div class="col-4"><a href="#"><img src="{{ asset ('images/banner1.jpg') }}" alt=""></a></div>
                    <div class="col-4"><a href="#"><img src="{{ asset ('images/banner1.jpg') }}" alt=""></a></div>
                    <div class="col-4"><a href="#"><img src="{{ asset ('images/banner1.jpg') }}" alt=""></a></div>
                    <div class="col-4"><a href="#"><img src="{{ asset ('images/banner1.jpg') }}" alt=""></a></div>
                    </div>

                </div>

                <div class="possibles-block">
                    <div class="possible-title">
                        <span>Вам может понравиться</span>
                    </div>
                    <ul class="possibles-list">
                        @foreach ($user->groups as $group)
                            <li>
                                <a href="#">
                                    <div class="d-flex">
                                        <div class="group-image">
                                            <img src="{{ $group->avatar}}" alt="">
                                        </div>
                                        <h3 class="group-name text-truncate">{{ $group->name }}</h3>
                                        <button class="group-follow"><i class="bi bi-suit-heart"></i></button>
                                    </div>

                                    <p class="group-info">
                                        {{ $group->description }}
                                    </p>

                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-xl-6 col-lg-9">
            <div class="center-content">
                <div class="prof-publish">
                    @include('blocks.add-post-form')
                </div>
                <div class="publishing">
                    {{ $user->posts_paginated->links() }}
                    @foreach ($user->posts_paginated as $post)

                    <div class="post-block">
                        <div class="post-title">
                            <div class="user-image">
                                <img src="{{ asset ('images/cat.jpg') }}" alt="">
                            </div>
                            <div class="user-info">
                                <span class="user-name">{{ $post->title }}</span>
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
                    {{ $user->posts_paginated->links() }}
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-12">
            <div class="right-content">
                <div class="notif-block">
                    <div class="title">
                        <span>Уведомления</span>
                    </div>
                    <ul class="list">
                        <li>
                            <div class="friend-notif-info">
                                <a href="#">
                                    <div class="friend-image">
                                        <img src="{{ asset ('images/cat.jpg')}}" alt="">
                                    </div>
                                    <div class="notif-message-time">
                                        <span class="message-notif">Message</span>
                                        <span class="since-time">15 min ago</span>
                                    </div>

                                </a>

                            </div>
                        </li>
                        <li>
                            <div class="friend-notif-info">
                                <a href="#">
                                    <div class="friend-image">
                                        <img src="{{ asset ('images/cat.jpg')}}" alt="">
                                    </div>
                                    <div class="notif-message-time">
                                        <span class="message-notif">Message</span>
                                        <span class="since-time">15 min ago</span>
                                    </div>

                                </a>

                            </div>
                        </li>
                        <li>
                            <div class="friend-notif-info">
                                <a href="#">
                                    <div class="friend-image">
                                        <img src="{{ asset ('images/cat.jpg')}}" alt="">
                                    </div>
                                    <div class="notif-message-time">
                                        <span class="message-notif">Message</span>
                                        <span class="since-time">15 min ago</span>
                                    </div>

                                </a>

                            </div>
                        </li>
                        <li>
                            <div class="friend-notif-info">
                                <a href="#">
                                    <div class="friend-image">
                                        <img src="{{ asset ('images/cat.jpg')}}" alt="">
                                    </div>
                                    <div class="notif-message-time">
                                        <span class="message-notif">Message</span>
                                        <span class="since-time">15 min ago</span>
                                    </div>

                                </a>

                            </div>
                        </li>
                        <li>
                            <div class="friend-notif-info">
                                <a href="#">
                                    <div class="friend-image">
                                        <img src="{{ asset ('images/cat.jpg')}}" alt="">
                                    </div>
                                    <div class="notif-message-time">
                                        <span class="message-notif">Message</span>
                                        <span class="since-time">15 min ago</span>
                                    </div>

                                </a>

                            </div>
                        </li>
                    </ul>
                </div>
                <div class="ad-block">
                    <div class="title">
                        <span>Реклама</span>
                    </div>
                    <a href="#">
                        <img src="{{ asset ('images/banner1.jpg') }}" alt="">
                    </a>
                </div>
                <div class="friends-block">
                    <div class="title">
                        <span>Друзья</span>
                    </div>
                    @foreach ($users as $user)
                    <ul class="list">
                        <li>
                            <div class="friend-block-inf">
                                <a href="#">
                                    <div class="friend-image">
                                        <img src="{{ asset ('images/cat.jpg') }}" alt="">
                                    </div>
                                    <div class="under-block">
                                        <span class="friend-name">{{ $user->name }}</span>
                                        <span class="friend-active">Activness</span>
                                    </div>
                                    <button class="like">
                                        <i class="bi bi-suit-heart"></i>
                                    </button>
                                </a>
                            </div>
                        </li>
                    </ul>
                    @endforeach
                </div>
            </div>
        </div>
    </div>


</div>
@endsection
