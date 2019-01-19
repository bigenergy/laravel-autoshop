@extends('shop.main')

@section('content')
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">{{ env('APP_NAME') }}</a></li>
                <li class="breadcrumb-item"><a href="/">Каталог</a></li>
            </ol>
        </nav>
        <h5>Каталог товаров</h5>
        <hr>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="row">
                    @forelse($productTypes as $type)
                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="card h-100">
                                <div class="card-body">
                                    <h4 class="card-title">
                                        <a href="{{ route('shop.category', $type->slug) }}">
                                            <b>{{ $type->name }}</b>
                                        </a>
                                    </h4>
                                    В наличии: {{ $type->product->count() }}
                                </div>

                                <div class="card-footer">
                                    <a href="{{ route('shop.category', $type->slug) }}" class="btn btn-outline-success btn-block btn-sm @if(!$type->product->count()) disabled @endif">Смотреть <i class="fas fa-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="container">
                            <div class="alert alert-warning" role="alert">
                               Магазин пуст :(
                            </div>
                        </div>
                    @endforelse


                </div>
            </div>
        </div>
    </div>
    <div class="container"></div>
@endsection