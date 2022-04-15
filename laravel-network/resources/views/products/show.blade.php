@extends('layouts.main')

@section('title', 'Profile-product')


@section('styles-header')

<link href="/node_modules/lightbox/dist/bundle-main.css" rel="stylesheet" type="text/css" />

{{-- D:\xampp\htdocs\php-lessons\laravel-network\node_modules\lightbox\dist\bundle-main.css --}}

{{-- D:\xampp\htdocs\php-lessons\laravel-network\node_modules\lightbox\dist --}}

{{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.css"> --}}
{{-- <style>
    #mainCarousel {
  width: 600px;
  margin: 0 auto 1rem auto;

  --carousel-button-color: #170724;
  --carousel-button-bg: #fff;
  --carousel-button-shadow: 0 2px 1px -1px rgb(0 0 0 / 20%),
    0 1px 1px 0 rgb(0 0 0 / 14%), 0 1px 3px 0 rgb(0 0 0 / 12%);

  --carousel-button-svg-width: 20px;
  --carousel-button-svg-height: 20px;
  --carousel-button-svg-stroke-width: 2.5;
}

#mainCarousel .carousel__slide {
  width: 100%;
  padding: 0;
}

#mainCarousel .carousel__button.is-prev {
  left: -1.5rem;
}

#mainCarousel .carousel__button.is-next {
  right: -1.5rem;
}

#mainCarousel .carousel__button:focus {
  outline: none;
  box-shadow: 0 0 0 4px #A78BFA;
}

#thumbCarousel .carousel__slide {
  opacity: 0.5;
  padding: 0;
  margin: 0.25rem;
  width: 96px;
  height: 64px;
}

#thumbCarousel .carousel__slide img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  border-radius: 4px;
}

#thumbCarousel .carousel__slide.is-nav-selected {
  opacity: 1;
}
</style> --}}

@endsection

@section('scripts-body')

<script type="text/javajscript" src="/node_modules/lightbox/dist/bundle-main.js"></script>



{{-- <script src="https://cdn.tailwindcss.com"></script> --}}

@endsection

{{-- @section('content')

<script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.umd.js"></script>
<h1 class="mt-12 mb-8 px-6 text-center text-lg md:text-2xl font-semibold">
    Carousel with thumbnail navigation and integrated Fancybox
  </h1>

  <div id="mainCarousel" class="carousel w-10/12 max-w-5xl mx-auto">
    <div
      class="carousel__slide"
      data-src="https://lipsum.app/id/1/900x600"
      data-fancybox="gallery"
      data-caption="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum lobortis ultricies ipsum, a maximus ligula dignissim in. Sed consectetur tellus egestas, consequat dolor at, tempus augue. Morbi quis ipsum quis velit."
    >
      <img src="https://lipsum.app/id/1/600x400" />
    </div>
    <div
      class="carousel__slide"
      data-src="https://lipsum.app/id/2/900x600"
      data-fancybox="gallery"
      data-caption="Ut semper, justo eget vehicula vestibulum, enim enim suscipit lectus, et sagittis nibh risus vel metus. Quisque eu ornare ante, et gravida mauris"
    >
      <img src="https://lipsum.app/id/2/600x400" />
    </div>
    <div
      class="carousel__slide"
      data-src="https://lipsum.app/id/3/900x600"
      data-fancybox="gallery"
      data-caption="Hello 🖐"
    >
      <img src="https://lipsum.app/id/3/600x400" />
    </div>
    <div
      class="carousel__slide"
      data-src="https://lipsum.app/id/4/900x600"
      data-fancybox="gallery"
      data-caption="Another caption"
    >
      <img src="https://lipsum.app/id/4/600x400" />
    </div>
    <div
      class="carousel__slide"
      data-src="https://lipsum.app/id/5/900x600"
      data-fancybox="gallery"
    >
      <img data-lazy-src="https://lipsum.app/id/5/600x400" />
    </div>
    <div
      class="carousel__slide"
      data-src="https://lipsum.app/id/6/900x600"
      data-fancybox="gallery"
    >
      <img src="https://lipsum.app/id/6/600x400" />
    </div>
    <div
      class="carousel__slide"
      data-src="https://lipsum.app/id/7/900x600"
      data-fancybox="gallery"
    >
      <img src="https://lipsum.app/id/7/600x400" />
    </div>
  </div>

  <div id="thumbCarousel" class="carousel max-w-xl mx-auto">
    <div class="carousel__slide">
      <img class="panzoom__content" src="https://lipsum.app/id/1/100x100" />
    </div>
    <div class="carousel__slide">
      <img class="panzoom__content" src="https://lipsum.app/id/2/100x100" />
    </div>
    <div class="carousel__slide">
      <img class="panzoom__content" src="https://lipsum.app/id/3/100x100" />
    </div>
    <div class="carousel__slide">
      <img class="panzoom__content" src="https://lipsum.app/id/4/100x100" />
    </div>
    <div class="carousel__slide">
      <img class="panzoom__content" src="https://lipsum.app/id/5/100x100" />
    </div>
    <div class="carousel__slide">
      <img class="panzoom__content" src="https://lipsum.app/id/6/100x100" />
    </div>
    <div class="carousel__slide">
      <img class="panzoom__content" src="https://lipsum.app/id/7/100x100" />
    </div>
  </div>

  <script>
// Initialise Carousel
const mainCarousel = new Carousel(document.querySelector("#mainCarousel"), {
  Dots: false,
});

// Thumbnails
const thumbCarousel = new Carousel(document.querySelector("#thumbCarousel"), {
  Sync: {
    target: mainCarousel,
    friction: 0,
  },
  Dots: false,
  Navigation: false,
  center: true,
  slidesPerPage: 1,
  infinite: false,
});

// Customize Fancybox
Fancybox.bind('[data-fancybox="gallery"]', {
  Carousel: {
    on: {
      change: (that) => {
        mainCarousel.slideTo(mainCarousel.findPageForSlide(that.page), {
          friction: 0,
        });
      },
    },
  },
});
  </script>

@endsection --}}

@section('content')

@include('/blocks.profile-header')

@include('blocks.products-menu')

<div class="container mt-5">
    <div class="row" style="padding-top: 90px;">
        <div class="goods-images col-sm-6">
            <div class="main-good-img">
                <a href="{{ $product->image }}" data-lightbox="image" data-title="Product image">
                    <img  src="{{ $product->image }}" alt="">
                </a>

            </div>

            <div class="small-goods-img">

                @foreach ($product->images as $image)
                <div class="small-goods-img_">
                    <a href="{{ $image->url }}" data-lightbox="image" data-title="Product image">
                        <img src="{{ $image->url }}" alt="">
                    </a>

                </div>
                @endforeach
                {{-- https://images.unsplash.com/photo-1523275335684-37898b6baf30?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1099&q=80 --}}
            </div>
        </div>
        <div class="goods-info col-sm-6">
            <div class="goods-info-title">
                <h2>{{ $product->title }}
                    <a href="{{ route('products.edit', $product) }}" class="float-end goods-edit-link"><i class="bi bi-pencil-fill"></i></a>
                    <form action="{{ route('products.destroy', $product) }}" method="POST"
                        onsubmit="if(!confirm('Удалять?')) return false">
                        @csrf
                        @method('DELETE')
                        <button class="float-end goods-destroy-button"><i class="bi bi-trash"></i></button>
                    </form>
                </h2>

            </div>
            <div class="goods-info-describtion">
                <p>
                    {{ $product->description }}
                </p>
            </div>
            <div class="goods-info-price">
                {{ $product->price }}$
            </div>
            <div class="goods-info-buttons">
                <a href="{{ route('products.cart', $product) }}" class="goods-info-add-cart">
                    Добавить в корзину
                </a>
                <a href="#" class="goods-info-buy">
                    Купить
                </a>
            </div>

        </div>
    </div>

</div>
@endsection
