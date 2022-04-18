@extends('main.index')

@section('title', 'seed-edit')

@section('styles-header')

<link href="/css/lightbox.min.css" rel="stylesheet" />

@endsection

@section('scripts-body')

<script src="/js/lightbox.min.js"></script>
<script>
    lightbox.option({
      'resizeDuration': 200,
      'wrapAround': true
    })
</script>

@endsection


@section('content')

@include('blocks.seeds-nav')



@endsection
