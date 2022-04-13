<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'laravel-network')</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/2.0.0-alpha.2/cropper.css" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset ('css/style.css?v=' . filemtime(public_path('css/style.css')) ) }}">
    {{-- <link rel="stylesheet" href="/fancybox/jquery.fancybox-1.3.4.css" type="text/css" media="screen" /> --}}
    <link href="path/to/lightbox.css" rel="stylesheet" />

    <script src="https://unpkg.com/jquery@3/dist/jquery.min.js" crossorigin="anonymous"></script>
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

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/2.0.0-alpha.2/cropper.min.js" crossorigin="anonymous"></script>

<script src="path/to/lightbox.js"></script>

{{-- <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>

<script type="text/javascript" src="/fancybox/jquery.fancybox-1.3.4.pack.js"></script> --}}


<script src="{{ asset ('js/main.js?v=' . filemtime(public_path('js/main.js')) ) }}"></script>


</body>
</html>
