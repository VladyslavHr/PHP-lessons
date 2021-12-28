@extends('layouts.app')

@section('content')
<div class="container">
    <nav class="bread-crumb" style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/">Back to main</a></li>
          <li class="breadcrumb-item"><a href="{{ route('pharmacies.show', $pharmacy->id) }}">Category</a></li>
          <li class="breadcrumb-item active" aria-current="page">Product</li>
        </ol>
      </nav>

    <div class="pharmacy-block row ">
        <div class="link-list row ">
            <div class="code col-sm-3">PZS KOD: <b>{{ $pharmacy->pzs_kod }}</b></div>
            <div class="address col-sm-3">Address: <b>{{ $pharmacy->address }}</b></div>
            <div class="city col-sm-3">City: <b>{{ $pharmacy->city }}</b></div>
            <div class="category col-sm-3">Category name: <b>{{ $category->name }}</b></div>
        </div>
    </div>
    <code>{{ count($category->products) }}</code>
    <div class="list-group-product row">
        @foreach ($category->products as $product)
            <form action="{{ route('category.estimate') }}" method="POST" class="list-group-item list-group-item-action d-flex align-items-center justify-content-between">
                @csrf
                <input type="hidden" name="product_id" value="{{ $product->id }}">
                <input type="hidden" name="pharmacy_id" value="{{ $pharmacy->id }}">
                <input type="hidden" name="pharmacy_pzs" value="{{ $pharmacy->pzs_kod }}">
                <input type="hidden" name="product_title" value="{{ $product->title }}">
                <input type="hidden" name="product_brand" value="{{ $product->brand }}">
                <div class="product-image">
                    <img src="{{ asset('images/no-image.jpg') }}" alt="">
                </div>
                <div class="product-title col-sm-2">
                    {{ $product->title }}
                </div>
                <div class="select-1 col-sm-2">
                    <label class="label-mark col-sm-10">Počet Face-kategória-120-180 cm (úroveň očí)</label>
                    <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="mark_1">
                        <option value="0">Mark</option>
                        <option value="1" {{  $product->marks($pharmacy->id)->mark_1 == 1 ? 'selected' : '' }}>1</option>
                        <option value="2" {{  $product->marks($pharmacy->id)->mark_1 == 2 ? 'selected' : '' }}>2</option>
                        <option value="3" {{  $product->marks($pharmacy->id)->mark_1 == 3 ? 'selected' : '' }}>3</option>
                        <option value="4" {{  $product->marks($pharmacy->id)->mark_1 == 4 ? 'selected' : '' }}>4</option>
                    </select>
                </div>
                <div class="select-1 col-sm-2">
                    <label class="label-mark col-sm-10">Počet Face kategória-(mimo úroveň očí)</label>
                    <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="mark_2">
                        <option value="0">Mark</option>
                        <option value="1" {{  $product->marks($pharmacy->id)->mark_2 == 1 ? 'selected' : '' }}>1</option>
                        <option value="2" {{  $product->marks($pharmacy->id)->mark_2 == 2 ? 'selected' : '' }}>2</option>
                        <option value="3" {{  $product->marks($pharmacy->id)->mark_2 == 3 ? 'selected' : '' }}>3</option>
                        <option value="4" {{  $product->marks($pharmacy->id)->mark_2 == 4 ? 'selected' : '' }}>4</option>
                    </select>
                </div>
                <div class="select-1 col-sm-2">
                    <label class="label-mark col-sm-10">Počet Face( druhotné vystavenie)</label>
                    <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="mark_3">
                        <option value="0">Mark</option>
                        <option value="1" {{  $product->marks($pharmacy->id)->mark_3 == 1 ? 'selected' : '' }}>1</option>
                        <option value="2" {{  $product->marks($pharmacy->id)->mark_3 == 2 ? 'selected' : '' }}>2</option>
                        <option value="3" {{  $product->marks($pharmacy->id)->mark_3 == 3 ? 'selected' : '' }}>3</option>
                        <option value="4" {{  $product->marks($pharmacy->id)->mark_3 == 4 ? 'selected' : '' }}>4</option>
                    </select>
                </div>
                <div class="select-1 col-sm-2">
                    <label class="label-mark col-sm-10">Druhotné vystavenie (krátkodobé, dlhodobé) </label>
                    <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="mark_4">
                        <option value="0">Mark</option>
                        <option value="1" {{  $product->marks($pharmacy->id)->mark_4 == 1 ? 'selected' : '' }}>1</option>
                        <option value="2" {{  $product->marks($pharmacy->id)->mark_4 == 2 ? 'selected' : '' }}>2</option>
                        <option value="3" {{  $product->marks($pharmacy->id)->mark_4 == 3 ? 'selected' : '' }}>3</option>
                        <option value="4" {{  $product->marks($pharmacy->id)->mark_4 == 4 ? 'selected' : '' }}>4</option>
                    </select>
                </div>
                    <div class="save-button">
                        <button type="submit" class="btn btn-outline-primary">Save</button>
                    </div>

            </form>
        @endforeach
    </div>
</div>
@endsection
