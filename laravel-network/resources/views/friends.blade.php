@extends('layouts.main')

@section('title', 'network-friends')



@section('content')
@include('/blocks.profile-header')

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

<div class="friends-blocks-wrap">
    <div class="friends-main ">
        @foreach ($users as $user)
            <div class="friend-block">
                <div class="friend-img">
                    <img src="{{ asset ('images/cat.jpg') }}" alt="">
                </div>
                <div class="name-and-status">
                    <div class="friend-name">{{ $user->name }}</div>
                    <div class="friend-status">Add friend</div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
