<!-- Logo -->
<div class="d-flex bd-highlight mb-3">
    <div class="p-2 flex-grow-1 bd-highlight pl-5">
        <img src="/img/logo.png" width="200px">
    </div>
    <div class="p-2 bd-highlight pr-5 refresh-cart">
        Товаров корзине: <b>{{ $showCart->sum('quantity') }}</b><br>На сумму: {{$showCart->sum('total_price')}} <i class="fas fa-dollar-sign"></i>
        <br>
        <div class="pt-2">
            <a href="{{ route('shop.cart') }}" class="btn btn-outline-success btn-sm btn-block"><i class="fas fa-shopping-cart"></i> В корзину</a>
        </div>
    </div>
</div>

<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark rounded">
    <div class="container-fluid">

        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav center-block mx-auto">
                <li class="nav-item {{ Request::is('/') ? 'active' : '' }}">
                    <a class="nav-link" href="/"><i class="fas fa-home"></i> Главная
                        <span class="sr-only">(current)</span>
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-list-ul"></i> Каталог
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        @include('shop.layouts.categories')
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Не нашли нужное?</a>
                    </div>
                </li>
                <li class="nav-item {{ Request::is('about') ? 'active' : '' }}">
                    <a class="nav-link" href="/about"><i class="fas fa-info-circle"></i> О магазине</a>
                </li>
                <li class="nav-item {{ Request::is('contacts') ? 'active' : '' }}">
                    <a class="nav-link" href="/contacts"><i class="fas fa-phone-square"></i> Контакты</a>
                </li>
                <li class="nav-item {{ Request::is('login') ? 'active' : '' }}">
                    <a class="nav-link" href="#"><i class="fas fa-sign-in-alt"></i> Личный кабинет</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
