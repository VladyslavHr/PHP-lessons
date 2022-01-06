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

        <div class="list-img row my-5">
                @foreach ($pharmacy->images as $image)
                <img class="col-sm-3" src="{{ $image->asset() }}" alt="">
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
        <form action="{{ route('pharmacies.pharmacy_location') }}" method="POST">
            @csrf
            <input type="hidden" name="pharmacy_id" value="{{ $pharmacy->id }}">
            <div class="select-location">
                <label for="location">Choose pharmacy location</label>
                <select name="location" class="form-select form-select-sm" aria-label=".form-select-sm example" id="location">
                    <option value="none">None</option>
                    <option value="nákupné centrum"{{ $pharmacy->location($pharmacy->id)->location == 'nákupné centrum' ? 'selected' : '' }}>nákupné centrum</option>
                    <option value="mestká"{{ $pharmacy->location($pharmacy->id)->location == 'mestká' ? 'selected' : '' }}>mestká</option>
                    <option value="dedinská"{{ $pharmacy->location($pharmacy->id)->location == 'dedinská' ? 'selected' : '' }}>dedinská</option>
                    <option value="nemocničná"{{ $pharmacy->location($pharmacy->id)->location == 'nemocničná' ? 'selected' : '' }}>nemocničná</option>
                </select>
            </div>
        </form>
        <div class="save-button col-xxl-1 mt-2">
            <button type="submit" class="btn btn-outline-primary">Save</button>
        </div>
        @foreach ($categories as $category)
        <form class="list-group-item list-group-item-action" action="{{ route('pharmacies.estimate_category') }}" method="POST">
            @csrf
            <input type="hidden" name="category_id" value="{{ $category->id }}">
            <input type="hidden" name="pharmacy_id" value="{{ $pharmacy->id }}">
            <div  class=" d-flex row align-items-center justify-content-between">
                <a href="{{ route('pharmacies.categories.show', [ 'pharmacy' => $pharmacy, 'category' => $category->id] ) }}" class="category-title col-xxl-3">
                    {{ $category->name }}
                </a>


                <div class="input-group mb-3">
                    <input type="number" class="form-control" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="button-addon2">
                    <button class="btn btn-outline-secondary" type="button" id="button-addon2">Button</button>
                  </div>
                <div class="select-1 col-xxl-2">
                    <label for="mark1" class="label-mark">Počet Face-kategóry celkem</label>
                    <select name="mark_1" class="form-select form-select-sm" aria-label=".form-select-sm example" id="mark1">
                        <option value="0">Mark</option>
                        <option value="1"{{  $category->marks($pharmacy->id)->mark_1 == 1 ? 'selected' : '' }}>1</option>
                        <option value="2"{{  $category->marks($pharmacy->id)->mark_1 == 2 ? 'selected' : '' }}>2</option>
                        <option value="3"{{  $category->marks($pharmacy->id)->mark_1 == 3 ? 'selected' : '' }}>3</option>
                        <option value="4"{{  $category->marks($pharmacy->id)->mark_1 == 4 ? 'selected' : '' }}>4</option>
                        <option value="4"{{  $category->marks($pharmacy->id)->mark_1 == 5 ? 'selected' : '' }}>5</option>
                        <option value="4"{{  $category->marks($pharmacy->id)->mark_1 == 6 ? 'selected' : '' }}>6</option>
                        <option value="4"{{  $category->marks($pharmacy->id)->mark_1 == 7 ? 'selected' : '' }}>7</option>
                        <option value="4"{{  $category->marks($pharmacy->id)->mark_1 == 8 ? 'selected' : '' }}>8</option>
                        <option value="4"{{  $category->marks($pharmacy->id)->mark_1 == 9 ? 'selected' : '' }}>9</option>
                        <option value="4"{{  $category->marks($pharmacy->id)->mark_1 == 10 ? 'selected' : '' }}>10</option>
                    </select>
                </div>
                <div class="save-button col-xxl-1 mt-2">
                    <button type="submit" class="btn btn-outline-primary">Save</button>
                </div>

            </div>
        </form>
        @endforeach
    </div>
</div>

@endsection
