@extends('layouts.app')

@section('content')
    <div class="box-body table-responsive no-padding">
        <h2>Добро пожаловать, {{ Auth::user()->name }}!</h2>
        <br>
    </div>
@endsection