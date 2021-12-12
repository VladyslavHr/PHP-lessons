<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'network-profile')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset ('css/profile.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
</head>
<body>

<div class="head-menu">
    <div class="links">
        <ul class= "links-list">
            <li><a href="/profile/vlad">profile</a></li>
            <li><a href="/groups">groups</a></li>
            <li><a href="/friends">friendds</a></li>
        </ul>
    </div>
    <div class="site-logo">
        <img src="{{ asset ('images/logo.jpg') }}" alt="">
    </div>
    <div class="search-block">
        <input type="text" placeholder="Поиск">
        <button type="submit" class="button-search"><i class="bi bi-search"></i></button>
    </div>
    <div class="head-user-avatar">
        <img src="{{ asset ('images/cat.jpg') }}" alt="">
    </div>
</div>

@yield('content')


</body>
</html>
