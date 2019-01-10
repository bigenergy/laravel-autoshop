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

@include('shop.layouts.menu')


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.4.6/css/swiper.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.4.6/css/swiper.min.css">

<script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.4.6/js/swiper.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.4.6/js/swiper.min.js"></script>


<!-- Page Content -->
<div class="container">

    <div class="row">

        <div class="col-lg-12">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <a class="navbar-brand" href="#">AutoShop</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                        <a class="nav-item nav-link active" href="#">Home <span class="sr-only">(current)</span></a>
                        <a class="nav-item nav-link" href="#">Features</a>
                        <a class="nav-item nav-link" href="#">Pricing</a>
                        <a class="nav-item nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                    </div>
                </div>
            </nav>
            <br>
            <!-- Swiper -->
            <div class="swiper-container ">
                <div class="swiper-wrapper ">
                    <div class="swiper-slide"><img src="https://www.3m.co.uk/wps/wcm/connect/134e75b0-367f-49a9-9f9d-24bec32adc77/1080-Gloss-Blue-Fire-5-1200x400.jpg?MOD=AJPERES&CACHEID=ROOTWORKSPACE-134e75b0-367f-49a9-9f9d-24bec32adc77-m0D9UOK"> </div>
                    <div class="swiper-slide"><img src="http://www.codyplumbing.com/wp-content/uploads/2016/06/services-1200x400-c-default.jpg"> </div>
                    <div class="swiper-slide"><img src="https://www.ponds.com/content/dam/unilever/ponds/south_africa/general_image/skin_care/all/breathing-techniques-hero-1222371.jpg.ulenscale.1200x400.jpg"> </div>
                </div>
                <!-- Add Pagination -->
                <div class="swiper-pagination"></div>
            </div>
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
        </div>
        <!-- /.col-lg-9 -->
    </div>
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
{{--<script src="{{ asset('assets/shop/js/all.js') }}"></script>--}}

<script src="{{ asset('assets/shop/js/scripts.js') }}"></script>
<script>
    var swiper = new Swiper('.swiper-container', {
        pagination: {
            el: '.swiper-pagination',
            dynamicBullets: true,
        },
    });

    var swipernew = new Swiper('#sliderNew', {
        slidesPerView: 3,
        spaceBetween: 30,
        loop: true,
        pagination: {
            el: '#sliderNewPagination',
            clickable: true,
        },
    });
</script>
</body>
</html>