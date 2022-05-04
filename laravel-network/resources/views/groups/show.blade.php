@extends('layouts.main')

@section('title', 'Groups page')

@section('dynamic-menu')
    @include('blocks.groups-menu')
@endsection

@section('content')

@include('blocks.profile-header')



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
                            @if ($group->creator->id === auth()->user()->id)
                                <a href="{{ route('groups.edit', $group) }}"><i class="bi bi-pencil-square"></i></a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="groups-block">
                <ul class="group-list-link">
                    <li><a href="#" class="group-info-link">Подписчики</a></li>
                    <li><a href="{{ route('albums.index') }}" class="group-info-link">Фото</a></li>
                    <li><a href="#" class="group-info-link">Мероприятия</a></li>
                    <li><a href="#" class="group-info-link">Темы</a></li>
                    <li><a href="#" class="group-info-link">Файлы</a></li>
                </ul>
            </div>
        </div>
        <div class="col-md-7">

            @include('blocks.add-post-form')

            <div id="post_list_paginated">
                @include('blocks.posts-list', [ 'object' => $group,  ])
            </div>
        </div>
    </div>
</div>


@endsection


