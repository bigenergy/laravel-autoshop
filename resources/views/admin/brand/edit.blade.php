@extends('layouts.app')
@section('title', 'Редактирование бренда')
@section('content')
    {{ Form::model($brandForEdit, [
        'method' => 'PUT',
        'class' => 'form-horizontal',
        'route' => ['brand.update', $brandForEdit->id],
        "enctype" => "multipart/form-data",
        'files' => true
    ]) }}
    @include('admin.brand.form')
    @include('admin.brand.form_images')
    <div class="box-footer">
        <button type="submit" class="btn btn-info pull-right">Сохранить</button>
    </div>
    {!! Form::close() !!}
@endsection