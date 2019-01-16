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
<style>
    /*
 * Footer
 */
    .blog-footer {
        padding: 2.5rem 0;
        color: #999;
        text-align: center;
        background-color: #f9f9f9;
        border-top: .05rem solid #e5e5e5;
    }
    .blog-footer p:last-child {
        margin-bottom: 0;
    }
</style>
<footer class="blog-footer">
    <p>Blog template built for <a href="https://getbootstrap.com/">Bootstrap</a> by <a href="https://twitter.com/mdo">@mdo</a>.</p>
    <p>
        <a href="#">Back to top</a>
    </p>
</footer>
<!-- JavaScript -->
<script src="{{ asset('assets/shop/js/scripts.js') }}"></script>

</body>
</html>