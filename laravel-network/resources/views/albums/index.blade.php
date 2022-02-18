@extends('layouts.main')

@section('title', 'Album page')

@section('content')

@include('/blocks.profile-header')


<div class="container mt-5">

    <div class="row">
        <div class="col-sm-3"></div>

        <div class="navbar navbar-expand-lg navbar-light album-nav-bar col-sm-9">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Home</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
                </li>
                <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Dropdown
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="#">Action</a></li>
                    <li><a class="dropdown-item" href="#">Another action</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                </ul>
                </li>
                <li class="nav-item">
                <a class="nav-link disabled">Disabled</a>
                </li>
            </ul>
            <form class="d-flex">
                <input class="album-search-input form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="album-search-btn btn btn-outline-success" type="submit">Поиск</button>
            </form>
            </div>
        </div>
        </div>
    </div>




    <div class="albums-blocks-wrapp row">
        <div class="album-block col-sm-4">
            <a href="#" class="album-wrapper row">
                <div class="album-image col-sm-12">
                    <img src="/images/images.png" alt="">
                </div>
                <div class="album-title col-sm-12">
                    <span>Создать альбом</span>
                </div>
            </a>
        </div>
        <div class="album-block col-sm-4">
            <a href="#" class="album-wrapper row">
                <div class="album-image col-sm-12">
                    <img src="/images/images.png" alt="">
                </div>
                <div class="album-title col-sm-12">
                    <span>Название альбома</span>
                </div>
            </a>
        </div>
        <div class="album-block col-sm-4">
            <a href="#" class="album-wrapper row">
                <div class="album-image col-sm-12">
                    <img src="/images/images.png" alt="">
                </div>
                <div class="album-title col-sm-12">
                    <span>Название альбома</span>
                </div>
            </a>
        </div>
        <div class="album-block col-sm-4">
            <a href="#" class="album-wrapper row">
                <div class="album-image col-sm-12">
                    <img src="/images/images.png" alt="">
                </div>
                <div class="album-title col-sm-12">
                    <span>Название альбома</span>
                </div>
            </a>
        </div>
        <div class="album-block col-sm-4">
            <a href="#" class="album-wrapper row">
                <div class="album-image col-sm-12">
                    <img src="/images/images.png" alt="">
                </div>
                <div class="album-title col-sm-12">
                    <span>Название альбома</span>
                </div>
            </a>
        </div>
        <div class="album-block col-sm-4">
            <a href="#" class="album-wrapper row">
                <div class="album-image col-sm-12">
                    <img src="/images/images.png" alt="">
                </div>
                <div class="album-title col-sm-12">
                    <span>Название альбома</span>
                </div>
            </a>
        </div>
        <div class="album-block col-sm-4">
            <a href="#" class="album-wrapper row">
                <div class="album-image col-sm-12">
                    <img src="/images/images.png" alt="">
                </div>
                <div class="album-title col-sm-12">
                    <span>Название альбома</span>
                </div>
            </a>
        </div>
        <div class="album-block col-sm-4">
            <a href="#" class="album-wrapper row">
                <div class="album-image col-sm-12">
                    <img src="/images/images.png" alt="">
                </div>
                <div class="album-title col-sm-12">
                    <span>Название альбома</span>
                </div>
            </a>
        </div>
        <div class="album-block col-sm-4">
            <a href="#" class="album-wrapper row">
                <div class="album-image col-sm-12">
                    <img src="/images/images.png" alt="">
                </div>
                <div class="album-title col-sm-12">
                    <span>Название альбома</span>
                </div>
            </a>
        </div>
        <div class="album-block col-sm-4">
            <a href="#" class="album-wrapper row">
                <div class="album-image col-sm-12">
                    <img src="/images/images.png" alt="">
                </div>
                <div class="album-title col-sm-12">
                    <span>Название альбома</span>
                </div>
            </a>
        </div>
        <div class="album-block col-sm-4">
            <a href="#" class="album-wrapper row">
                <div class="album-image col-sm-12">
                    <img src="/images/images.png" alt="">
                </div>
                <div class="album-title col-sm-12">
                    <span>Название альбома</span>
                </div>
            </a>
        </div>

    </div>




</div>

@endsection
