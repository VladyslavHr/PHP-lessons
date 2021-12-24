@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="title row">
            <h1>PZS kod search</h1>
        </div>
        <div class="input row justify-content-md-center">
            <form class="id-search  col-sm-8">
                <div class="input-group mb-6">
                    <input type="text" class="form-control" placeholder="PZS code" aria-label="Recipient's username" aria-describedby="button-addon2">
                    <button class="btn btn-outline-primary" type="submit" id="button-addon2">Button</button>
                  </div>
                <ul class="result-list col-sm-12">
                    @foreach ($pharmes as $pharm)
                    <li>
                        <a href="/category" class="link-list row justify-content-between">
                            {{-- <div class="list-img col-sm-3">
                                <img src="{{asset ('images/no-image.jpg')}}" alt="">
                            </div> --}}
                            <div class="code col-sm-3">{{ $pharm->pzs_kod }}</div>
                            <div class="address col-sm-5">{{ $pharm->address }}</div>
                            <div class="city col-sm-4">{{ $pharm->city }}</div>
                        </a>
                    </li>
                    @endforeach
                </ul>
            </form>
        </div>
    </div>

    @endsection
