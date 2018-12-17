<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Добавление товаров</h4>
            </div>
            {!! Form::open([
                  'route' => ['order.update.products', $orderForEdit->id],
                  'method' => 'POST',
              ]) !!}
            <div class="modal-body">
                <p>Добавить товары к заказу #{{ $orderForEdit->number }}</p>
                <hr>
                {{ Form::label('products[]', 'Выберите товары') }}
                {{ Form::select('products[]', $products->pluck('name', 'id'), null, array('class' => 'form-control', 'multiple', 'required')) }}
                <small>Мультивыбор на CTRL</small>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Отмена</button>
                <button type="submit" class="btn btn-primary">Добавить выбранные товары к заказу</button>
            </div>
            {!! Form::close() !!}
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->