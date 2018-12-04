@extends('shop.main')
@section('content')

    @forelse($products as $product)
        <div class="col-lg-4 col-md-6 mb-4">
            <div class="card h-100">
                <a href="#">
                    <img class="card-img-top" src="
                            @foreach ($product->images as $images)
                                @if($loop->index < 1)
                                    {{ $images->fullUrl }}
                                @endif
                            @endforeach
                            " alt="{{ $product->name }}">
                </a>
                <div class="card-body">
                    <h4 class="card-title">
                        <a href="#">{{ $product->name }}</a>
                    </h4>
                    <h5>{{ $product->price }} $</h5>
                    <p class="card-text">{{ $product->description }}</p>
                </div>
                <div class="card-footer">
                    <a href="" class="btn btn-outline-success btn-block btn-sm">Просмотреть</a>
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