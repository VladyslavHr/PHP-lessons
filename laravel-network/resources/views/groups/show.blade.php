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
        <div class="col-sm-4">
            <div class="groups-block row">
                <div class="groups-image col-sm-12">
                    <a href="#">
                        <img src="{{ $group->avatar }}" alt="">
                    </a>
                </div>
                <div class="groups-name-desc-subsc col-sm-12">
                    <a href="#">
                        <div class="group-name">{{$group->name}}</div>
                        <div class="group-description">{{$group->description}}</div>
                        <div class="group-subscribe">
                           <button type="submit">Subcribe</button>
                        </div>
                    </a>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection
