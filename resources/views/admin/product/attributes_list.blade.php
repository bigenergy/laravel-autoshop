@foreach($attributes ?? [] as $attribute)
    <div class="form-group">
        {!! Form::label($attribute->id, $attribute->name, ['class' => 'col-sm-2 control-label']) !!}
        <div class="col-sm-10">
            {!! Form::text("attributes[{$attribute->id}][value]", $attribute->pivot->value ?? null, [
                'class' => 'form-control', 'required'
            ]) !!}
        </div>
    </div>
@endforeach
