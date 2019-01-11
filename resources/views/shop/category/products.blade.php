@extends('shop.main')

@section('content')
    <div class="container">
        <h5>Товаров найдено: {{ $products->count() }}</h5>
        <hr>
    </div>
    @forelse($products as $product)
        <div class="col-lg-4 col-md-6 mb-4">
            <div class="card h-100">
                <a href="#">
                    <img class="card-img-top" src="{{ $product->thumbnail }}" alt="{{ $product->name }}">
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
               В этой категории нет продуктов
            </div>
    @endforelse

<div class="container">{{ $products->links() }}</div>

@endsection