{{ Form::open([
      'method' => 'DELETE',
      'route' => ['pages.destroy', $page->id],
  ]) }}

<a class="btn btn-primary btn-xs" href="{{ route('page.view', $page->slug) }}" target="_blank">Просмотр</a>
<a class="btn btn-success btn-xs" href="{{ route('pages.edit', $page->id) }}">Редактировать <i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
<button type="submit" class="btn btn-danger btn-xs">Удалить <i class="fa fa-times"></i></button>

{{ Form::close() }}


