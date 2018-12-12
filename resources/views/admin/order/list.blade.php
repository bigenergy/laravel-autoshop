@extends('layouts.app')
@section('title', 'Список заказов')
@section('content')
    <div class="box-body table-responsive no-padding">
        <table class="table table-hover">
            <tr>
                <th>ID</th>
                <th>Номер заказа</th>
                <th>Статус</th>
                <th>ФИО</th>
                <th>Номер телефона</th>
                <th>Действия</th>
            </tr>
            @forelse($orderShowList as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->number }}</td>
                    <td><span class="label label-primary">{{ $order->status->name }}</span></td>
                    <td>{{ $order->name }} {{ $order->surname }} {{ $order->patronymic }}</td>
                    <td>{{ $order->tel }}</td>
                    <td>@include('admin.order.list_actions')</td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" align="center"><h3><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Нет заказов </h3></td>
                </tr>
            @endforelse
        </table>
    </div>
    <center>{{ $orderShowList->links() }}</center>
@endsection



