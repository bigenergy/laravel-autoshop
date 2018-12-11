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
                <form>
                    <h5>Личные данные</h5>
                    <hr>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Имя</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" id="inputEmail3">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Фамилия</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" id="inputEmail3">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Отчество</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" id="inputEmail3">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" id="inputEmail3" placeholder="На него будет прислана вся информация о вашем заказе">
                        </div>
                    </div>
                    <h5>Доставка</h5>
                    <hr>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Страна</label>
                            <input type="text" class="form-control" id="inputEmail4" placeholder="Россия">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputPassword4">Город</label>
                            <input type="text" class="form-control" id="inputPassword4" placeholder="Москва">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputCity">Улица</label>
                            <input type="text" class="form-control" id="inputCity">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputCity">Дом</label>
                            <input type="text" class="form-control" id="inputCity">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="inputZip">Квартира</label>
                            <input type="text" class="form-control" id="inputZip">
                        </div>
                    </div>

                </form>
            </div>
            <div class="card-footer">
                <div class="coupon col-md-12 col-sm-12 no-padding-left pull-left">

                    <div class="row">
                        <div class="col-8">
                            {{--<p class="refresh-price"><b class="text-success">Итого:</b> <b>{{$cart->sum('quantity')}}</b> товаров на сумму <b>{{$cart->sum('total_price')}}</b> <i class="fas fa-dollar-sign"></i></b></p>--}}
                        </div>
                        <div class="col-4">
                            <a href="{{ route('shop.cart.detail') }}" class="btn btn-outline-success btn-block">Далее</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection