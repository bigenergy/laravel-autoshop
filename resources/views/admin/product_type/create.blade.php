@extends('layouts.app')
@section('title', 'Создание типа продукта')
@section('content')
    {!! Form::open([
        'route' => 'type.store',
        'class' => 'form-horizontal',
        'method' => 'post'
    ]) !!}
    @include('admin.product_type.form')
    <div class="box-footer">
        <button type="submit" class="btn btn-info pull-right">Сохранить</button>
    </div>
    {!! Form::close() !!}
@endsection