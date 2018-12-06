@extends('shop.main')
@section('content')
    @forelse($products as $product)
        <div class="col-md-12">
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
                    <h5>{{ $product->price }} $</h5>
                    <p class="card-text">{{ $product->description }}</p>
                </div>
                <div class="card-footer">
                    <div class="detail-product-cart__container">
                        <div align="center">
                            <input type="number" class="product-count" min="1" value="1">
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
            <div class="alert alert-danger">Товар не найден</div>
        </div>
    @endforelse
@endsection