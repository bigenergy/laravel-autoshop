@extends('shop.main')
@section('content')
    <style>
        .swiper-container-new {
            width: 100%;
            height: 380px;
        }
        .swiper-slide {
            text-align: center;
            font-size: 18px;
            background: #fff;
            /* Center slide text vertically */
            display: -webkit-box;
            display: -ms-flexbox;
            display: -webkit-flex;
            display: flex;
            -webkit-box-pack: center;
            -ms-flex-pack: center;
            -webkit-justify-content: center;
            justify-content: center;
            -webkit-box-align: center;
            -ms-flex-align: center;
            -webkit-align-items: center;
            align-items: center;
        }
    </style>
    <div class="container">
        <h2>Новинки</h2>
        <!-- Swiper -->
        <div class="swiper-container" id="sliderNew">
            <div class="swiper-wrapper">

                @forelse($products as $product)
                    <div class="swiper-slide">
                        <div class="card h-50">
                            <a href="{{ route('shop.product', ['productSlug' => $product->slug]) }}">
                                <img class="card-img-top" height="200px" src="{{ $product->thumbnail }}" alt="{{ $product->name }}">
                            </a>
                            <div class="card-body">
                                <h4 class="card-title">
                                    <b>{{ $product->name }}</b>
                                </h4>
                                <h5>{{ $product->price }} $</h5>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="container alert alert-warning" role="alert">
                        В магазине нет продуктов.
                    </div>
                @endforelse
            </div>
            <!-- Add Pagination -->
            <div class="swiper-pagination"></div>
        </div>
        <br>
        <h2>О компании</h2>
        <p>  Оптовый интернет-магазин AvtoShop начал свою работу 12 лет назад на базе одесского магазина-склада, который находится на промрынке «7 километр».
            Всю бытовую электронику, которая реализуется на складе, мы предлагаем приобрести через Интернет, чтобы покупатели из любого региона Украины могли получить качественный товар по приемлемым ценам, не приезжая для этого специально в Одессу.
            Наш магазин-склад в Одессе работает с 2002 года. Мы уже 14 лет специализируемся только на бытовой электронике, поэтому знаем все свои модели и детально проконсультируем каждого своего клиента.
            В интернет-магазине AvtoShop представлено 26 категорий и более 3000 наименований товара, среди которых автоэлектроника, компьютерная техника, мобильные телефоны, зарядные устройства, системы видеонаблюдений и многое другое. У нас есть что выбрать без дополнительных переплат.



            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
    </div>
@endsection