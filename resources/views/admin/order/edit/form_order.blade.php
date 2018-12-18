<h4>Содержимое заказа</h4>
<hr>

<div id="order_items_container">
    @include('admin.order.partials.order_items', ['orderItems' => $orderForEdit->orderItems])
</div>

<button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-default">
    Добавить товары к заказу
</button>

<hr>
<h4>Текущая стоимость заказа клиента: <b>{{ $orderForEdit->orderItems->sum('total_price') }}</b> $</h4>