@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="main-page-title row">
            <h1>PZS kod search</h1>
        </div>
        <div class="input row justify-content-md-center">
            <div class="id-search  col-xxl-8">
                <form class="input-group mb-6" action="{{ route('pharmacies.search') }}">
                    <input type="hidden" name="search" value="search">
                    <input name="query" type="text" value="{{ $query }}" class="form-control" placeholder="PZS code" aria-label="Recipient's username" aria-describedby="button-addon2">
                    <button class="btn btn-outline-primary" type="submit" id="button-addon2">Search</button>
                </form>
                <br>
                {{ $pharmacies->links() }}
                <ul class="result-list pharm-search col-sm-12 row">
                    @foreach ($pharmacies as $pharmacy)
                    <li class="col-sm-6 col-md-12">
                        <a href="{{ route('pharmacies.show', $pharmacy->id, $pharmacy->city, $pharmacy->address) }}" class="link-list row justify-content-between">
                            {{-- <div class="list-img col-sm-3">
                                <img src="{{asset ('images/no-image.jpg')}}" alt="">
                            </div> --}}
                            <div class="code col-md-3">{{ $pharmacy->pzs_kod }}</div>
                            <div class="address col-md-5 text-truncate">{{ $pharmacy->address }}</div>
                            <div class="city col-md-4 text-truncate">{{ $pharmacy->city }}</div>
                        </a>
                    </li>
                    @endforeach
                </ul>
                {{ $pharmacies->links() }}
            </div>
        </div>
    </div>

    @endsection
