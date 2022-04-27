@extends('layouts.main')

@section('title', 'Products-shop')



@section('content')

@include('/blocks.profile-header')

@include('blocks.products-menu')

<link rel="stylesheet" href="/css/magiczoomplus.css">
<script src="/js/magiczoomplus.js"></script>
<style>
body div#yield_content div div div div a:not(.mz-no-rt-width-css) > .mz-figure:not(.mz-no-rt-width-css) > img {
    width: auto !important;}
    a[id^="mzCr"]{
    opacity: 0;
}
</style>

<div class="container" style="padding-top: 100px; ">
    <h2 class="text-center"> {{$user->name}}'s products </h2>
    <div class="js-no-reload">
        {{ $products->links() }}
    </div>
    <div class="row">
        @foreach ($products as $product)
            <div class="col-sm-3 product-card-wrapper">
                <div class="product-card" title="Product model name Product model name Product model name">
                    <a href="{{ $product->image }}" class="MagicZoom_" data-options="zoomPosition: inner; autostart: false;">
                        <img class="product-image" src="{{ $product->image }}" />
                    </a>
                    <a href="{{ route('product.bySlug', $product->slug) }}" class="text-decoration-none overflow-hidden d-block">
                        {{-- <img class="product-image" src="{{ $product->image }}" alt=""> --}}
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

                        <form class="d-inline-block" action="{{ route('product.addToCart', $product->id) }}" method="POST">
                            @csrf
                            <button type="submit"  class="goods-info-buy mt-2">
                                Добавить в корзину
                                @if (isset($user->cart_array[$product->id]))
                                <span class="ms-2 badge rounded-pill bg-light text-dark">{{ $user->cart_array[$product->id] }}</span>
                                @endif
                            </button>
                        </form>
                            {{-- <a href="{{ route('products.cart', $product) }}">
                                <i class="bi bi-bag"></i>
                            </a> --}}

                        {{-- <a href="{{ route('products.destroy', $product) }}" class="float-end me-2"><i class="bi bi-trash"></i></a> --}}
                    </div>
                </div>
            </div>

        @endforeach
    </div>
    <div class="js-no-reload">
        {{ $products->links() }}
    </div>
</div>


<script>

setTimeout(function () {
    document.querySelectorAll('.MagicZoom_').forEach(function(link)
 {
        MagicZoom.start(link)

    })
},100)

</script>


@endsection
