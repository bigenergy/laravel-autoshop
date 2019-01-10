@extends('layouts.app')
@section('title', 'Редактирование статической страницы')
@section('content')
    {!! Form::model($pageForEdit, [
        'route' => ['pages.update', $pageForEdit->id],
        'method' => 'PUT',
        'class' => 'form-horizontal'
    ]) !!}
    @include('admin.pages.form')
    <div class="box-footer">
        <button type="submit" class="btn btn-info pull-right">Сохранить</button>
    </div>
    {!! Form::close() !!}
@endsection
