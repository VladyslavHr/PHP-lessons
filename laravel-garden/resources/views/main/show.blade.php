@extends('main.index')

@section('content')
<div class="container">
    <ul>
        <li><a href="{{ route('seeds.index') }}">Seeds</a></li>
        <li><a href="{{ route('seeds.js_test') }}">Java Script Test</a></li>
        <li><a href="#"></a></li>
        <li><a href="#"></a></li>
        <li><a href="#"></a></li>
    </ul>
</div>
@endsection
