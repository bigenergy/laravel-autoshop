<div class="box-body">
    <div class="form-group">
        {{ Form::label('name', 'Название', ['class' => 'col-sm-2 control-label']) }}
        <div class="col-sm-10">
            {{ Form::text('name', null, ['class' => 'form-control', 'required']) }}
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('description', 'Описание', ['class' => 'col-sm-2 control-label']) }}
        <div class="col-sm-10">
            {{ Form::textarea('description', null, ['class' => 'form-control', 'required', 'rows' => '3']) }}
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('disable', 'Активность', ['class' => 'col-sm-2 control-label']) }}
        <div class="col-sm-10">
            {{ Form::select('disable', ['Активно', 'Неактивно'], null, array('class' => 'form-control')) }}
            <small>В зависимости от выбранной активности, категория будет или не будет отображаться в каталоге</small>
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('sort', 'Номер сортировки', ['class' => 'col-sm-2 control-label']) }}
        <div class="col-sm-10">
            {{ Form::number('sort', null, ['class' => 'form-control', 'required']) }}
            <small>Уникальное значение, используется для сортировки в категории каталога</small>
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('slug', 'Slug', ['class' => 'col-sm-2 control-label']) }}
        <div class="col-sm-10">
            {{ Form::text('slug', null, ['class' => 'form-control', 'required']) }}
            <small>Slug URL</small>
        </div>
    </div>
</div>