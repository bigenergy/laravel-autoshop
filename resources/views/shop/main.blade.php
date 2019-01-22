<!DOCTYPE html>
<html lang="ru">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="AutoShop CMS - Простой интернет магазин автомобилей">
    <meta name="author" content="AUzhegov">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
    <link rel="icon" href="/favicon.ico" type="image/x-icon">

    <title>AutoShop - Каталог</title>

    <!-- All CSS -->
    <link type="text/css" rel="stylesheet" href="{{ mix('css/app.css') }}">
    <link href="{{ asset('assets/shop/css/all.css') }}" rel="stylesheet">
</head>

<body>

<!-- Page Content -->
<div class="container">
    @include('shop.layouts.menu')
        <div class="row mt-3">
            @yield('content')
        </div>
    <!-- /.row -->
</div>
<!-- /.container -->

<!-- Footer -->
<div class="container">
    <div align="center">
        Developed by Big_Energy (AUzhegov || bigenergy) @ Copyright 2018-2019
        <hr>
    </div>
    <ul class="nav justify-content-center">
        <li class="nav-item">
            <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">AutoShop CMS version <b>{{ env('CMS_VERSION') }}</b></a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" href="https://github.com/bigenergy/laravel-autoshop" target="_blank"><i class="fab fa-github mr-2"></i>GitHub Repository</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="https://vk.com/mrenergy" target="_blank"><i class="fab fa-vk mr-2"></i>Developer link</a>
        </li>
    </ul>
</div>
<!-- JavaScript -->
<script src="{{ asset('assets/shop/js/scripts.js') }}"></script>

</body>
</html>