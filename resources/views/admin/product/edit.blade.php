@extends('layouts.app')
@section('title', 'Редактирование продукта')
@section('content')
    {{ Form::model($productForEdit, [
        'method' => 'PUT',
        'class' => 'form-horizontal',
        'route' => ['product.update', $productForEdit->id],
        'enctype' => "multipart/form-data",
        'files' => true
    ]) }}
    @include('admin.product.form')
    @include('admin.product.form_images')
    <div class="box-footer">
        <button type="submit" class="btn btn-info pull-right">Сохранить</button>
    </div>
    <!-- /.box-footer -->
    {!! Form::close() !!}
@endsection
