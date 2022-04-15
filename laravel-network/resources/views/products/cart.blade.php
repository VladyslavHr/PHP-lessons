@extends('layouts.main')

@section('title', 'product-cart')



@section('content')

@include('blocks.profile-header')

@include('blocks.products-menu')

<div class="container mt-5 pt-5">
    <h3 class="mb-3">Товары в корзине ({{ count($products) }})</h3>
    @foreach ($products as $product)


    <div class="row mt-5 mb-5 align-items-center">
        <div class="cart-product-img col-sm-2">
            <img src="{{ $product->image }}" alt="">
        </div>
        <div class="cart-product-title col-sm-3">
            <h6 class="elipsis" title="{{ $product->title }}">
                {{ $product->title }}
            </h6>
        </div>
        <div class="cart-product-description col-sm-4">
            <p>
                {{ $product->description }}
            </p>
        </div>
        <div class="cart-product-status col-sm-1">
            <span>
                {{ $product->status }}
            </span>
        </div>
        <div class="cart-product-quantity col-sm-1">
            <span>
                1
            </span>
        </div>
        <div class="cart-product-price col-sm-1">
            <span>
                {{ $product->price }}
            </span>
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
            <div class="cart-products-total-item-sum">{{ $total }} $</div>
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
                {{ $total + $delivery_price }} $
            </h3>
        </div>
    </div>

    <div class="row mt-5 mb-5">
        <div class="col-sm-6">
            <a class="cart-products-back-shop" href="{{ route('products.index') }}">Продолжить покупки</a>
        </div>
        <div class="col-sm-6 text-end">
            <a class="cart-products-submit-order" href="#">Оформить заказ</a>
        </div>
    </div>

</div>








@endsection
