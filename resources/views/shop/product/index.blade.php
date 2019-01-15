@extends('shop.main')
@section('content')
    <!-- Demo styles -->
    <style>

        .swiper-container {
            width: 100%;
            height: 300px;
            margin-left: auto;
            margin-right: auto;
        }
        .swiper-slide {
            background-size: cover;
            background-position: center;
        }
        .gallery-top {
            height: 80%;
            width: 100%;
        }
        .gallery-thumbs {
            height: 20%;
            box-sizing: border-box;
            padding: 10px 0;
        }
        .gallery-thumbs .swiper-slide {
            height: 100%;
            opacity: 0.4;
        }
        .gallery-thumbs .swiper-slide-thumb-active {
            opacity: 1;
        }
    </style>
        <div class="col-md-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">{{ env('APP_NAME') }}</a></li>
                    <li class="breadcrumb-item"><a href="/">Каталог</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('shop.category', $product->productType->slug) }}">{{ $product->productType->name }}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $product->name }}</li>
                </ol>
            </nav>
           <div class="row">
               <div class="col-sm-6">
                   <!-- Swiper -->
                   <div class="swiper-container gallery-top">
                       <div class="swiper-wrapper">
                           @foreach($product->images as $image)
                               <div class="swiper-slide" style="background-image:url({{ $image->fullUrl }})"></div>
                           @endforeach
                       </div>
                       <!-- Add Arrows -->
                       <div class="swiper-button-next swiper-button-white"></div>
                       <div class="swiper-button-prev swiper-button-white"></div>
                   </div>
                   <div class="swiper-container gallery-thumbs">
                       <div class="swiper-wrapper">
                           @foreach($product->images as $image)
                               <div class="swiper-slide" style="background-image:url({{ $image->fullUrl }})"></div>
                           @endforeach
                       </div>
                   </div>
               </div>
               <div class="col-sm-6 mb-5">
                   <h4 class="card-title">
                       {{ $product->name }}
                   </h4>
                   <h5>Стоимость: {{ $product->price }} <i class="fas fa-dollar-sign"></i></h5>
                   <br>
                   <br>
                   <br>
                   <br>
                   <br>
                   <br>
                   <br>
                   <br>
                   <br>
                   <br>
                   <br>
                   <br>
                   <br>
                   <br>
                   <br>
               </div>
           </div>

            <div class="card h-100">

                <div class="card-body">
                    <h4 class="card-title">
                        {{ $product->name }}
                    </h4>
                    <h5>Стоимость: {{ $product->price }} <i class="fas fa-dollar-sign"></i></h5>
                    <br>
                    @include('shop.product.product_tabs')
                </div>
                <div class="card-footer">
                    <div class="detail-product-cart__container">
                        @if($isInCart)
                            <a href="{{ route('shop.cart') }}" class="buy-button btn btn-outline-success btn-block">В корзине <i class="fas fa-cart-arrow-down"></i></a>
                        @else
                            <div align="center">
                                <input type="number" class="product-count form-control" min="1" value="1">
                            </div>
                            <br>
                            <button data-id={{ $product->id }} type="button" class="buy-button btn btn-outline-success btn-block">В корзину <i class="fas fa-cart-plus"></i></button>
                        @endif
                    </div>
                </div>
            </div>
        </div>

    @include('shop.product.modal')

@endsection