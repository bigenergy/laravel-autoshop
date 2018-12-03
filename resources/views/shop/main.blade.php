<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>AutoShop - Каталог</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/shop/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="assets/shop/css/shop-homepage.css" rel="stylesheet">

</head>

<body>

@include('shop.layouts.menu')

<!-- Page Content -->
<div class="container">

    <div class="row">

        <div class="col-lg-3">

            <h1 class="my-4">AutoShop</h1>
            @include('shop.layouts.categories')

        </div>
        <!-- /.col-lg-3 -->

        <div class="col-lg-9">

            <div class="row">

                @yield('content')

            </div>
            <!-- /.row -->

        </div>
        <!-- /.col-lg-9 -->

    </div>
    <!-- /.row -->

</div>
<!-- /.container -->

<!-- Footer -->
<footer class="py-5 bg-dark">
    <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; AutoShop CMS 2018</p>
    </div>
    <!-- /.container -->
</footer>

<!-- Bootstrap core JavaScript -->
<script src="assets/shop/vendor/jquery/jquery.min.js"></script>
<script src="assets/shop/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>