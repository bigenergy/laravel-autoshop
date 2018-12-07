@extends('shop.main')
@section('content')

    <div class="container">
        <div class="card shopping-cart">
            <div class="card-header bg-dark text-light">
                <i class="fas fa-shopping-cart"></i>
                Корзина покупок
                <div class="clearfix"></div>
            </div>
            <div class="card-body">
                <!-- PRODUCT -->
                @foreach($cart as $item)
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-2 text-center">
                            <img class="img-responsive" src="{{ $item->product->thumbnail }}" alt="prewiew" width="120" height="80">
                        </div>
                        <div class="col-12 text-sm-center col-sm-12 text-md-left col-md-6">
                            <h4 class="product-name">
                                <strong>
                                  {{ $item->product->name }}
                                </strong>
                            </h4>
                            <h5>
                                <small>{{ $item->product->description }}</small>
                            </h5>
                        </div>
                        <div class="col-12 col-sm-12 text-sm-center col-md-4 text-md-right row">
                            <div class="col-3 col-sm-3 col-md-6 text-md-right" style="padding-top: 5px">
                                <h6><strong>{{ $item->price }} $ <span class="text-muted">x</span></strong></h6>
                                Итог: {{ $item->total_price }}
                            </div>
                            <div class="col-4 col-sm-4 col-md-4">
                                <div class="quantity">
                                    <input type="number" step="1" max="99" min="1" value="{{ $item->quantity }}" size="4">
                                </div>
                            </div>
                            <div class="col-2 col-sm-2 col-md-2 text-right">
                                <button type="button" class="btn btn-outline-danger btn-sm">
                                    <i class="far fa-trash-alt"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <hr>
                @endforeach

                <!-- END PRODUCT -->

                <div class="pull-right">
                    <a href="" class="btn btn-outline-secondary pull-right">
                        Update shopping cart
                    </a>
                </div>
            </div>
            <div class="card-footer">
                <div class="coupon col-md-12 col-sm-12 no-padding-left pull-left">
                    <div class="row">
                        <div class="col-8">
                            <input type="text" class="form-control" placeholder="Код купона">
                        </div>
                        <div class="col-4">
                            <input type="submit" class="btn btn-default btn-block" value="Применить">
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-8">
                            <b>Итого:</b> <b>{{$cart->sum('quantity')}}</b> товаров на сумму <b>{{$cart->sum('total_price')}}</b> <i class="fas fa-dollar-sign"></i></b>
                        </div>
                        <div class="col-4">
                            <a href="" class="btn btn-success btn-block"><i class="far fa-credit-card"></i> Оплатить</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection