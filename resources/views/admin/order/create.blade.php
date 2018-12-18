@extends('layouts.app')
@section('title', 'Создание заказа')
@section('content')
    {!! Form::open([
        'route' => 'order.store',
        'method' => 'POST',
        'class' => 'form-horizontal'
    ]) !!}

    <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
            <li class="active"><a href="#tab_1" data-toggle="tab">Личные данные</a></li>
            <li><a href="#tab_2" data-toggle="tab">Данные доставки</a></li>
            <li><a href="#tab_3" data-toggle="tab">Статус заказа</a></li>
            <li><a href="#tab_4" data-toggle="tab">Содержимое заказа</a></li>
            <li class="pull-right">
                <a class="btn btn-danger" href="{{ route('order.index') }}">Отменить создание заказа</a>
            </li>
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
            <div class="tab-pane" id="tab_3">
                @include('admin.order.create.form_status')
            </div>
            <!-- /.tab-pane -->
            <div class="tab-pane" id="tab_4">
                @include('admin.order.create.form_order')
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

    @include('admin.order.create.form_add_products')

@endsection



