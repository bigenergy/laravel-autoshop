@extends('layouts.app')
@section('title', 'Редактрировать статус')
@section('content')
    {!! Form::model($statusForEdit, [
        'route' => ['status.update', $statusForEdit->id],
        'method' => 'PUT',
        'class' => 'form-horizontal'
    ]) !!}
    @include('admin.status.form')
    <div class="box-footer">
        <button type="submit" class="btn btn-info pull-right">Сохранить</button>
    </div>
    {!! Form::close() !!}
@endsection



