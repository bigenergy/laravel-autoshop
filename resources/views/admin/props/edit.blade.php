@extends('layouts.app')
@section('title', 'Редактировать поле')
@section('content')
    {!! Form::model($propsEdit, [
        'route' => ['props.update', $propsEdit->id],
        'method' => 'PUT',
        'class' => 'form-horizontal'
    ]) !!}
    @include('admin.props.form')
    <div class="box-footer">
        <button type="submit" class="btn btn-info pull-right">Сохранить</button>
    </div>
    {!! Form::close() !!}
@endsection
