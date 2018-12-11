<form>
    <h5><i class="fas fa-user-secret"></i> Личные данные</h5>
    <hr>
    <div class="form-group row">
        {{ Form::label('name', 'Имя', ['class' => 'col-sm-2 col-form-label']) }}
        <div class="col-sm-10">
            {{ Form::text('name', null, ['class' => 'form-control', 'required']) }}
        </div>
    </div>
    <div class="form-group row">
        {{ Form::label('surname', 'Фамилия', ['class' => 'col-sm-2 col-form-label']) }}
        <div class="col-sm-10">
            {{ Form::text('surname', null, ['class' => 'form-control', 'required']) }}
        </div>
    </div>
    <div class="form-group row">
        {{ Form::label('patronymic', 'Отчество', ['class' => 'col-sm-2 col-form-label']) }}
        <div class="col-sm-10">
            {{ Form::text('patronymic', null, ['class' => 'form-control', 'required']) }}
        </div>
    </div>
    <div class="form-group row">
        {{ Form::label('email', 'Email', ['class' => 'col-sm-2 col-form-label']) }}
        <div class="col-sm-10">
            {{ Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'На него будет прислана вся информация о заказе', 'required']) }}
        </div>
    </div>
    <div class="form-group row">
        {{ Form::label('tel', 'Телефон', ['class' => 'col-sm-2 col-form-label']) }}
        <div class="col-sm-10">
            {{ Form::text('tel', null, ['class' => 'form-control', 'placeholder' => '+7', 'required']) }}
        </div>
    </div>
    <h5><i class="fas fa-truck"></i> Доставка</h5>
    <hr>
    <div class="form-row">
        <div class="form-group col-md-6">
            {{ Form::label('country', 'Страна') }}
            {{ Form::text('country', null, ['class' => 'form-control', 'placeholder' => 'Россия', 'required']) }}
        </div>
        <div class="form-group col-md-6">
            {{ Form::label('city', 'Город или населенный пункт') }}
            {{ Form::text('city', null, ['class' => 'form-control', 'placeholder' => 'Москва', 'required']) }}
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            {{ Form::label('street', 'Улица') }}
            {{ Form::text('street', null, ['class' => 'form-control', 'placeholder' => 'Московская', 'required']) }}
        </div>
        <div class="form-group col-md-4">
            {{ Form::label('house', 'Дом') }}
            {{ Form::text('house', null, ['class' => 'form-control', 'placeholder' => '1', 'required']) }}
        </div>
        <div class="form-group col-md-2">
            {{ Form::label('apartment', 'Квартира') }}
            {{ Form::text('apartment', null, ['class' => 'form-control', 'placeholder' => '1', 'required']) }}
        </div>
    </div>

</form>