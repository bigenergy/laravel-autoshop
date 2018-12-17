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
            <td><input type="number" class="quantity" name="quantity" id="quantity" min="1" value="{{ $item->quantity }}"></td>
            <td>{{ $item->price }} $</td>
            <td>{{ $item->total_price }} $</td>
            <td><button class="btn btn-danger btn-xs">Удалить из заказа</button></td>
        </tr>
    @empty
        <tr>
            <td rowspan="6">Заказ пуст</td>
        </tr>
    @endforelse
</table>
<button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-default">
    Добавить товары к заказу
</button>

<hr>
<h4>Итоговая стоимость заказа клиента: {{ $orderForEdit->orderItems->sum('total_price') }} $</h4>
