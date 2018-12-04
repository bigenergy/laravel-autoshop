<div class="list-group">
@forelse($categoryShowList as $category)
    <a href="/categories/{{ $category->slug }}" class="list-group-item {{ set_active(["categories/{$category->slug}"]) }}">{{ $category->name }}</a>
@empty
        <a href="#" class="list-group-item">Нет категорий</a>
@endforelse
</div>