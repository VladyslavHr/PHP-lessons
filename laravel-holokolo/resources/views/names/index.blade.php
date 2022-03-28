@extends('layouts.main')

@section('title', 'name days')

@section('content')
<div class="container">
    <div class="names-wrapp row">
        @foreach ($results as $result)
        <div class="names-block col-sm-3">

            <div class="names-block-list ">
                @foreach ($monthNum as $str)


                <div class="names-block-month">
                    <h4>{{ $str}}</h4>
                    {{-- <a href="{{ route('names.show') }}">Link</a> --}}
                </div>
                @endforeach
                <div class="names-list-wrapp">
                    <ul class="names-list">
                        <li class="name-link">
                            <a href="#">
                                <span class="name-day">{{ $result->day }}</span>
                                <span class="name-content">{{$result->name}}</span>
                            </a>
                        </li>
                        {{-- <li class="name-link">
                            <a href="#">
                                <span class="name-day">1</span>
                                <span class="name-content">Adrian</span>
                            </a>
                        </li>
                        <li class="name-link">
                            <a href="#">
                                <span class="name-day">1</span>
                                <span class="name-content">Adrian</span>
                            </a>
                        </li>
                        <li class="name-link">
                            <a href="#">
                                <span class="name-day">1</span>
                                <span class="name-content">Adrian</span>
                            </a>
                        </li>
                        <li class="name-link">
                            <a href="#">
                                <span class="name-day">1</span>
                                <span class="name-content">Adrian</span>
                            </a>
                        </li> --}}
                        {{-- @endforeach --}}
                    </ul>
                </div>
            </div>

        </div>
        @endforeach

    </div>
</div>



@endsection
