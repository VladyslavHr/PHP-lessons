@extends('layouts.main')

@section('title', 'Groups page')

@section('dynamic-menu')
    @include('blocks.groups-menu')
@endsection

@section('content')

@include('blocks.profile-header')

<div class="groups-main-wrap container">
    <div class="groups-main row">
        @foreach ($groups as $group)
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

@endsection
