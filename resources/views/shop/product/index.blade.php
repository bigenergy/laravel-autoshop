@extends('shop.main')
@section('content')
    @forelse($products as $product)
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
                    <h5>Стоимость: {{ $product->price }} $</h5>
                    <hr>
                    <p class="card-text">{{ $product->description }}</p>
                </div>
                <div class="card-footer">
                    <div class="detail-product-cart__container">
                        <div align="center">
                            <input type="number" class="product-count form-control" min="1" value="1">
                        </div>
                        <br>

                        <button data-id={{ $product->id }} type="button" class="buy-button btn btn-outline-success btn-block">Купить</button>
                        <button data-id={{ $product->id }} type="button" class="buy-button btn btn-outline-success btn-block" hidden>В корзине</button>
                    </div>
                </div>
            </div>
        </div>

    @empty
        <div class="container">
            <div class="alert alert-danger" role="alert">
                <h4 class="alert-heading">Произошла ошибка</h4>
                <p>Данный товар не найден.</p>
                <hr>
                <p class="mb-0">Возможно он был перенесен или убран с продажи.</p>
            </div>
        </div>
    @endforelse

    @include('shop.product.modal')

@endsection