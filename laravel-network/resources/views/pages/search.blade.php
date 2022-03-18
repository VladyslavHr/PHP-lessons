@extends('layouts.main')

@section('title', 'Search')



@section('content')
@include('/blocks.profile-header')

<div class="container mt-5">
    <div class="row">
        <div class="col-sm-3"></div>
        <div class="col-sm-9">
            <div class="top-navi">
                <div class="friends-count">{!! $message !!}</div>
                <div class="btn-group" role="group" aria-label="Basic outlined example">
                    @if ($search_type === 'users')
                        <a href="{{ route('groups.search') }}?query={{ request()->get('query') }}" type="button" class="btn btn-outline-primary" >Groups</a>
                        <a href="{{ route('profiles.search') }}?query={{ request()->get('query') }}" type="button" class="btn btn-outline-primary disabled" >Users</a>
                    @elseif($search_type === 'groups')
                        <a href="{{ route('groups.search') }}?query={{ request()->get('query') }}" type="button" class="btn btn-outline-primary disabled" >Groups</a>
                        <a href="{{ route('profiles.search') }}?query={{ request()->get('query') }}" type="button" class="btn btn-outline-primary" >Users</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@if ($search_type === 'users')

<div class="friends-blocks-wrap container">
    <div class="friends-main row">
        @foreach ($results as $user)
        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">
            <a href="{{ route('profiles.show', $user) }}" class="friend-block row">
                <div class="friend-img col-sm-3">
                    <img src="{{ $user->avatar }}" alt="">
                </div>
                <div class="name-and-status col-sm-9">
                    <div class="friend-name text-truncate">{{ $user->name }}</div>
                    <div class="friend-status">Add friend</div>
                </div>
            </a>
        </div>

        @endforeach
    </div>
</div>
@elseif($search_type === 'groups')

<div class="groups-main-wrap container">
    <div class="groups-main row">
        @foreach ($results as $group)
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
                        <div class="group-description">{{$group->description}}</div>
                        <div class="group-subscribe">
                           <button type="submit">Subcribe</button>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        @endforeach

    </div>
</div>

@endif
@endsection


