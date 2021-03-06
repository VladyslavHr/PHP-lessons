@extends('layouts.main')

@section('title', 'Profile-product')



@section('content')

@include('/blocks.profile-header')

@include('blocks.products-menu')

<div class="container mt-5">
    <div class="row" style="padding-top: 90px;">
        <div class="goods-images col-sm-6">
            <div class="main-good-img">
                <img src="https://images.unsplash.com/photo-1523275335684-37898b6baf30?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1099&q=80" alt="">
            </div>
            <div class="small-goods-img">
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
                <div class="small-goods-img_">
                    <img src="https://images.unsplash.com/photo-1523275335684-37898b6baf30?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1099&q=80" alt="">
                </div>
            </div>
        </div>
        <div class="goods-info col-sm-6">
            <div class="goods-info-title">
                <h2>Product model name Product model name Product model name</h2>
            </div>
            <div class="goods-info-describtion">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    Veniam praesentium, cum sed laudantium maiores voluptates alias asperiores quam eaque eligendi, unde perferendis.
                    Exercitationem odio voluptas veritatis expedita eligendi ea natus?
                </p>
            </div>
            <div class="goods-info-price">
                9959485 $
            </div>
            <div class="goods-info-buttons">
                <a href="#" class="goods-info-add-cart">
                    ???????????????? ?? ??????????????
                </a>
                <a href="#" class="goods-info-buy">
                    ????????????
                </a>
            </div>

        </div>
    </div>

</div>
@endsection
