@extends('layouts.app')
@section('title', 'Список всех брендов')
@section('content')
    <div class="box-body table-responsive no-padding">
        <table class="table table-hover">
            <tr>
                <th>ID</th>
                <th>Название</th>
                <th>Активность</th>
                <th>Действия</th>
            </tr>
            @forelse($brandShowList as $brand)
                <tr>
                    <td>{{ $brand->id }}</td>
                    <td>{{ $brand->name }}</td>
                    <td>@if(!$brand->disable)<span class="label label-success">Активно</span> @else <span class="label label-danger">Неактивно</span>@endif</td>
                    <td>@include('admin/brand/list_actions')</td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" align="center"><h3><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Нет брендов для отображения, <a href="{{ route('brand.create') }}">создать новый</a> </h3></td>
                </tr>
            @endforelse
        </table>
    </div>
    <center>{{ $brandShowList->links() }}</center>
@endsection



