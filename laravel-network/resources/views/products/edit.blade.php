@extends('layouts.main')

@section('title', 'Products-shop')



@section('content')

@include('/blocks.profile-header')

@include('blocks.products-menu')

<div class="container mt-5 mb-5 pt-5">

    <form class="section-shadow p-3" action="{{ route('products.update', $product) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">

            <div class="col-sm-6">
                <div class="input-group mb-3">
                    <input name="image" type="file" class="form-control" id="create_product_image_input">
                    <label class="input-group-text" for="create_product_image_input">Download</label>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Title</label>
                    <input value="{{ $product->title }}" name="title" type="text" class="form-control" id="" placeholder="Title">
                </div>
                <div class="mb-3">
                    <div class="row">
                        <div class="col-6">
                            <label for="" class="form-label">Price</label>
                            <input value="{{ $product->price }}" name="price" type="text" class="form-control" id="" placeholder="Price">
                        </div>
                        <div class="col-6">
                            <label for="" class="form-label">Status</label>
                            <select class="form-select" name="status">
                                <option value="in_stock" {{ $product->status == 'in_stock' ? 'selected' : '' }}>in_stock</option>
                                <option value="out_of_stock" {{ $product->status == 'out_of_stock' ? 'selected' : '' }}>out_of_stock</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label  for="" class="form-label">Description</label>
                    <textarea name="description" class="form-control" rows="3">{{ $product->description }}</textarea>
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary groups-update-btn">
                        Save
                    </button>
                </div>
            </div>
            <div class="col-sm-6">
                <label class="text-center cursor-pointer d-block upload-image-label" for="create_product_image_input">
                    <img class="img-thumbnail" src="{{ $product->image }}" alt="" id="create_product_image_preloader">
                </label>
            </div>


        </div>
    </form>
</div>


<script>

    var log = console.log
    var create_product_image_input = document.getElementById('create_product_image_input')
    var create_product_image_preloader = document.getElementById('create_product_image_preloader')


    create_product_image_input.addEventListener('change', function (e) {
        var file = e.target.files[0];

        const fileType = file['type'];
        const validImageTypes = ['image/jpeg', 'image/png'];
        if (!validImageTypes.includes(fileType)) {
            alert('danger', 'Wrong format!')
            return
        }

    if (FileReader) {
        var reader = new FileReader();
        reader.onload = function (e) {
            create_product_image_preloader.src = reader.result;
        };
        reader.readAsDataURL(file);
    }

    });
</script>
@endsection
