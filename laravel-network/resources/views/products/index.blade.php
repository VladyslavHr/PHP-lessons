@extends('layouts.main')

@section('title', 'Products-shop')



@section('content')

@include('/blocks.profile-header')

@include('blocks.products-menu')

<div class="container" style="padding-top: 100px; ">
    <h2 class="text-center"> {{$user->name}}'s products </h2>
    {{ $products->links() }}
    <div class="row">
        @foreach ($products as $product)
            <div class="col-sm-3 product-card-wrapper">
                <div class="product-card" title="Product model name Product model name Product model name">
                    <a href="{{ route('products.show', $product) }}" class="text-decoration-none">
                        <img class="product-image" src="{{ $product->image }}" alt="">
                        <h2 class="product-title elipsis">{{ $product->title }}</h2>
                    </a>

                    <div class="product-price">{{ $product->price }}$
                        <a href="{{ route('products.edit', $product) }}" class="float-end me-2 goods-edit-link"><i class="bi bi-pencil-fill"></i></a>
                        <form action="{{ route('products.destroy', $product) }}" method="POST"
                            onsubmit="if(!confirm('Удалять?')) return false">
                            @csrf
                            @method('DELETE')
                            <button class="float-end goods-destroy-button me-2"><i class="bi bi-trash"></i></button>
                        </form>
                        <div class="product-block-cart-link">
                            <a href="{{ route('products.cart', $product) }}"><i class="bi bi-bag"></i></a>
                        </div>
                        {{-- <a href="{{ route('products.destroy', $product) }}" class="float-end me-2"><i class="bi bi-trash"></i></a> --}}
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    {{ $products->links() }}
</div>

@endsection
