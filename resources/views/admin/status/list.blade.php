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
                    <td><span class="label label-{{ $status->color }}">{{ $status->name }}</span></td>
                    <td>{{ $status->sort }}</td>
                    <td>@include('admin.status.list_actions')</td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" align="center"><h3><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Нет статусов для отображения, <a href="{{ route('status.create') }}">создать новый</a> </h3></td>
                </tr>
            @endforelse
        </table>
    </div>
    <center>{{ $statusShowList->links() }}</center>
@endsection



