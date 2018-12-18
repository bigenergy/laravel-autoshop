@if($orderItems->count())
    <table class="table">
        <tr>
            <th>ID</th>
            <th>Товар</th>
            <th>Количество</th>
            <th>Стоимость за ед.</th>
            <th>Итоговая стоимость товара</th>
            <th>Действия</th>
        </tr>
        @foreach($orderItems as $item)
            <tr class="order_items_tr">
                <td>{{ $item->product->id }}</td>
                <td>
                    <a href="{{ route('shop.main') }}/product/{{ $item->product->slug }}" target="_blank">
                        {{ $item->product->name }}
                    </a>
                </td>
                <td>
                    <input type="hidden" class="product_id" value="{{ $item->product->id }}">
                    <input type="number" class="quantity" name="quantity" min="1" value="{{ $item->quantity }}">
                </td>
                <td>{{ $item->price }} $</td>
                <td>{{ $item->total_price }} $</td>
                <td><button class="btn btn-danger btn-xs">Удалить из заказа</button></td>
            </tr>
        @endforeach
    </table>
@else
    <tr>
        <td rowspan="6">Заказ пуст</td>
    </tr>
@endif
<h4 class="total_price-ajax-update">Новая стоимость заказа клиента: <b>{{ $orderItems->sum('total_price') }}</b> $</h4>

