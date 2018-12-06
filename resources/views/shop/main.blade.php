<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>AutoShop - Каталог</title>

    <!-- All CSS -->
    <link href="{{ asset('assets/shop/css/all.css') }}" rel="stylesheet">
</head>

<body>

@include('shop.layouts.menu')

<!-- Page Content -->
<div class="container">

    <div class="row">

        <div class="col-lg-3">

            <h1 class="my-4">AutoShop</h1>
            @include('shop.layouts.categories')
            {{--@include('shop.layouts.brands')--}}

        </div>
        <!-- /.col-lg-3 -->

        <div class="col-lg-9">
            <br>
            <div class="row">
                @yield('content')
            </div>
            <!-- /.row -->
            <br>
        </div>
        <!-- /.col-lg-9 -->

    </div>
    <!-- /.row -->

</div>
<!-- /.container -->



<!-- JavaScript -->
{{--<script src="{{ asset('assets/shop/js/all.js') }}"></script>--}}
<script src="{{ asset('assets/shop/js/scripts.js') }}"></script>


</body>

</html>