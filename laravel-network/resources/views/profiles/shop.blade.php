@extends('layouts.main')

@section('title', 'Profile-shop')



@section('content')

@include('/blocks.profile-header')

<div class="container mt-5">
    <div class="row">
        <div class="col-sm-3"></div>
        <div class="menu-wrap-groups-ind col-xl-9">
            <nav class="group-ind-menu-navbar navbar navbar-expand-lg navbar-light section-shadow">
                <div class="container-fluid">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                    <ul class="list-groups-ind navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ route('profiles.shop') }}">Все</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="#">Мои товары</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Мои покупки</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Добавить товар</a>
                        </li>
                        <li class="nav-item">
                             <a class="nav-link" href="#">Может быть интересным</a>
                        </li>
                    </ul>
                    <form class="d-flex">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="groups-update-btn btn btn-outline-success" type="submit">Искать</button>
                    </form>
                    </div>
                </div>
            </nav>
        </div>
    </div>
</div>

<div class="container" style="padding-top: 100px; ">
    <h2 class="text-center"> {{$user->name}}'s products </h2>
    <div class="row">
        @foreach ($products as $product)
            <div class="col-sm-3 product-card-wrapper">
                <a href="{{ route('profiles.product') }}" class="product-card" title="Product model name Product model name Product model name">
                    <img class="product-image" src="https://images.unsplash.com/photo-1523275335684-37898b6baf30?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1099&q=80" alt="">
                    <h2 class="product-title elipsis">Product model name Product model name Product model name</h2>
                    <div class="product-price">99954$</div>
                </a>
            </div>
        @endforeach
    </div>
</div>

@endsection
