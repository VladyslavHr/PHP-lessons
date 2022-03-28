@extends('layouts.main')

{{-- @section('title', 'name days') --}}

@section('content')

<div class="container ">
    {{-- <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card-main bg-dark">
                <div class="card-date">Today is  </div>
                <div class="card-question">Who have name day today?</div>
                <div class="card-name">Name </div>
            </div>
        </div>
    </div> --}}
    <ul class="list-group">
        @foreach ($names as $name)
            <a href="{{ route('names.show', $name) }}" class="list-group-item">{{ $name->name }}</a>
        @endforeach
    </ul>
</div>


@endsection
