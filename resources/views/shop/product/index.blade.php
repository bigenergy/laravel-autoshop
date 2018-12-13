@extends('shop.main')
@section('content')
        <div class="col-md-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">AutoShop</a></li>
                    <li class="breadcrumb-item"><a href="#">Продукты</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $product->name }}</li>
                </ol>
            </nav>
            <div class="card h-100">
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        @foreach( $product->images as $photo )
                            <li data-target="#carouselExampleIndicators" data-slide-to="{{ $loop->index }}" class="{{ $loop->first ? 'active' : '' }}"></li>
                        @endforeach
                    </ol>
                    <div class="carousel-inner">
                        @foreach($product->images as $image)
                            <div class="carousel-item {{ $loop->first ? ' active' : '' }}">
                                <img class="d-block img-fluid" src="{{ $image->fullUrl }}" alt="Second slide">
                            </div>
                        @endforeach
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
                <div class="card-body">
                    <h4 class="card-title">
                        {{ $product->name }}
                    </h4>
                    <h5>Стоимость: {{ $product->price }} <i class="fas fa-dollar-sign"></i></h5>
                    <hr>
                    <p class="card-text">{{ $product->description }}</p>
                </div>

                <div class="card-footer">
                    <div class="detail-product-cart__container">
                        @if($isInCart)
                            <a href="/cart" class="buy-button btn btn-outline-success btn-block">В корзине <i class="fas fa-cart-arrow-down"></i></a>
                        @else
                            <div align="center">
                                <input type="number" class="product-count form-control" min="1" value="1">
                            </div>
                            <br>
                            <button data-id={{ $product->id }} type="button" class="buy-button btn btn-outline-success btn-block">Купить <i class="fas fa-cart-plus"></i></button>
                        @endif
                    </div>
                </div>
            </div>
        </div>

    @include('shop.product.modal')

@endsection