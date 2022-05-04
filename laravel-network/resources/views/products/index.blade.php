@extends('layouts.main')

@section('title', 'Products-shop')

@section('dynamic-menu')
    @include('blocks.products-menu')
@endsection

@section('content')

@include('/blocks.profile-header')



{{-- <link rel="stylesheet" href="/css/magiczoomplus.css">
<script src="/js/magiczoomplus.js"></script> --}}
<style>
body div#yield_content div div div div a:not(.mz-no-rt-width-css) > .mz-figure:not(.mz-no-rt-width-css) > img {
    width: auto !important;}
    a[id^="mzCr"]{
    opacity: 0;
}
</style>

<div class="container" style="padding-top: 100px; ">
    <h2 class="text-center"> {{$user->name}}'s products </h2>
    <div class="js-no-reload overflow-auto">
        {{ $products->links() }}
    </div>
    <div class="row">
        @foreach ($products as $product)
            <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3 product-card-wrapper">
                <div class="product-card" title="Product model name Product model name Product model name">
                    {{-- <a href="{{ $product->image }}" class="MagicZoom_" data-options="zoomPosition: inner; autostart: false;">
                        <img class="product-image" src="{{ $product->image }}" />
                    </a> --}}
                    <a href="{{ route('product.bySlug', $product->slug) }}" class="text-decoration-none overflow-hidden d-block">
                        <img class="product-image" src="{{ $product->image }}" alt="">
                        <h2 class="product-title elipsis">{{ $product->title }}</h2>
                    </a>

                    <div class="product-price">{{ $product->price }}$

                        @if (auth()->user()->id === $product->user_id)
                        <div class="btn-group float-end">
                            <a href="#" data-bs-toggle="dropdown" aria-expanded="false"><i class="bi bi-list"></i></a>
                            <ul class="dropdown-menu dropdown-menu-end">
                              <li>
                                <a href="{{ route('products.edit', $product) }}" class="btn"><i class="bi bi-pencil-fill"></i></a>
                              </li>
                              <li>
                                <form action="{{ route('products.destroy', $product) }}" method="POST"
                                onsubmit="if(!confirm('Удалять?')) return false">
                                @csrf
                                @method('DELETE')
                                <button class="btn text-danger"><i class="bi bi-trash"></i> Delete </button>
                                </form>
                              </li>
                            </ul>
                        </div>
                        @endif
                    </div> {{--product-price--}}

                        <form class="d-block" action="{{ route('product.addToCart', $product->id) }}" method="POST"
                            onsubmit="this.querySelector('button').setAttribute('disabled', 'disabled')">
                            @csrf
                            {{-- <input type="hidden" name="token" value="15615618"> --}}
                            <button type="submit"  class="goods-info-buy mt-2 col-12">
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

                </div>{{--product-card--}}
            </div>{{--product-card-wrapper--}}

        @endforeach
    </div>
    <div class="js-no-reload overflow-auto">
        {{ $products->links() }}
    </div>
</div>


<script>



</script>


@endsection
