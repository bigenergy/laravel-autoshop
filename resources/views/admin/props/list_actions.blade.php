{{ Form::open([
      'method' => 'DELETE',
      'route' => ['props.destroy', $prop->id],
  ]) }}

<a class="btn btn-success btn-xs" href="{{ route('props.edit', $prop->id) }}">Редактировать <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
</a>
<button type="submit" class="btn btn-danger btn-xs">Удалить <i class="fa fa-times"></i></button>

{{ Form::close() }}