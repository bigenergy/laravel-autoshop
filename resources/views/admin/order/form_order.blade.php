<h4>Содержимое заказа</h4>
<hr>
<table class="table">
    <tr>
        <th>ID</th>
        <th>Товар</th>
        <th>Количество</th>
        <th>Стоимость</th>
        <th>Итоговая стоимость товара</th>
        <th>Действия</th>
    </tr>

    @forelse($orderForEdit->orderItems as $item)
        <tr>
            <td>{{ $item->id }}</td>
            <td><a href="{{ route('shop.main') }}/product/{{ $item->product->slug }}" target="_blank">{{ $item->product->name }}</a></td>
            <td>{{ $item->quantity }}</td>
            <td>{{ $item->price }} $</td>
            <td>{{ $item->total_price }} $</td>
            <td><button class="btn btn-danger btn-xs">Удалить из заказа</button></td>
        </tr>

    @empty
        <tr>Заказ пуст.</tr>
    @endforelse
</table>
<button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-default">
    Добавить к заказу
</button>

<hr>
<h4>Итоговая стоимость заказа клиента: {{ $orderForEdit->orderItems->sum('total_price') }} $</h4>
@include('admin.order.form_add_products')