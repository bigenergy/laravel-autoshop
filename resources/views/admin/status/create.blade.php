@extends('layouts.app')
@section('title', 'Создание статуса')
@section('content')
    {!! Form::open([
        'route' => 'status.store',
        'class' => 'form-horizontal',
        'method' => 'post'
    ]) !!}
    @include('admin.status.form')
    <div class="box-footer">
        <button type="submit" class="btn btn-info pull-right">Сохранить</button>
    </div>
    {!! Form::close() !!}
@endsection



