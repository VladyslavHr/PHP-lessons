@extends('layouts.main')

@section('title', 'Profile-product')



@section('content')

@include('/blocks.profile-header')

@include('blocks.products-menu')

<div class="container mt-5">
    <div class="row" style="padding-top: 90px;">
        <div class="goods-images col-sm-6">
            <div class="main-good-img">
                <img src="{{ $product->image }}" alt="">
            </div>
            <div class="small-goods-img">
                <div class="small-goods-img_">
                    <a href="https://images.unsplash.com/photo-1523275335684-37898b6baf30?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1099&q=80" data-lightbox="image-1">
                        <img src="https://images.unsplash.com/photo-1523275335684-37898b6baf30?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1099&q=80" alt="">
                    </a>
                </div>
                <div class="small-goods-img_">
                    <img src="https://images.unsplash.com/photo-1523275335684-37898b6baf30?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1099&q=80" alt="">
                </div>
                <div class="small-goods-img_">
                    <img src="https://images.unsplash.com/photo-1523275335684-37898b6baf30?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1099&q=80" alt="">
                </div>
                <div class="small-goods-img_">
                    <img src="https://images.unsplash.com/photo-1523275335684-37898b6baf30?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1099&q=80" alt="">
                </div>
                <div class="small-goods-img_">
                    <img src="https://images.unsplash.com/photo-1523275335684-37898b6baf30?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1099&q=80" alt="">
                </div>
            </div>
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
                    {{ $product->description }}
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
