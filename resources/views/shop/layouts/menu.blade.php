<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="#"><i class="fas fa-car"></i> AutoShop CMS</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item {{ Request::is('/') ? 'active' : '' }}">
                    <a class="nav-link" href="/"><i class="fas fa-home"></i> Главная
                        <span class="sr-only">(current)</span>
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Каталог
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Не нашли нужное?</a>
                    </div>
                </li>
                <li class="nav-item {{ Request::is('about') ? 'active' : '' }}">
                    <a class="nav-link" href="#"><i class="fas fa-info-circle"></i> О магазине</a>
                </li>
                <li class="nav-item {{ Request::is('contacts') ? 'active' : '' }}">
                    <a class="nav-link" href="#"><i class="fas fa-phone-square"></i> Контакты</a>
                </li>
                <li class="nav-item {{ Request::is('login') ? 'active' : '' }}">
                    <a class="nav-link" href="#"><i class="fas fa-sign-in-alt"></i> Личный кабинет</a>
                </li>
                <li class="nav-item {{ Request::is('cart') ? 'active' : '' }}">
                    <a class="nav-link text-success" href="{{ route('shop.cart') }}"><i class="fas fa-shopping-cart"></i> Корзина</a>
                </li>
            </ul>
        </div>
    </div>
</nav>