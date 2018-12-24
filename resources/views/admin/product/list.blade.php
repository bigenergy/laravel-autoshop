@extends('layouts.app')
@section('title', 'Список всех продуктов')
@section('content')
    <div class="box-body table-responsive no-padding">
        <table class="table table-hover">
            <tr>
                <th>ID</th>
                <th>Название</th>
                <th>Категория</th>
                <th>Бренд</th>
                <th>Тип</th>
                <th>Сортировка</th>
                <th>Активность</th>
                <th>Действия</th>
            </tr>
            @forelse($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->name }}</td>
                    <td>
                        @foreach($product->categories as $category)
                            <span>{{ $category->name }}</span>@if(!$loop->last),@endif
                        @endforeach
                    </td>
                    <td>
                        {{ $product->brand->name }}
                    </td>
                    <td>
                       {{ $product->productType->name }}
                    </td>
                    <td>{{ $product->sort }}</td>
                    <td>@if(!$product->disable)<span class="label label-success">Активно</span> @else <span class="label label-danger">Неактивно</span>@endif</td>
                    <td>@include('admin.product.list_actions')</td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" align="center"><h3><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Нет продуктов для отображения, <a href="{{ route('product.create') }}">создать новый</a> </h3></td>
                </tr>
            @endforelse

        </table>

    </div>
    <center>{{ $products->links() }}</center>
@endsection
