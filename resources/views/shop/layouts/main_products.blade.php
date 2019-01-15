@extends('shop.main')
@section('content')
    <style>
        .swiper-container-new {
            width: 100%;
            height: 380px;
        }
        .swiper-slide {
            text-align: center;
            font-size: 18px;
            background: #fff;
            /* Center slide text vertically */
            display: -webkit-box;
            display: -ms-flexbox;
            display: -webkit-flex;
            display: flex;
            -webkit-box-pack: center;
            -ms-flex-pack: center;
            -webkit-justify-content: center;
            justify-content: center;
            -webkit-box-align: center;
            -ms-flex-align: center;
            -webkit-align-items: center;
            align-items: center;
        }
    </style>
    <div class="container">
        <!-- Swiper -->
        <div class="swiper-container rounded">
            <div class="swiper-wrapper ">
                <div class="swiper-slide"><img src="/img/slider/slide-1.jpg"> </div>
                <div class="swiper-slide"><img src="/img/slider/slide-2.jpg"> </div>
                <div class="swiper-slide"><img src="/img/slider/slide-3.jpg"> </div>
            </div>
            <!-- Add Pagination -->
            <div class="swiper-pagination"></div>
        </div>
        <br>
        <h2><a href="{{ route('shop.new_sellers') }}"><i class="far fa-newspaper"></i> Новинки</a></h2>
        <hr>
        <!-- Swiper -->
        <div class="swiper-container" id="sliderNew">
            <div class="swiper-wrapper">
                @forelse($products as $product)
                    <div class="swiper-slide">
                        <div class="card h-50">
                            <a href="{{ route('shop.product', ['productSlug' => $product->slug]) }}">
                                <img class="card-img-top" height="200px" src="{{ $product->thumbnail }}" alt="{{ $product->name }}">
                            </a>
                            <div class="card-body">
                                <h4 class="card-title">
                                    <b>{{ $product->name }} <br><span class="badge badge-danger">Новинка</span></b>
                                </h4>
                                <h5>{{ $product->price }} $</h5>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="container alert alert-warning" role="alert">
                       Новинки отсутсвуют :(
                    </div>
                @endforelse
            </div>
            <!-- Add Pagination -->
            <div class="swiper-pagination"></div>
        </div>
        <br>
        <h2><a href="/about"><i class="fas fa-info-circle"></i> О компании</a></h2>
        <hr>
        <p>{!! $about->content !!}</p>
    </div>
@endsection