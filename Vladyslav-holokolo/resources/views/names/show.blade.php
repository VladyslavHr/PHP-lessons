@extends('layouts.main')

{{-- @section('title', 'name days') --}}

@section('content')

<div class="container ">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card-main bg-dark">
                <div class="card-date">{{ $name->day }} {{ $monthName }} </div>
                <div class="card-question">Who have name day today?</div>
                <div class="card-name">{{$name->name}} </div>
            </div>
        </div>
    </div>
    {{-- <ul class="list-group">
        @foreach ($names as $name)
            <li class="list-group-item">{{ $name->name }}</li>
        @endforeach
    </ul> --}}
</div>


@endsection
