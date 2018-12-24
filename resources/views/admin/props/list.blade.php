@extends('layouts.app')
@section('title', 'Список всех полей')
@section('content')
    <div class="box-body table-responsive no-padding">
        <table class="table table-hover">
            <tr>
                <th>ID</th>
                <th>Название</th>
                <th>Тип продукта</th>
                <th>Действия</th>
            </tr>

            @forelse($props as $prop)
                <tr>
                    <td>{{ $prop->id }}</td>
                    <td>{{ $prop->name }}</td>
                    <td>
                        @foreach($prop->product as $type)
                            <span>{{ $type->name }}</span>
                        @endforeach
                    </td>
                    <td>@include('admin.props.list_actions')</td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" align="center"><h3><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Нет типов продуктов для отображения, <a href="{{ route('type.create') }}">создать новый</a> </h3></td>
                </tr>
            @endforelse
        </table>
    </div>
    <center>{{ $props->links() }}</center>
@endsection



