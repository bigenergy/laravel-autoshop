@extends('layouts.app')
@section('title', 'Редактирование заказа')
@section('content')
    {!! Form::model($order->getAttributes(), [
      'route' => ['order.update', $order->id],
      'method' => 'patch',
      "enctype" => "multipart/form-data"
  ]) !!}

    <button data-id='{{ $order->id }}' class="btn btn-danger btn-xs destroy_order" type="button">Удалить заказ </button>

    <div id="my_order" data-id="{{ $order->id ?? null}}"></div>
    <div class="order-customer__container">
        <div class="order-customer__header section-header">Личные данные</div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group{{ $errors->has('second_name') ? ' has-error' : '' }}">
                    {{ Form::label('second_name', 'Фамилия') }}
                    {{ Form::text('second_name', null, ["class" => "form-control"]) }}
                    <medium class="text-danger">{{ $errors->first('second_name') }}</medium>
                </div>

                <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
                    {{ Form::label('first_name', 'Имя') }}
                    {{ Form::text('first_name', null, ["class" => "form-control"]) }}
                    <medium class="text-danger">{{ $errors->first('first_name') }}</medium>
                </div>

                <div class="form-group{{ $errors->has('middle_name') ? ' has-error' : '' }}">
                    {{ Form::label('middle_name', 'Отчество') }}
                    {{ Form::text('middle_name', null, ["class" => "form-control"]) }}
                    <medium class="text-danger">{{ $errors->first('middle_name') }}</medium>
                </div>

                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    {{ Form::label('email', 'email') }}
                    {{ Form::text('email', null, ["class" => "form-control"]) }}
                    <medium class="text-danger">{{ $errors->first('email') }}</medium>
                </div>
            </div>
            <div class="col-md-6">
                <div class="order-customer-address__container">
                    <div class="form-group{{ $errors->has('country') ? ' has-error' : '' }}">
                        {{ Form::label('country', 'Страна') }}
                        {{ Form::text('country', null, ["class" => "form-control"]) }}
                        <medium class="text-danger">{{ $errors->first('country') }}</medium>
                    </div>
                    <div class="form-group{{ $errors->has('city') ? ' has-error' : '' }}">
                        {{ Form::label('city', 'Город') }}
                        {{ Form::text('city', null, ["class" => "form-control"]) }}
                        <medium class="text-danger">{{ $errors->first('city') }}</medium>
                    </div>
                    <div class="form-group{{ $errors->has('street') ? ' has-error' : '' }}">
                        {{ Form::label('street', 'Улица') }}
                        {{ Form::text('street', null, ["class" => "form-control"]) }}
                        <medium class="text-danger">{{ $errors->first('street') }}</medium>
                    </div>
                    <div class="form-group{{ $errors->has('post_code') ? ' has-error' : '' }}">
                        {{ Form::label('post_code', 'Почтовый код') }}
                        {{ Form::text('post_code', null, ["class" => "form-control"]) }}
                        <medium class="text-danger">{{ $errors->first('post_code') }}</medium>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="order-options__container">
        <div class="section-header">Настройки заказа</div>
        <div class="row">
            <div id="order_soptions">
                <div class="col-md-6">
                    <div class="form-group{{ $errors->has('status_id') ? ' has-error' : '' }}">
                        {{ Form::label('status_id', 'Выберите статус') }}
                        {{ Form::select('status_id', $statuses, null, ["class" => "form-control"]) }}
                        <medium class="text-danger">{{ $errors->first('status_id') }}</medium>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="order-information__container">
        <div class="section-header">Информация о заказе</div>
        <div class="row">
            <div id="order_information">
                @include("admin.order.order_information")
            </div>
        </div>
    </div>
    <div class="order-products__list">
        <div class="section-header">Список товаров</div>
        <div id="order_products_list">
            @if(isset($orderItems) && count($orderItems) > 0)
                @include('admin.order.template')
            @endif
        </div>
    </div>
    <div class="form-group{{ $errors->has('products') ? ' has-error' : '' }} detail-product-orderItem__container">
        {{ Form::label('products[]', 'Добавьте продукты к заказу') }}
        {{ Form::select('products[]', $products, null, ["class" => "form-control", "id" => "product_selector", "multiple"]) }}
        <div class="btn btn-sm btn-danger add-product">Добавить</div>
        <medium class="text-danger">{{ $errors->first('products') }}</medium>
    </div>
    <!-- /.box-body -->
    <div class="box-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
    {!! Form::close() !!}

@endsection



