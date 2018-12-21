@extends('layouts.app')
@section('title', 'Список типов продуктов')
@section('content')
    <div class="box-body table-responsive no-padding">
        <table class="table table-hover">
            <tr>
                <th>ID</th>
                <th>Название</th>
                <th>Действия</th>
            </tr>
            @forelse($productType as $type)
                <tr>
                    <td>{{ $type->id }}</td>
                    <td>{{ $type->name }}</td>
                    <td>@include('admin.product_type.list_actions')</td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" align="center"><h3><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Нет типов продуктов для отображения, <a href="{{ route('type.create') }}">создать новый</a> </h3></td>
                </tr>
            @endforelse
        </table>
    </div>
    <center>{{ $productType->links() }}</center>
@endsection



