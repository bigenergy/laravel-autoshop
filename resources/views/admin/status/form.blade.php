<div class="box-body">
    <div class="form-group">
        {{ Form::label('name', 'Название', ['class' => 'col-sm-2 control-label']) }}
        <div class="col-sm-10">
            {{ Form::text('name', null, ['class' => 'form-control', 'required']) }}
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('sort', 'Сортировка', ['class' => 'col-sm-2 control-label']) }}
        <div class="col-sm-10">
            {{ Form::number('sort', null, ['class' => 'form-control', 'required']) }}
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('color', 'Цвет бейджа', ['class' => 'col-sm-2 control-label']) }}
        <div class="col-sm-10">
            {{ Form::select('color', ['default' => 'Серый (default)', 'primary' => 'Синий (primary)', 'success' => 'Зеленый (success)', 'info' => 'Голубой (info)', 'warning' => 'Жёлтый (warning)', 'danger' => 'Красный'], null, array('class' => 'form-control')) }}
            <span class="label label-default">Default Label</span>
            <span class="label label-primary">Primary Label</span>
            <span class="label label-success">Success Label</span>
            <span class="label label-info">Info Label</span>
            <span class="label label-warning">Warning Label</span>
            <span class="label label-danger">Danger Label</span>

        </div>
    </div>

</div>
<!-- /.box-body -->