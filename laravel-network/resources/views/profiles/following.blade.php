@extends('layouts.main')

@section('title', 'following')



@section('content')
@include('/blocks.profile-header')

@include('/blocks.friends-menu')

<div class="friends-blocks-wrap container">
    <div class="friends-main row">
        @foreach ($users as $user)
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
@endsection
