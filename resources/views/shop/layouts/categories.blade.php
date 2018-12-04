<h6>Категории</h6>
<div class="list-group">
@forelse($categoryShowList as $category)
    <a href="/categories/{{ $category->slug }}" class="list-group-item {{ set_active(["categories/{$category->slug}"]) }}">{{ $category->name }}</a>
@empty
    <a href="#" class="list-group-item">Нет категорий</a>
@endforelse
</div>
<br>
<h6>Фильтр брендов</h6>
<div class="list-group">
    @forelse($categoryShowList as $category)
        <div class="list-group-item"><input type="checkbox" name="vehicle1" value="Bike"> Бренд</div>
    @empty
        <a href="#" class="list-group-item">Нет брендов</a>
    @endforelse
        <div class="list-group-item"><button type="button" class="btn btn-outline-success btn-block btn-sm">Применить фильтр</button></div>
</div>

