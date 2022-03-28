@extends('layoys.main')

@section('title', 'Search')

@section('content')
{{-- @if ($search_type === 'users') --}}

<div class="container ">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card-main bg-dark">
                {{-- <div class="card-date">Today is {{ $result->day, $result->month }}  </div>
                <div class="card-question">Who have name day today?</div>
                <div class="card-name">{{ $result->name }} </div> --}}
            </div>
        </div>
    </div>
</div>

@endsection


