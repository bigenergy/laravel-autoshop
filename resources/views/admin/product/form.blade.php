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
            {{ Form::select('disable', ['Активно', 'Неактивно'], null, ['class' => 'form-control']) }}
            <small>В зависимости от выбранной активности, продукт будет или не будет отображаться в каталоге</small>
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('sort', 'Номер сортировки', ['class' => 'col-sm-2 control-label']) }}
        <div class="col-sm-10">
            {{ Form::number('sort', null, ['class' => 'form-control', 'required']) }}
            <small>Уникальное значение, используется для сортировки в каталоге</small>
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('categories[]', 'Категории', ['class' => 'col-sm-2 control-label']) }}
        <div class="col-sm-10">
        {{ Form::select('categories[]', $categories->pluck('name', 'id'), null, ['class' => 'form-control', 'multiple', 'required']) }}
         <small>Мультивыбор по CTRL</small>
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('brand_id', 'Бренд', ['class' => 'col-sm-2 control-label']) }}
        <div class="col-sm-10">
            {{ Form::select('brand_id', $brands->pluck('name', 'id'), null, ['class' => 'form-control', 'required']) }}
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('price', 'Стоимость', ['class' => 'col-sm-2 control-label']) }}
        <div class="col-sm-10">
            {{ Form::number('price', null, ['class' => 'form-control', 'required']) }}
            <small>Стоимость продукта</small>
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('slug', 'Slug', ['class' => 'col-sm-2 control-label']) }}
        <div class="col-sm-10">
            {{ Form::text('slug', null, ['class' => 'form-control', 'required']) }}
            <small>Slug URL</small>
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('isNew', 'Новинка', ['class' => 'col-sm-2 control-label']) }}
        <div class="col-sm-10">
            {{ Form::select('isNew', ['Нет', 'Да'], null, ['class' => 'form-control']) }}
            <small>Новинки отображатся на главной странице сайта в специальном слайдере</small>
        </div>
    </div>
    <hr>
    <div class="form-group">
        {{ Form::label('type_id', 'Тип продукта', ['class' => 'col-sm-2 control-label']) }}
        <div class="col-sm-10">
            {{ Form::select('type_id', $productTypes->pluck('name', 'id')->prepend('Выберите тип продукта', ''), null, [
                'class' => 'form-control type_selector', 'required'
            ])}}
        </div>
    </div>
    <div id="attributes-container">
        @if(isset($productForEdit))
            @include('admin.product.attributes_list',['attributes' => $productForEdit->props])
        @endif
    </div>
    <hr>
</div>