@extends('layouts.main')

@section('title', 'Products-shop')

@section('styles-header')


<link rel="stylesheet" href="/css/summernote-lite.min.css">

<style>
    .note-editable { background-color: white !important; }
</style>

@endsection

@section('scripts-body')

<script src="/js/summernote-lite.min.js"></script>

{{-- <script src="/lang/summernote-uk-UA.min.js"></script> --}}

<script>
        $(document).ready(function() {
    $('#summernote').summernote({
        lang: 'uk-UA',
        height: 250,                 // set editor height
        minHeight: null,             // set minimum height of editor
        maxHeight: null,             // set maximum height of editor
        focus: true,                  // set focus to editable area after initializing summernote

    });
});
</script>

@endsection

@section('content')

@include('/blocks.profile-header')

@include('blocks.products-menu')

<div class="container mt-5 mb-5 pt-5">

    <form class="section-shadow p-3" action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">

            <div class="col-sm-6">
                <div class="input-group mb-3">
                    <input name="image" type="file" class="form-control" id="create_product_image_input">
                    <label class="input-group-text" for="create_product_image_input">Основное изображение</label>
                </div>
                <div class="input-group mb-3">
                    <input name="gallery[]" type="file" class="form-control" id="create_product_gallery_input" multiple>
                    <label class="input-group-text" for="create_product_gallery_input">Галерея</label>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Title</label>
                    <input value="{{ old('title') }}" name="title" type="text" class="form-control" id="" placeholder="Title">
                </div>
                <div class="mb-3">
                    <div class="row">
                        <div class="col-6">
                            <label for="" class="form-label">Price</label>
                            <input value="{{ old('price') }}" name="price" type="text" class="form-control" id="" placeholder="Price">
                        </div>
                        <div class="col-6">
                            <label for="" class="form-label">Status</label>
                            <select class="form-select" name="status">
                                <option value="in_stock">in_stock</option>
                                <option value="out_of_stock">out_of_stock</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label  for="" class="form-label">Description</label>
                    <textarea id="summernote" name="description"  class="form-control" rows="3">{{ old('description') }}</textarea>
                </div>
                <div class="mb-3">
                    <button type="submit" name="save" class="btn btn-primary groups-update-btn">
                        Save and edit <i class="bi bi-pencil ms-2"></i>
                    </button>
                    <button type="submit" name="view" class="btn btn-primary groups-update-btn">
                        Save and view <i class="bi bi-eye ms-2"></i>
                    </button>
                </div>
            </div>
            <div class="col-sm-6">
                <label class="text-center cursor-pointer d-block upload-image-label" for="create_product_image_input">
                    <img class="img-thumbnail" src="/images/no-image.png" alt="" id="create_product_image_preloader">
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



{{-- name="description" --}}
