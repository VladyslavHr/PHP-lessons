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

            </div>
        </div>

        <div class="list-img row my-5">
                @foreach ($pharmacy->images as $image)
                <img class="col-sm-3" src="{{ $image->asset() }}" alt="">
                @endforeach
        </div>

        <div class="row">
            <div class="col-md-6 mt-auto">
                <form action="{{ route('pharmacies.load_images') }}" class="input-group" enctype='multipart/form-data' method="POST">
                    @csrf
                    <input type="hidden" name="pharmacy_id" value="{{ $pharmacy->id }}">
                    <input name="filenames[]" multiple type="file" class="form-control" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
                    <button class="btn btn-outline-primary" type="submit" id="inputGroupFileAddon04">Download</button>
                </form>
            </div>
            <div class="col-md-6">
                <label for="location">Pharmacy location</label>
                <form action="{{ route('pharmacies.change_location') }}" method="POST" class="d-flex">
                    @csrf
                    <input type="hidden" name="pharmacy_id" value="{{ $pharmacy->id }}">

                    <select class="form-select" name="location">
                        <option value="none">None</option>
                        <option value="nákupné centrum"{{ $pharmacy->location == 'nákupné centrum' ? 'selected' : '' }}>nákupné centrum</option>
                        <option value="mestká"{{ $pharmacy->location == 'mestká' ? 'selected' : '' }}>mestká</option>
                        <option value="dedinská"{{ $pharmacy->location == 'dedinská' ? 'selected' : '' }}>dedinská</option>
                        <option value="nemocničná"{{ $pharmacy->location == 'nemocničná' ? 'selected' : '' }}>nemocničná</option>
                    </select>
                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>


    </div>
    <div class="list-group">
        @foreach ($categories as $category)
        <form class="list-group-item list-group-item-action" action="{{ route('pharmacies.estimate_category') }}" method="POST">
            @csrf
            <input type="hidden" name="category_id" value="{{ $category->id }}">
            <input type="hidden" name="pharmacy_id" value="{{ $pharmacy->id }}">
            <div  class=" d-flex row align-items-center justify-content-between">
                <a href="{{ route('pharmacies.categories.show', [ 'pharmacy' => $pharmacy, 'category' => $category->id] ) }}" class="category-title col-md-4">
                    {{ $category->name }}
                </a>
                <div class="select-1 col-md-6">
                    <div class="d-flex">
                        <label for="mark1" class="label-mark">Počet Face-kategóry celkem</label>
                        <input type="number" name="mark_1" value="{{ $category->marks($pharmacy->id)->mark_1 }}" class="form-control category-mark-input">
                    </div>
                </div>
                <div class="save-button col-md-2 mt-2 ms-auto ">
                    <button type="submit" class="btn btn-outline-primary float-end">Save</button>
                </div>

            </div>
        </form>
        @endforeach
    </div>
</div>

@endsection
