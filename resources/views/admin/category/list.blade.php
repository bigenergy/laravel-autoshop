@extends('layouts.app')
@section('title', 'Список всех категорий')
@section('content')
    <div class="box-body table-responsive no-padding">
        <table class="table table-hover">
            <tr>
                <th>ID</th>
                <th>Название</th>
                <th>Сортировка</th>
                <th>Активность</th>
                <th>Действия</th>
            </tr>
            @forelse($categoryShowList as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->sort }}</td>
                    <td>@if(!$category->disable)<span class="label label-success">Активно</span> @else <span class="label label-danger">Неактивно</span>@endif</td>
                    <td>@include('admin.category.list_actions')</td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" align="center"><h3><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Нет категорий для отображения, <a href="{{ route('category.create') }}">создать новую</a> </h3></td>
                </tr>
            @endforelse

        </table>

    </div>

@endsection