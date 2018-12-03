@extends('layouts.app')
@section('title', 'Редактирование категории')
@section('content')
    {{ Form::model($categoryForEdit, [
        'method' => 'PUT',
        'class' => 'form-horizontal',
        'route' => ['category.update', $categoryForEdit->id],
        "enctype" => "multipart/form-data",
        'files' => true
    ]) }}
        @include('admin.category.form')
        @include('admin.category.form_images')
    <div class="box-footer">
        <button type="submit" class="btn btn-info pull-right">Сохранить</button>
    </div>
    <!-- /.box-footer -->
    {!! Form::close() !!}
@endsection