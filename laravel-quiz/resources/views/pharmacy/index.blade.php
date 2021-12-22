@extends('layouts.app')

@section('content')

    <div class="welcome-user">
        <h3>Welcome user</h3>
    </div>
    <div class="container">
        <div class="title row">
            <h1>Enter an ID</h1>
        </div>
        <div class="input row justify-content-md-center">
            <form class="id-search  col-sm-8">
                <div class="input-group mb-6">
                    <input type="text" class="form-control" placeholder="PZS code" aria-label="Recipient's username" aria-describedby="button-addon2">
                    <button class="btn btn-outline-primary" type="submit" id="button-addon2">Button</button>
                  </div>
                <ul class="result-list col-sm-12">
                    <li>
                        <a href="#" class="link-list row">
                            <div class="list-img col-sm-3">
                                <img src="{{asset ('images/no-image.jpg')}}" alt="">
                            </div>
                            <div class="code col-sm-3">PZS code</div>
                            <div class="address col-sm-3">Address</div>
                            <div class="city col-sm-3">City</div>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="link-list row">
                            <div class="list-img col-sm-3">
                                <img src="{{asset ('images/no-image.jpg')}}" alt="">
                            </div>
                            <div class="code col-sm-3">PZS code</div>
                            <div class="address col-sm-3">Address</div>
                            <div class="city col-sm-3">City</div>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="link-list row">
                            <div class="list-img col-sm-3">
                                <img src="{{asset ('images/no-image.jpg')}}" alt="">
                            </div>
                            <div class="code col-sm-3">PZS code</div>
                            <div class="address col-sm-3">Address</div>
                            <div class="city col-sm-3">City</div>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="link-list row">
                            <div class="list-img col-sm-3">
                                <img src="{{asset ('images/no-image.jpg')}}" alt="">
                            </div>
                            <div class="code col-sm-3">PZS code</div>
                            <div class="address col-sm-3">Address</div>
                            <div class="city col-sm-3">City</div>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="link-list row">
                            <div class="list-img col-sm-3">
                                <img src="{{asset ('images/no-image.jpg')}}" alt="">
                            </div>
                            <div class="code col-sm-3">PZS code</div>
                            <div class="address col-sm-3">Address</div>
                            <div class="city col-sm-3">City</div>
                        </a>
                    </li>
                </ul>
            </form>
        </div>
    </div>

    <div class="links">
        <ul>
            <li><a href="#">Category</a></li>
            <li><a href="#">Product</a></li>
        </ul>
    </div>

    @endsection
