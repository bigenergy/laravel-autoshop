@extends('layouts.app')
@section('title', 'Создать новую статическую страницу')
@section('content')
    {!! Form::open([
        'route' => 'pages.store',
        'class' => 'form-horizontal',
        'method' => 'post'
    ]) !!}
    @include('admin.pages.form')
    <div class="box-footer">
        <button type="submit" class="btn btn-info pull-right">Сохранить</button>
    </div>
    {!! Form::close() !!}
@endsection