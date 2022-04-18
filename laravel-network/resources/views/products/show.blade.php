@extends('layouts.main')

@section('title', 'Profile-product')


@section('styles-header')

<link href="/css/lightbox.min.css" rel="stylesheet" type="text/css" />

@endsection

@section('scripts-body')

<script type="text/javajscript" src="/js/lightbox.min.js"></script>





@endsection



@section('content')

@include('/blocks.profile-header')

@include('blocks.products-menu')



<div class="container mt-5">
    <div class="row" style="padding-top: 90px;">

        <div class="goods-images col-sm-6">
            @include('blocks.fancybox')
            {{-- <div class="main-good-img">
                <a href="{{ $product->image }}" data-lightbox="image" data-title="Product image">
                    <img  src="{{ $product->image }}" alt="">
                </a>

            </div> --}}

            {{-- {{-- <div class="small-goods-img"> --}}

                {{-- @foreach ($product->images as $image)
                <div class="small-goods-img_">
                    <a href="{{ $image->url }}" data-lightbox="image" data-title="Product image">
                        <img src="{{ $image->url }}" alt="">
                    </a>

                </div>
                @endforeach --}}
                {{-- https://images.unsplash.com/photo-1523275335684-37898b6baf30?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1099&q=80 --}}
            {{-- </div> --}}
        </div>
        <div class="goods-info col-sm-6">
            <div class="goods-info-title">
                <h2>{{ $product->title }}
                    <a href="{{ route('products.edit', $product) }}" class="float-end goods-edit-link"><i class="bi bi-pencil-fill"></i></a>
                    <form action="{{ route('products.destroy', $product) }}" method="POST"
                        onsubmit="if(!confirm('Удалять?')) return false">
                        @csrf
                        @method('DELETE')
                        <button class="float-end goods-destroy-button"><i class="bi bi-trash"></i></button>
                    </form>
                </h2>

            </div>
            <div class="goods-info-describtion">
                <p>
                    {!! $product->description !!}
                </p>
            </div>
            <div class="goods-info-price">
                {{ $product->price }}$
            </div>
            <div class="goods-info-buttons">
                <a href="{{ route('products.cart', $product) }}" class="goods-info-add-cart">
                    Добавить в корзину
                </a>
                <a href="#" class="goods-info-buy">
                    Купить
                </a>
            </div>

        </div>
    </div>

</div>
@endsection
