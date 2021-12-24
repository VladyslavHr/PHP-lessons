@extends('layouts.app')


@section('content')
<div class="container">
    <nav class="bread-crumb" style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/excel">Back to main</a></li>
          <li class="breadcrumb-item active" aria-current="page">Category</li>
        </ol>
      </nav>
    <div class="pharmacy-block ">
        <div class="link-list row ">
            <div class="list-img col-sm-3">
                <img src="{{asset ('images/no-image.jpg')}}" alt="">
            </div>
            <div class="code col-sm-3">PZS KOD</div>
            <div class="address col-sm-3">Address</div>
            <div class="city col-sm-3">City</div>
        </div>
        <div class="input-group">
            <input type="file" class="form-control" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
            <button class="btn btn-outline-primary" type="submit" id="inputGroupFileAddon04">Download</button>
          </div>
    </div>
    <div class="list-group">
        @foreach ($categories as $category)
        <a href="/product" class="list-group-item list-group-item-action d-flex align-items-center justify-content-between">
            <div class="category-title col-sm-3">
                {{ $category->name }}
            </div>
            {{-- <div class="select-1 col-sm-2">
                <label for="mark" class="label-mark">Počet Face-kategória-120-180 cm (úroveň očí)</label>
                <select class="form-select form-select-sm" aria-label=".form-select-sm example" id="mark">
                    <option selected>Mark</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                </select>
            </div>
            <div class="select-1 col-sm-2">
                <label for="mark" class="label-mark">Počet Face kategória-(mimo úroveň očí)</label>
                <select class="form-select form-select-sm" aria-label=".form-select-sm example" id="mark">
                    <option selected>Mark</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                </select>
            </div>
            <div class="select-1 col-sm-2">
                <label for="mark" class="label-mark">Počet Face( druhotné vystavenie)</label>
                <select class="form-select form-select-sm" aria-label=".form-select-sm example" id="mark">
                    <option selected>Mark</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                </select>
            </div>
            <div class="select-1 col-sm-2">
                <label for="mark" class="label-mark">Druhotné vystavenie (krátkodobé, dlhodobé)</label>
                <select class="form-select form-select-sm" aria-label=".form-select-sm example" id="mark">
                    <option selected>Mark</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                </select>
            </div>
            <div class="save-button">
                <button type="submit" class="btn btn-outline-primary">Save</button>
            </div> --}}

        </a>
        @endforeach
    </div>
</div>

@endsection
