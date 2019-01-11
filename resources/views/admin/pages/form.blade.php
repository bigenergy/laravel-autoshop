<div class="box-body">
    <div class="form-group">
        {{ Form::label('title', 'Заголовок', ['class' => 'col-sm-2 control-label']) }}
        <div class="col-sm-10">
            {{ Form::text('title', null, ['class' => 'form-control', 'required']) }}
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('slug', 'Slug (url страницы)', ['class' => 'col-sm-2 control-label']) }}
        <div class="col-sm-10">
            {{ Form::text('slug', null, ['class' => 'form-control', 'required']) }}
            <small>Slug URL - часть ссылки после {{ env('APP_URL') }}/<b>Slug_URL</b></small>
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('isPrivate', 'Приватность', ['class' => 'col-sm-2 control-label']) }}
        <div class="col-sm-10">
            {{ Form::select('isPrivate', ['Публичная страница', 'Приватная страница'], null, ['class' => 'form-control']) }}
            <small>Публичные страницы доступны для всех пользователей, сразу же после создания</small>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-12">
            <hr>
            {{ Form::textarea('content', null, ['id' => 'content', 'class' => 'form-control', 'required', 'rows' => '3']) }}
        </div>
    </div>

</div>

<script src="https://cdn.ckeditor.com/ckeditor5/11.2.0/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create( document.querySelector( '#content' ) )
        .catch( error => {
            console.error( error );
        } );
</script>