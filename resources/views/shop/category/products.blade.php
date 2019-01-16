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
                <fieldset id="sort_filter">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="inputGroupSelect01">Сортировать по</label>
                    </div>
                    <select class="custom-select" id="sortingSelector" data-slug="{{ $catalogType->slug }}">
                        <option selected disabled>Выберите...</option>
                        <option value="1">По возрастанию цены</option>
                        <option value="2">По убыванию цены</option>
                        <option value="3">По наименованию</option>
                        <option value="4">По новинкам</option>
                    </select>
                </div>
                </fieldset>
                <div class="text-center" id="sorting_loader" hidden>
                    <span class="spinner-border spinner-border-sm text-success" role="status" aria-hidden="true"></span>
                    Загрузка...
                    <hr>
                </div>

                <div class="row" id="filter_information">
                @include('shop.category.list')
                </div>
            </div>
        </div>
    </div>
<div class="container">{{ $products->links() }}</div>

@endsection