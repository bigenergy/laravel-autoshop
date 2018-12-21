@extends('layouts.app')
@section('title', 'Создать поле для типов продуктов')
@section('content')
    {!! Form::open([
        'route' => 'props.store',
        'class' => 'form-horizontal',
        'method' => 'post'
    ]) !!}
    @include('admin.props.form')
    <div class="box-footer">
        <button type="submit" class="btn btn-info pull-right">Создать</button>
    </div>
    {!! Form::close() !!}
@endsection