@extends('layouts.app')
@section('title', 'Редактрировать тип продукта')
@section('content')
    {!! Form::model($productTypeEdit, [
        'route' => ['type.update', $productTypeEdit->id],
        'method' => 'PUT',
        'class' => 'form-horizontal'
    ]) !!}
    @include('admin.product_type.form')
    <div class="box-footer">
        <button type="submit" class="btn btn-info pull-right">Сохранить</button>
    </div>
    {!! Form::close() !!}
@endsection
