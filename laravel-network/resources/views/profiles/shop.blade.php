@extends('layouts.main')

@section('title', 'Profile-shop')



@section('content')

@include('/blocks.profile-header')

@include('blocks.products-menu')

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
