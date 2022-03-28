{{-- page of current name --}}

@extends('layouts.main')

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
</div>


@endsection
