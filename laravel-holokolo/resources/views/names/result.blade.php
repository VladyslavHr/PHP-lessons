{{-- list of search results --}}

@extends('layouts.main')

@section('content')

<div class="container ">
    <div class="resul-list-wrapp">
        <ul class="list-group list-result">
            @foreach ($names as $name)
                <a href="{{ route('names.show', $name) }}" class="list-group-item list-result-link">{{ $name->name }}</a>
            @endforeach
        </ul>
    </div>

</div>


@endsection
