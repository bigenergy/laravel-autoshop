<div class="box-body">
    <div class="form-group">
        {{ Form::label('name', 'Название', ['class' => 'col-sm-2 control-label']) }}
        <div class="col-sm-10">
            {{ Form::text('name', null, ['class' => 'form-control', 'required']) }}
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('product_type_id', 'Тип продукта', ['class' => 'col-sm-2 control-label']) }}
        <div class="col-sm-10">
            {{ Form::select('product_type_id', $type->pluck('name', 'id'), null, array('class' => 'form-control', 'required')) }}
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('is_enabled', 'Доступность', ['class' => 'col-sm-2 control-label']) }}
        <div class="col-sm-10">
            {{ Form::select('is_enabled', ['Включено', 'Выключено'], null, ['class' => 'form-control']) }}
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('sort', 'Сортировка', ['class' => 'col-sm-2 control-label']) }}
        <div class="col-sm-10">
            {{ Form::text('sort', null, ['class' => 'form-control', 'required']) }}
        </div>
    </div>
</div>
<!-- /.box-body -->