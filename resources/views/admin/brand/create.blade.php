@extends('layouts.app')
@section('title', 'Создание бренда')
@section('content')
    {!! Form::open([
        'route' => 'brand.store',
        'class' => 'form-horizontal',
        "enctype" => "multipart/form-data",
        'method' => 'post',
        'files' => true
    ]) !!}
    @include('admin/brand/form')
    <div class="form-group refresh-after-ajax-img2">
        {{ Form::label('image', 'Изображение', ['class' => 'col-sm-2 control-label']) }}
        <div class="col-sm-10">
            {!! Form::file('image', array('class'=>'btn btn-primary')) !!}
        </div>
    </div>
    <div class="box-footer">
        <button type="submit" class="btn btn-info pull-right">Сохранить</button>
    </div>
    {!! Form::close() !!}
@endsection



