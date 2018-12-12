{{ Form::open([
      'method' => 'DELETE',
      'route' => ['order.destroy', $order->id],
  ]) }}

<a class="btn btn-success btn-xs" href="{{ route('order.edit', $order->id) }}">Редактировать <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
</a>
<button type="submit" class="btn btn-danger btn-xs">Удалить <i class="fa fa-times"></i></button>

{{ Form::close() }}