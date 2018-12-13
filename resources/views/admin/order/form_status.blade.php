<h4>Статус заказа <span class="label label-{{ $orderForEdit->status->color }}">{{ $orderForEdit->status->name }}</span></h4>
<hr>
<div class="form-group row">
    {{ Form::label(null, 'Текущий статус', ['class' => 'col-sm-2 col-form-label']) }}
    <div class="col-sm-10">
        <span class="form-control label label-{{ $orderForEdit->status->color }}">{{ $orderForEdit->status->name }}</span>
    </div>
</div>
<div class="form-group row">
    {{ Form::label('status_id', 'Изменить статус', ['class' => 'col-sm-2 col-form-label']) }}
    <div class="col-sm-10">
        {{ Form::select('status_id', $orderForEdit->status->pluck('name', 'id'), null, array('class' => 'form-control', 'required')) }}
    </div>
</div>