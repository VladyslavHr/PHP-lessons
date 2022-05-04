@extends('layouts.main')

@section('title', 'product-cart')

@section('dynamic-menu')
    @include('blocks.products-menu')
@endsection


@section('content')

@include('blocks.profile-header')


<div class="container pt-2 section-shadow page-margin-top">
    <h2 class="text-center">Корзина</h2>
    <h3 class="mb-3">Товары в корзине ({{ count($user->cart_products) }})</h3>
    @foreach ($user->cart_products as $product)


    <div class="row mt-5 mb-5 align-items-center cart-product">
        <div class="cart-product-img col-sm-2">
            <img src="{{ $product->image }}" alt="">
        </div>
        <div class="cart-product-title col-sm-5">
            <h6 class="elipsis" title="{{ $product->title }}">
                {{ $product->title }}
            </h6>
        </div>
        <div class="cart-product-status col-sm-2">
            @if ($product->status === 'in_stock')
            <span class="badge rounded-pill bg-success">
                <i class="bi bi-check-circle"></i>
                В наличии
            </span>
            @else
            <span class="badge rounded-pill bg-danger">
                <i class="bi bi-x-circle"></i>
                Товар отсутсвует
            </span>

            @endif
        </div>
        <div class="cart-product-quantity col-sm-1">
            <form class="cart-product-quantity-plusminus" action="{{route('products.cartItemMinus', $product->id)}}" method="POST">
                @csrf
                <button class="btn" type="submit">
                    <i class="bi bi-dash-circle"></i>
                </button>
            </form>
            <span>
                {{ $user->cart_array[$product->id]}}
            </span>
            <form class="cart-product-quantity-plusminus" action="{{route('products.cartItemPlus', $product->id)}}" method="POST">
                @csrf
                <button class="btn" type="submit">
                    <i class="bi bi-plus-circle"></i>
                </button>
            </form>
        </div>
        <div class="cart-product-price col-sm-1">
            <span class="d-block">
                {{ $product->price }} $
            </span>
            <span class="d-block">
                {{ $user->cart_array[$product->id] * $product->price }} $
            </span>
        </div>
        <div class="cart-product-delete col-sm-1">
            <form action="{{ route('products.cartItemDelete', $product->id) }}" method="POST">
                @csrf
                <button type="submit" class="btn">
                    <i class="bi bi-x-square text-danger"></i>
                </button>
            </form>
        </div>
    </div>


    @endforeach
    <div class="row mt-5 cart-products-summary">
        <div class="col-sm-6">
            <div class="cart-products-total-item">Всего за товары</div>
            <div class="cart-products-delivery">Стоимость доставки</div>
            <div class="cart-products-pay-method">Способ оплаты</div>
        </div>
        <div class="col-sm-6 cart-products-res-sum">
            {{-- @for ($i = 0; count($product->price; ++$i))
            {
                {{ $res = sum($product->price[$i]) }}

            }

            @endfor --}}
            {{-- <div class="cart-products-total-item-sum">{{ sum($user->cart_array[$product->id] * $product->price) }} $</div> --}}
            <div class="cart-products-delivery-sum">{{ $delivery_price }} $</div>
            <div class="cart-products-pay-method-result">
                <select class="cart-products-select" name="pay_method" id="">
                    <option value="cash">Наличные</option>
                    <option value="card">Карта</option>
                    <option value="pay_pal">Pay Pal</option>
                </select>
            </div>
        </div>
    </div>

    <div class="row cart-products-order-total mt-5">
        <div class="col-sm-6">
            <h3>Сумма всего заказа</h3>
        </div>
        <div class="col-sm-6 text-end">
            <h3>
                {{-- {{ $total + $delivery_price }} $ --}}
            </h3>
        </div>
    </div>

    <div class="row pt-5 pb-5">
        <div class="col-sm-6 ">
            <a class="btn cart-products-back-shop" href="{{ route('products.index') }}">Продолжить покупки</a>
            <form class="d-inline-block" action="{{ route('products.cartDestroy') }}" method="POST">
                @csrf
                <button type="submit" class="btn cart-products-back-shop">Очистить корзину</button>
            </form>
            {{-- <a class="cart-products-back-shop" href="{{ route('products.cartDestroy') }}"></a> --}}
        </div>
        <div class="col-sm-6 text-end">
            <a class="btn cart-products-submit-order d-inline-block" href="{{ route('products.checkout') }}">Оформить заказ</a>
        </div>
    </div>

</div>








@endsection
