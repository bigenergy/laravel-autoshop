@extends('layouts.app')
@section('title', 'Статические страницы')
@section('content')
    <div class="box-body table-responsive no-padding">
        <table class="table table-hover">
            <tr>
                <th>ID</th>
                <th>Название</th>
                <th>Slug (url страницы)</th>
                <th>Доступность</th>
                <th>Действия</th>
            </tr>
            @forelse($pages as $page)
                <tr>
                    <td>{{ $page->id }}</td>
                    <td>{{ $page->title }}</td>
                    <td>{{ $page->slug }}</td>
                    <td>
                        @if($page->isPrivate)
                            <span class="label label-danger">Приватная</span>
                        @else
                            <span class="label label-success">Публичная</span>
                        @endif
                    </td>
                    <td>@include('admin.pages.list_actions')</td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" align="center"><h3><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> В системе отсутсвуют статические страницы, <a href="{{ route('pages.create') }}">создать</a> </h3></td>
                </tr>
            @endforelse
        </table>
    </div>
    <center>{{ $pages->links() }}</center>
@endsection



