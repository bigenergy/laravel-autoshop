{{ Form::open([
      'method' => 'DELETE',
      'route' => ['status.destroy', $status->id],
  ]) }}

<a class="btn btn-success btn-xs" href="{{ route('status.edit', $status->id) }}">Редактировать <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
</a>
<button type="submit" class="btn btn-danger btn-xs">Удалить <i class="fa fa-times"></i></button>

{{ Form::close() }}