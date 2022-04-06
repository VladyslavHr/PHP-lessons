@extends('layouts.main')

@section('title', 'Products-shop')



@section('content')

@include('/blocks.profile-header')

@include('blocks.products-menu')

<div class="container" style="padding-top: 100px; ">
    <h2 class="text-center"> {{$user->name}}'s products </h2>
    <div class="row">
        @foreach ($products as $product)
            <div class="col-sm-3 product-card-wrapper">
                <a href="{{ route('products.show', $product) }}" class="product-card" title="Product model name Product model name Product model name">
                    <img class="product-image" src="{{ $product->image }}" alt="">
                    <h2 class="product-title elipsis">{{ $product->title }}</h2>
                    <div class="product-price">{{ $product->price }}$</div>
                </a>
            </div>
        @endforeach
    </div>
</div>

@endsection
