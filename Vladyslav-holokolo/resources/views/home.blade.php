@extends('layouts.main')

@section('content')
<div class="container ">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card-main bg-dark">
                <div class="card-date">Today is {{ $today_day }}, {{ $date }} </div>
                <div class="card-question">Who have name day today?</div>
                <div class="card-name">{{ $today_names }} </div>
            </div>
        </div>
    </div>
</div>
@endsection
