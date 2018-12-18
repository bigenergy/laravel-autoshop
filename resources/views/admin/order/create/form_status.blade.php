<h4>Статус заказа</h4>
<hr>
<div class="form-group row">
    {{ Form::label('status_id', 'Задать статус', ['class' => 'col-sm-2 col-form-label']) }}
    <div class="col-sm-10">
        {{ Form::select('status_id', $statuses->pluck('name', 'id'), null, array('class' => 'form-control', 'required')) }}
    </div>
</div>