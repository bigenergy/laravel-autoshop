@extends('layouts.app')
@section('title', 'Редактирование заказа')
@section('content')
    {!! Form::open([
      'route' => 'order.store',
      'method' => 'post',
      "enctype" => "multipart/form-data"
  ]) !!}

    <div class="nav-tabs-custom">
        <div class="alert alert-info">
            <div class="order-information__container">
                <h4>Информация о заказе</h4>
                <div class="row">
                    <div id="order_information">
                        @include("admin.order.order_information")

                    </div>

                </div>
            </div>
        </div>
        <ul class="nav nav-tabs">
            <li class="active"><a href="#tab_1" data-toggle="tab">Личные данные</a></li>
            <li><a href="#tab_2" data-toggle="tab">Доставка</a></li>
            <li><a href="#tab_4" data-toggle="tab">Содержимое заказа</a></li>

        </ul>
        <div class="tab-content">
            <div class="tab-pane active" id="tab_1">
                @include('admin.order.create.form_detail')
            </div>
            <!-- /.tab-pane -->
            <div class="tab-pane" id="tab_2">
                @include('admin.order.create.form_delivery')
            </div>
            <!-- /.tab-pane -->
            <div class="tab-pane" id="tab_4">
                <div class="order-products__list">
                    <h4>Список товаров текущего заказа</h4>
                    <hr>
                    <div id="order_products_list">
                        @if(isset($orderItems) && count($orderItems) > 0)
                            @include('admin.order.create.form_order')
                        @endif
                    </div>
                </div>
                <hr>
                <div class="form-group{{ $errors->has('products') ? ' has-error' : '' }} detail-product-orderItem__container">
                    <h4>Добавить товары</h4>
                    {{ Form::select('products[]', $products, null, ["class" => "form-control", "id" => "product_selector", "multiple"]) }}
                    <br>
                    <div class="btn btn-sm btn-success add-product">Добавить</div>
                    <medium class="text-danger">{{ $errors->first('products') }}</medium>
                </div>

            </div>
            <!-- /.tab-pane -->
        </div>

        <!-- nav-tabs-custom -->
    </div>
    <!-- /.row -->
    <!-- END CUSTOM TABS -->

    <div class="box-footer">
        <button type="submit" class="btn btn-info pull-right">Сохранить</button>
    </div>
    {!! Form::close() !!}

@endsection



