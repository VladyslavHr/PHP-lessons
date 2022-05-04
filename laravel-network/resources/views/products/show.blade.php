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

        </div>
        <div class="goods-info col-sm-6">
            <div class="goods-info-title">
                <h2>{{ $product->title }}

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

                </h2>

            </div>

            <div class="goods-info-price">
                {{ $product->price }}$
            </div>
            <div class="goods-info-buttons">
                <form class="d-inline-block" action="{{ route('product.addToCart', $product->id) }}" method="POST">
                    @csrf
                    <button type="submit"  class="goods-info-buy ">
                        Добавить в корзину
                        @if (isset($user->cart_array[$product->id]))
                        <span class="ms-2 badge rounded-pill bg-light text-dark">{{ $user->cart_array[$product->id] }}</span>
                        @endif
                    </button>
                </form>

                <a href="{{route('products.checkout')}}" class="goods-info-add-cart">
                    Купить
                </a>
            </div>

            <div class="goods-info-describtion">
                <p>
                    {!! $product->description !!}
                </p>
            </div>
        </div>
    </div>

</div>
@endsection
