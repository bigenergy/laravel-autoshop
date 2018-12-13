@extends('shop.main')
@section('content')

    <div class="container">
        <div class="progress">
            <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" style="width: 75%;" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">Этап: 2/3</div>
        </div>
        <br>
        <div class="card shopping-cart">
            <div class="card-header bg-dark text-light">
                <i class="fab fa-wpforms"></i>
                Заполните данные для совершения заказа
                <div class="clearfix"></div>
            </div>
            <div class="card-body">
                {!! Form::open([
                     'route' => 'shop.order.detail.write',
                     'method' => 'POST'
                   ]
                ) !!}
                    @include('shop.order.order_detail_form')
            </div>
            <div class="card-footer">
                <div class="coupon col-md-12 col-sm-12 no-padding-left pull-left">

                    <div class="row">
                        <div class="col-6">
                            <a href="{{ route('shop.cart') }}" class="btn btn-outline-primary btn-block">Назад в корзину</a>
                        </div>
                        <div class="col-6">
                            <button type="submit" class="btn btn-outline-success btn-block">Далее</button>
                        </div>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>

@endsection