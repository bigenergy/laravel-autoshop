@extends('shop.main')

@section('content')
    <div class="container">
        <h5>Товаров найдено: {{ $products->count() }}</h5>
        <hr>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                @include('shop.filter.filter')
            </div>
            <div class="col-sm-9">
                <div class="btn-group mb-4" role="group" aria-label="Basic example">
                    <button type="button" class="btn btn-outline-success btn-sm"><i class="fas fa-search-dollar"></i> Цена</button>
                    <button type="button" class="btn btn-outline-success btn-sm"><i class="fas fa-sort-alpha-up"></i> Название</button>
                </div>
                <div class="row">
                    @forelse($products as $product)
                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="card h-100">
                                <a href="{{ route('shop.product', ['productSlug' => $product->slug]) }}">
                                    <img class="card-img-top" src="{{ $product->thumbnail }}" height="140px" alt="{{ $product->name }}">
                                </a>
                                <div class="card-body">
                                    <h4 class="card-title">
                                        <b>{{ $product->name }}</b>
                                    </h4>
                                    <h5>{{ $product->price }} $</h5>
                                    <p class="card-text">{{ substr($product->description, 0, 100) }}...</p>
                                </div>
                                <div class="card-footer">
                                    <a href="{{ route('shop.product', ['productSlug' => $product->slug]) }}" class="btn btn-outline-success btn-block btn-sm">Просмотреть</a>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="container alert alert-warning" role="alert">
                            Не найдено ни одного продукта :(
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
<div class="container">{{ $products->links() }}</div>

@endsection