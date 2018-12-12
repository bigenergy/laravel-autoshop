@extends('layouts.app')
@section('title', 'Список всех статусов')
@section('content')
    <div class="box-body table-responsive no-padding">
        <table class="table table-hover">
            <tr>
                <th>ID</th>
                <th>Название</th>
                <th>Сортировка</th>
                <th>Действия</th>
            </tr>
            @forelse($statusShowList as $status)
                <tr>
                    <td>{{ $status->id }}</td>
                    <td>{{ $status->name }}</td>
                    <td>{{ $status->sort }}</td>
                    <td>@include('admin.status.list_actions')</td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" align="center"><h3><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Нет брендов для отображения, <a href="{{ route('brand.create') }}">создать новый</a> </h3></td>
                </tr>
            @endforelse
        </table>
    </div>
    <center>{{ $statusShowList->links() }}</center>
@endsection



