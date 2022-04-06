@extends('layouts.main')

@section('title', 'Products-shop')



@section('content')

@include('/blocks.profile-header')

@include('blocks.products-menu')

<div class="container mt-5 mb-5 pt-5">

    <form class="section-shadow p-3">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <div class="create-block-img text-center">
                    <img src="/images/images.png" alt="">
                </div>
            </div>
            <div class="col-sm-6">
                <input type="file" class="form-control" id="inputGroupFile02">
                <label class="input-group-text" for="inputGroupFile02">Download</label>
            </div>
            <div class="col-sm-6">
                <label for="" class="form-label">Title</label>
                <input type="text" class="form-control" id="" placeholder="Title">
            </div>
            <div class="col-sm-6">
                <label for="" class="form-label">Price</label>
                <input type="text" class="form-control" id="" placeholder="Price">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>
        </div>
    </form>
</div>
@endsection
