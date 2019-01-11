@extends('shop.main')
@section('content')

    <div class="container">
        <h1>Новинки</h1>
        <hr>
        <div class="row">
            @forelse($newSeller as $new)
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card h-100">
                        <a href="{{ route('shop.product', ['productSlug' => $new->slug]) }}">
                            <img class="card-img-top" src="{{ $new->thumbnail }}" alt="{{ $new->name }}">
                        </a>
                        <div class="card-body">
                            <h4 class="card-title">
                                <b>{{ $new->name }}</b>
                            </h4>
                            <h5>{{ $new->price }} $</h5>
                            <p class="card-text">{{ substr($new->description, 0, 100) }}...</p>
                        </div>
                        <div class="card-footer">
                            <a href="{{ route('shop.product', ['productSlug' => $new->slug]) }}" class="btn btn-outline-success btn-block btn-sm">Просмотреть</a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="container alert alert-warning" role="alert">
                    В этой категории нет продуктов
                </div>
            @endforelse
        </div>
    </div>

@endsection