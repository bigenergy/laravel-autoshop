@extends('layouts.app')
@section('title', 'Редактирование заказа')
@section('content')
    {!! Form::model($orderForEdit, [
        'route' => ['order.update', $orderForEdit->id],
        'method' => 'PUT',
        'class' => 'form-horizontal'
    ]) !!}

    <div class="nav-tabs-custom">
        <div class="alert alert-{{ $orderForEdit->status->color }}"><b>Заказ #{{ $orderForEdit->number }}</b></div>
        <ul class="nav nav-tabs">
            <li class="active"><a href="#tab_1" data-toggle="tab">Личные данные</a></li>
            <li><a href="#tab_2" data-toggle="tab">Доставка</a></li>
            <li><a href="#tab_3" data-toggle="tab">Статус  <span class="label label-{{ $orderForEdit->status->color }}">{{ $orderForEdit->status->name }}</span></a></li>
            <li><a href="#tab_4" data-toggle="tab">Содержимое заказа</a></li>
            <li class="pull-right">
                <button data-id='{{ $orderForEdit->id }}' class="btn btn-danger btn-xs destroy_order" type="button">Удалить заказ </button>
            </li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane active" id="tab_1">
                @include('admin.order.form_detail')
            </div>
            <!-- /.tab-pane -->
            <div class="tab-pane" id="tab_2">
                @include('admin.order.form_delivery')
            </div>
            <!-- /.tab-pane -->
            <div class="tab-pane" id="tab_3">
                @include('admin.order.form_status')
            </div>
            <!-- /.tab-pane -->
            <div class="tab-pane" id="tab_4">
                @include('admin.order.form_order')
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

    @include('admin.order.form_add_products')

@endsection



