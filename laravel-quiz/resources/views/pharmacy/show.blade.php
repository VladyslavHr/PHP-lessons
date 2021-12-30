@extends('layouts.app')


@section('content')
<div class="container">
    <nav class="bread-crumb" style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/">Back to main</a></li>
          <li class="breadcrumb-item active" aria-current="page">Category</li>
        </ol>
      </nav>
    <div class="pharmacy-block ">
        <div class="link-list row ">
            <div class="code col-sm-3">PZS KOD: <b>{{ $pharmacy->pzs_kod }}</b> </div>
            <div class="address col-sm-3">Address: <b>{{ $pharmacy->address }}</b>  </div>
            <div class="city col-sm-3">City: <b>{{ $pharmacy->city }}</b>  </div>
            <div class="col-12">
                @include('blocks.errors')
                @include('blocks.status')
            </div>
        </div>

        <div class="list-img d-flex col-sm-2 my-5">
            @foreach ($pharmacy->images as $image)
                <img class="col-sm-3" src="{{asset ('pharmacy_images/' . $image->url)}}" alt="">
            @endforeach
        </div>

        <form action="{{ route('pharmacies.load_images') }}" class="input-group my-5" enctype='multipart/form-data' method="POST">
            @csrf
            <input type="hidden" name="pharmacy_id" value="{{ $pharmacy->id }}">
            <input name="filenames[]" multiple type="file" class="form-control" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
            <button class="btn btn-outline-primary" type="submit" id="inputGroupFileAddon04">Download</button>
        </form>
    </div>
    <div class="list-group">
        @foreach ($categories as $category)
        <form action="{{ route('pharmacies.estimate_category') }}" method="POST">
            @csrf
            <input type="hidden" name="category_id" value="{{ $category->id }}">
            <input type="hidden" name="pharmacy_id" value="{{ $pharmacy->id }}">
            <div  class="list-group-item list-group-item-action d-flex align-items-center justify-content-between">
                <a href="{{ route('pharmacies.categories.show', [ 'pharmacy' => $pharmacy, 'category' => $category->id] ) }}" class="category-title col-sm-3">
                    {{ $category->name }}
                </a>

                <div class="select-1 col-sm-2">
                    <label for="mark1" class="label-mark">Počet Face-kategória-120-180 cm (úroveň očí)</label>
                    <select name="mark_1" class="form-select form-select-sm" aria-label=".form-select-sm example" id="mark1">
                        <option value="0">Mark</option>
                        <option value="1"{{  $category->marks($pharmacy->id)->mark_1 == 1 ? 'selected' : '' }}>1</option>
                        <option value="2"{{  $category->marks($pharmacy->id)->mark_1 == 2 ? 'selected' : '' }}>2</option>
                        <option value="3"{{  $category->marks($pharmacy->id)->mark_1 == 3 ? 'selected' : '' }}>3</option>
                        <option value="4"{{  $category->marks($pharmacy->id)->mark_1 == 4 ? 'selected' : '' }}>4</option>
                    </select>
                </div>
                <div class="select-1 col-sm-2">
                    <label for="mark2" class="label-mark">Počet Face kategória-(mimo úroveň očí)</label>
                    <select name="mark_2" class="form-select form-select-sm" aria-label=".form-select-sm example" id="mark2">
                        <option value="0">Mark</option>
                        <option value="1"{{  $category->marks($pharmacy->id)->mark_2 == 1 ? 'selected' : '' }}>1</option>
                        <option value="2"{{  $category->marks($pharmacy->id)->mark_2 == 2 ? 'selected' : '' }}>2</option>
                        <option value="3"{{  $category->marks($pharmacy->id)->mark_2 == 3 ? 'selected' : '' }}>3</option>
                        <option value="4"{{  $category->marks($pharmacy->id)->mark_2 == 4 ? 'selected' : '' }}>4</option>
                    </select>
                </div>
                <div class="select-1 col-sm-2">
                    <label for="mark3" class="label-mark">Počet Face( druhotné vystavenie)</label>
                    <select name="mark_3" class="form-select form-select-sm" aria-label=".form-select-sm example" id="mark3">
                        <option value="0">Mark</option>
                        <option value="1"{{  $category->marks($pharmacy->id)->mark_3 == 1 ? 'selected' : '' }}>1</option>
                        <option value="2"{{  $category->marks($pharmacy->id)->mark_3 == 2 ? 'selected' : '' }}>2</option>
                        <option value="3"{{  $category->marks($pharmacy->id)->mark_3 == 3 ? 'selected' : '' }}>3</option>
                        <option value="4"{{  $category->marks($pharmacy->id)->mark_3 == 4 ? 'selected' : '' }}>4</option>
                    </select>
                </div>
                <div class="select-1 col-sm-2">
                    <label for="mark4" class="label-mark">Druhotné vystavenie (krátkodobé, dlhodobé)</label>
                    <select name="mark_4" class="form-select form-select-sm" aria-label=".form-select-sm example" id="mark4">
                        <option value="0">Mark</option>
                        <option value="1"{{  $category->marks($pharmacy->id)->mark_4 == 1 ? 'selected' : '' }}>1</option>
                        <option value="2"{{  $category->marks($pharmacy->id)->mark_4 == 2 ? 'selected' : '' }}>2</option>
                        <option value="3"{{  $category->marks($pharmacy->id)->mark_4 == 3 ? 'selected' : '' }}>3</option>
                        <option value="4"{{  $category->marks($pharmacy->id)->mark_4 == 4 ? 'selected' : '' }}>4</option>
                    </select>
                </div>
                <div class="save-button">
                    <button type="submit" class="btn btn-outline-primary">Save</button>
                </div>

            </div>
        </form>
        @endforeach
    </div>
</div>

@endsection
