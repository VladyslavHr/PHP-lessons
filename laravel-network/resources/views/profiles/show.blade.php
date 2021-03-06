@extends('layouts.main')

@section('title', 'Profile-page')

@section('styles-header')

<link href="/css/lightbox.min.css" rel="stylesheet" />

@endsection

@section('scripts-body')

<script src="/js/lightbox.min.js"></script>
<script>
    lightbox.option({
      'resizeDuration': 200,
      'wrapAround': true
    })
</script>

@endsection

@section('dynamic-menu')
    @include('blocks.friends-menu')
@endsection

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
                            {{ get_random_paragraph() }}
                        </p>
                    </div>
                    <div class="info-list-wrap">
                        <ul class="info-list">
                            <li>
                                <a href="{{ route('profiles.shop') }}"><i class="bi bi-basket2"></i>Магазин</a>
                            </li>
                            <li>
                                <a><i class="bi bi-briefcase"></i>Работа</a>
                            </li>
                            <li>
                                <a><i class="bi bi-house-door"></i>Дом</a>
                            </li>
                            <li>
                                <a><i class="bi bi-geo-alt"></i>Место</a>
                            </li>
                            <li>
                                <a><i class="bi bi-hand-thumbs-up"></i>Интересы</a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="memories-block">
                    <div class="memories-title">
                        <span>Воспоминания</span>
                    </div>
                    <div class="memories-pictures row row-5">

                        @for ($i = 1; $i <= 6; $i++)
                            <div class="col-4">
                                <a data-lightbox="image-remember" href="{{ asset ('/images/dreams/'. $i .'.jpg') }}">
                                    <img src="{{ asset ('/images/dreams/'. $i .'.jpg') }}" alt="">
                                </a>
                            </div>
                        @endfor
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

                @include('blocks.add-post-form')

                <div id="post_list_paginated">
                    @include('blocks.posts-list', [ 'object' => $user,  ])
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
                    <label class="ad-block-label cursor-pointer @if(auth()->user()->role === 'admin') upload-image-label @endif" for="changeBanner">
                        @if (file_exists(public_path('images/profile-banner.jpg')))
                            <img src="{{ asset ('images/profile-banner.jpg?v=' . filemtime(public_path('images/profile-banner.jpg'))) }}"
                            alt="banner">
                        @else
                            <img src="/images/no-image.png" alt="">
                        @endif


                    </label>
                    @if(auth()->user()->role === 'admin')
                        <form class="download-image" action="{{ route('profile.changeBanner') }}"  method="POST" enctype="multipart/form-data">
                            @csrf
                            <input name="banner" type="file" class="form-control download-image-input d-none" id="changeBanner"
                            oninput="this.closest('form').submit()">
                            {{-- <button class="groups-update-btn" type="submit">Сохранить</button> --}}
                            {{-- <label class="input-group-text download-image-label cursor-pointer" for="ad_image">Upload</label> --}}
                        </form>
                    @endif


                </div>
                <div class="friends-block">
                    <div class="title">
                        <span>Друзья</span>
                    </div>
                    <ul class="list">
                        @forelse ($friends as $friend)
                        <li>
                            <div class="friend-block-inf">
                                <a href="#">
                                    <div class="friend-image">
                                        <img src="{{ asset ('images/cat.jpg') }}" alt="">
                                    </div>
                                    <div class="under-block">
                                        <span class="friend-name">{{ $friend->name }}</span>
                                        <span class="friend-active">Activness</span>
                                    </div>
                                    <button class="like">
                                        <i class="bi bi-suit-heart"></i>
                                    </button>
                                </a>
                            </div>
                        </li>
                        @empty
                            <p>You don't have friends</p>
                        @endforelse
                    </ul>
                </div>
            </div>
        </div>
    </div>


</div>
@endsection
