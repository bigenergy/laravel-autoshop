<div class="col-md-6"><b>Количество товаров:</b></div>
<div class="col-md-6"><b id = "orderItem-quantity">{{ $order->productsCount ?? 0 }} ед.</b></div>
<div class="col-md-6"><b>Стоимость заказа:</b></div>
<div class="col-md-6"><b id = "orderItem-total_price">{{ $order->productsPrice ?? 0 }} $</b></div>