<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Добавление товаров</h4>
            </div>

            <div class="modal-body">
                <p>Добавить товары к заказу #{{ $order->number }}</p>
                <hr>
                <div class="detail-product-orderItem__container">
                    {{ Form::label('products[]', 'Добавьте продукты к заказу') }}
                    {{ Form::select('products[]', $products, null, ["class" => "form-control", "id" => "product_selector", "multiple"]) }}
                    <medium class="text-danger">{{ $errors->first('products') }}</medium>
                </div>
                <small>Мультивыбор на CTRL</small>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Отмена</button>
                <button type="submit" class="btn btn-primary add-product">Добавить выбранные товары к заказу</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->