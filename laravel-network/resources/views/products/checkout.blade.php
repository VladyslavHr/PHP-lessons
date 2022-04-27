@extends('layouts.main')

@section('title', 'product-cart')



@section('content')

@include('blocks.profile-header')

@include('blocks.products-menu')

<div class="container mt-5 pt-5">
    <div class="checkout-left col-sm-8">
        <div class="checkout-email mb-5">
            <div class="checkout-email-head">
                <span>
                    <i class="bi bi-check2-circle"></i>
                </span>
                <h3>Email</h3>
                <a href="#">Изменить</a>
            </div>
            <div class="checkout-email-body">
                <div class="checkout-email-body-div">
                    Вы делаете заказ как <b>{{ $user->email }}</b>
                </div>
            </div>
        </div>
        <div class="checkout-delivery mb-5">
            <div class="checkout-delivery-head">
                <span>
                    <i class="bi bi-check2-circle"></i>
                </span>
                <h3>Доставка</h3>
                <a href="#">Изменить</a>
            </div>
            <div class="checkout-delivery-body">
                <div class="checkout-delivery-name">
                    <b>Получатель:</b>
                    {{$user->name}}
                </div>
                <div class="checkout-delivery-adress">
                    Pod Harfou 966/35 - 19000 - Praha (Hlavní město Praha)
                </div>
                <div class="checkout-delivery-phone">
                    +420737547404
                </div>
                <div class="checkout-delivery-method mt-2">
                    <b>Способ доставки:</b>
                    <span>Стандарт - 4-6 рабочих дней</span>
                </div>
            </div>
        </div>
        <div class="checkout-payment mb-5">
            <div class="checkout-payment-title">
                <h3 class="mb-2">Оплата</h3>
                <p>Выькрите метод оплаты</p>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                <label class="form-check-label" for="flexRadioDefault1">
                  Опатить наличными
                </label>
                <i class="bi bi-cash-coin"></i>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                <label class="form-check-label" for="flexRadioDefault2">
                  Оплатить картой
                </label>
                <i class="bi bi-credit-card-2-back"></i>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                <label class="form-check-label" for="flexRadioDefault2">
                  Оплатить PayPal
                </label>
                <i class="bi bi-paypal"></i>
            </div>

        </div>
    </div>

    <div class="checkout-right col-sm-4">

    </div>

</div>









@endsection
