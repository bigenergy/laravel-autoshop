<h4>Статус заказа <span class="label label-{{ $order->status->color }}">{{ $order->status->name }}</span></h4>
<hr>
<div class="form-group row">
    {{ Form::label(null, 'Текущий статус', ['class' => 'col-sm-2 col-form-label']) }}
    <div class="col-sm-10">
        <span class="form-control label label-{{ $order->status->color }}">{{ $order->status->name }}</span>
    </div>
</div>
<div class="form-group row">
    {{ Form::label('status_id', 'Изменить статус', ['class' => 'col-sm-2 col-form-label']) }}
    <div class="col-sm-10">
        {{ Form::select('status_id', $order->status->pluck('name', 'id'), null, array('class' => 'form-control', 'required')) }}
    </div>
</div>