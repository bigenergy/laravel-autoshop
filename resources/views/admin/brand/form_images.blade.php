<div class="refresh-after-ajax">
    @if(count($brandForEdit->images) > 0)
        <div class="form-group">
            {{ Form::label('image', 'Текущее изображение', ['class' => 'col-sm-2 control-label']) }}
            <div class="col-sm-10">
                @foreach($brandForEdit->images as $image)
                    <div class="btn btn-sm btn-danger image-delete__button" data-id="{{$image->id}}">Удалить <i class="fa fa-trash-o" aria-hidden="true"></i></div>
                    <br><br>
                    <img style="max-width: 500px;" src="{{ $image->fullUrl }}" alt="{{$image->name}}">
                @endforeach
                <br>
                <small>Удалите текущее изображение, чтобы загрузить новое</small>
            </div>
        </div>
    @else
        <div class="form-group">
            {{ Form::label('image', 'Загрузить новое изображение', ['class' => 'col-sm-2 control-label']) }}
            <div class="col-sm-10">
                {!! Form::file('image', array('class'=>'btn btn-primary')) !!}
            </div>
        </div>
    @endif
</div>