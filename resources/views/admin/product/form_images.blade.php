<div class="refresh-after-ajax">
    <div class="form-group">
        {{ Form::label('images[]', 'Изображения', ['class' => 'col-sm-2 control-label']) }}
        <div class="col-sm-10">
            @if(count($productForEdit->images) > 0)
                    @foreach($productForEdit->images as $image)
                        <div class="col-sm-2">
                                    <div class="col-md-2 image-{{$image->id}}">
                                        <div class="btn btn-sm btn-danger image-delete__button" data-id="{{$image->id}}">Удалить <i class="fa fa-trash-o" aria-hidden="true"></i></div>
                                        <br><br>
                                        <img style="max-width: 100px;" src="{{ $image->fullUrl }}" alt="{{$image->name}}">
                                    </div>
                            </div>
                @endforeach
                </div>
            @else
                <div class="col-sm-6">
                    <div class="callout callout-info">
                        <p>У этого продукта нет изображений</p>
                    </div>
                </div>
            @endif
    </div>
    <div class="form-group">
        {{ Form::label('images[]', 'Загрузка изображений', ['class' => 'col-sm-2 control-label']) }}
        <div class="col-sm-10">
            @if(count($productForEdit->images) >= 5)
                <div class="col-sm-12">
                    <div class="callout callout-danger">
                        <p>Загрузка новых изображений недоступна, так как для этого продукта уже загружено максимальное количество доступных изображений</p>
                    </div>
                </div>
            @else
                {!! Form::file('images[]', ['multiple' => true, 'class' => 'btn btn-primary']) !!}
                <small>Мультивыбор на CTRL, максимальное количество изображений для продукта: <b>5</b></small>
            @endif
        </div>
    </div>
</div>