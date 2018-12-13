<h4>Доставка</h4>
<hr>

<div class="form-group row">
    {{ Form::label('country', 'Страна', ['class' => 'col-sm-2 col-form-label']) }}
    <div class="col-sm-10">
        {{ Form::text('country', null, ['class' => 'form-control', 'placeholder' => 'Россия', 'required']) }}
    </div>
</div>
<div class="form-group row">
    {{ Form::label('city', 'Город или населенный пункт', ['class' => 'col-sm-2 col-form-label']) }}
    <div class="col-sm-10">
        {{ Form::text('city', null, ['class' => 'form-control', 'placeholder' => 'Москва', 'required']) }}
    </div>
</div>


<div class="form-group row">
    {{ Form::label('street', 'Улица', ['class' => 'col-sm-2 col-form-label']) }}
    <div class="col-sm-10">
        {{ Form::text('street', null, ['class' => 'form-control', 'placeholder' => 'Московская', 'required']) }}
    </div>
</div>

<div class="form-group row">
    {{ Form::label('house', 'Дом', ['class' => 'col-sm-2 col-form-label']) }}
    <div class="col-sm-10">
        {{ Form::text('house', null, ['class' => 'form-control', 'placeholder' => '1', 'required']) }}
    </div>
</div>

<div class="form-group row">
    {{ Form::label('apartment', 'Квартира', ['class' => 'col-sm-2 col-form-label']) }}
    <div class="col-sm-10">
        {{ Form::text('apartment', null, ['class' => 'form-control', 'placeholder' => '1', 'required']) }}
    </div>
</div>