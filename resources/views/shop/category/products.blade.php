@extends('shop.main')

@section('content')
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">{{ env('APP_NAME') }}</a></li>
                <li class="breadcrumb-item"><a href="/">Каталог</a></li>
            </ol>
        </nav>
        <h5>Товаров найдено: {{ $products->count() }}</h5>
        <hr>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                @include('shop.filter.filter')
            </div>
            <div class="col-sm-9">
                @include('shop.filter.sort_filter')
                <div class="row" id="filter_information">
                @include('shop.category.list')
                </div>
            </div>
        </div>
    </div>
<div class="container">{{ $products->links() }}</div>

@endsection