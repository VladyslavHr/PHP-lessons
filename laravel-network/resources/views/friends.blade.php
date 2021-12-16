@extends('layouts.main')

@section('title', 'network-friends')



@section('content')
@include('/blocks.profile-header')

<div class="container mt-5">
    <div class="row">
        <div class="col-sm-3"></div>
        <div class="col-sm-9">
            <div class="top-navi">
                <div class="friends-count">Друзья (кол-во)</div>
                    <ul class="navi-list">
                        <li><a href="#">Все</a></li>
                        <li><a href="#">Недавние</a></li>
                        <li><a href="#">Родственники</a></li>
                        <li><a href="#">Коллаж</a></li>
                        <li><a href="#">Запрос</a></li>
                        <li><button type="submit"><i class="bi bi-list"></i></button></li>
                    </ul>
            </div>
        </div>
    </div>
</div>

<div class="friends-blocks-wrap container">
    <div class="friends-main row">
        @foreach ($users as $user)
        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">
            <div class="friend-block row">
                <div class="friend-img col-sm-3">
                    <img src="{{ $user->avatar }}" alt="">
                </div>
                <div class="name-and-status col-sm-9">
                    <div class="friend-name text-truncate">{{ $user->name }}</div>
                    <div class="friend-status">Add friend</div>
                </div>
            </div>
        </div>

        @endforeach
    </div>
</div>
@endsection
