@extends('layouts.app')
@section('title', 'Создание продукта')
@section('content')
    {!! Form::open([
        'route' => 'product.store',
        'class' => 'form-horizontal',
        "enctype" => "multipart/form-data"]
    ) !!}
           @include('admin/product/form')
    <div class="form-group">
        {{ Form::label('images[]', 'Загрузка изображений', ['class' => 'col-sm-2 control-label']) }}
        <div class="col-sm-10">
            {!! Form::file('images[]', array('multiple'=>true,'class'=>'btn btn-primary')) !!}
            <small>Мультивыбор на CTRL, максимальное количество изображений для продукта: <b>5</b></small>
        </div>
    </div>
    <div class="box-footer">
        <button type="submit" class="btn btn-info pull-right">Сохранить</button>
    </div>
    <!-- /.box-footer -->
    {!! Form::close() !!}
@endsection