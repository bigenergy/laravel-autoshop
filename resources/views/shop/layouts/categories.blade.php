<div class="list-group">
@forelse($productTypes as $type)
    <a href="/catalog/{{ $type->slug }}" class="dropdown-item"><i class="fas fa-car"></i> {{ $type->name }}</a>
@empty
    <a href="#" class="list-group-item">Нет категорий</a>
@endforelse
</div>