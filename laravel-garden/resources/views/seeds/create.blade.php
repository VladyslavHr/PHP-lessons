@extends('main.index')

@section('title', 'seed-create')

@section('content')


<div class="container">
    @include('blocks.seeds-nav')

    <form action="" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-sm-6">
                <div class="mb-3 bg-dark seed-create-block">
                    <label for="" class="form-label">Название</label>
                    <input value="{{ old('title') }}" name="title" type="text" class="form-control" id="" placeholder="Название">
                </div>
                <div class="mb-3 bg-dark seed-create-block">
                    <label for="" class="form-label">Краткое описание</label>
                    <input value="{{ old('short_info') }}" name="short_info" type="text" class="form-control" id="" placeholder="Краткое описание">
                </div>
                <div class="mb-3 bg-dark seed-create-block">
                    <label for="" class="form-label">Описание полное</label>
                    <textarea value="{{ old('description') }}" name="description" type="text" class="form-control" id="" placeholder="Описание полное"></textarea>
                </div>
                <div class="mb-3 bg-dark seed-create-block">
                    <label for="" class="form-label">Колличество</label>
                    <input value="{{ old('quantity') }}" name="quantity" type="number" class="form-control" id="" placeholder="Колличество">
                </div>
            </div>


            <div class="col-sm-6">
                <label class="text-center cursor-pointer d-block upload-image-label" for="create_product_image_input">
                    <img class="img-thumbnail" src="/images/cat.jpg" alt="" id="create_product_image_preloader">
                </label>
                <div class="input-group mb-3">
                    <input name="image" type="file" class="form-control" id="create_product_image_input">
                    <label class="input-group-text" for="create_product_image_input">Основное изображение</label>
                </div>
                <div class="input-group mb-3">
                    <input name="gallery[]" type="file" class="form-control" id="create_product_gallery_input" multiple>
                    <label class="input-group-text" for="create_product_gallery_input">Галерея</label>
                </div>
            </div>

        </div>

    </form>


@endsection
