<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'laravel-network')</title>
    <link rel="stylesheet" href="/css/cropper.min.css" >
    <link href="/css/bootstrap.min.css" rel="stylesheet" >
    <link rel="stylesheet" href="/css/bootstrap-icons.css">
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css"> --}}
    @yield('styles-header')


    <link rel="stylesheet" href="{{ asset ('css/style.css?v=' . filemtime(public_path('css/style.css')) ) }}">



    {{-- <link rel="stylesheet" href="/fancybox/jquery.fancybox-1.3.4.css" type="text/css" media="screen" /> --}}
    {{-- <link href="path/to/lightbox.css" rel="stylesheet" /> --}}

    <script src="/js/jquery.min.js"></script>
    <script>
        var auth_user = {!! json_encode(auth()->user()) !!};
    </script>
</head>
<body class="ajax_loader">

@include('blocks.top-menu')




@yield('content')

@include('modals.upload-image')

<div class="axaj-loader-wrap" id="ajax_loader">
    <div class="lds-ring">
        <div></div>
        <div></div>
        <div></div>
        <div></div>
    </div>
</div>

<footer class="mt-5">
    @include('blocks.footer-block')
</footer>

<div class="errors-list section-shadow" id="errors_list">
    @include('blocks.errors')
    @include('blocks.status')
    @include('blocks.notification')
</div>


@yield('scripts-body')
<script src="/js/bootstrap.bundle.min.js"></script>

<script src="/js/cropper.min.js"></script>




{{-- <script src="path/to/lightbox.js"></script> --}}

{{-- <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>

<script type="text/javascript" src="/fancybox/jquery.fancybox-1.3.4.pack.js"></script> --}}


<script src="{{ asset ('js/main.js?v=' . filemtime(public_path('js/main.js')) ) }}"></script>


</body>
</html>
