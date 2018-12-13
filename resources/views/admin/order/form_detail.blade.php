<h4>Личные данные</h4>
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







