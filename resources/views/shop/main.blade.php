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


            <br>
            <div class="row">
                @yield('content')
            </div>
            <!-- /.row -->
            <br>
            <br>
            <br>

            <br>
            <br>
            <br>

    <!-- /.row -->
</div>
<!-- /.container -->
<br>
<footer class="footer">
    <div class="container">
        <span class="text-muted">AutoShop @ 2018</span>
    </div>
</footer>
<!-- JavaScript -->
<script src="{{ asset('assets/shop/js/scripts.js') }}"></script>

</body>
</html>