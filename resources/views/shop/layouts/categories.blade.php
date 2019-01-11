<div class="list-group">
@forelse($categoryShowList as $category)
    <a href="/categories/{{ $category->slug }}" class="dropdown-item {{ set_active(["categories/{$category->slug}"]) }}"><i class="fas fa-car"></i> {{ $category->name }} <span class="badge badge-pill badge-info">{{ $category->products->count() }}</span></a>
@empty
    <a href="#" class="list-group-item">Нет категорий</a>
@endforelse
</div>