@extends('layouts.app')
@section('title', 'Создать новую категорию')
@section('content')
    {!! Form::open([
       'route' => 'category.store',
       'class' => 'form-horizontal',
       "enctype" => "multipart/form-data",
       'method' => 'post',
       'files' => true
       ]
   ) !!}
    @include('admin.category.form')
    <div class="form-group refresh-after-ajax-img2">
        {{ Form::label('image', 'Изображение', ['class' => 'col-sm-2 control-label']) }}
        <div class="col-sm-10">
            {!! Form::file('image', array('multiple'=>true, 'class'=>'btn btn-primary')) !!}
        </div>
    </div>
    <div class="box-footer">
        <button type="submit" class="btn btn-info pull-right">Сохранить</button>
    </div>
    <!-- /.box-footer -->
    {!! Form::close() !!}
@endsection