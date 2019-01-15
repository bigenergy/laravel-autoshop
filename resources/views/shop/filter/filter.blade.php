<h5>Каталог</h5>
<div class="list-group mb-4">
    @forelse($productTypes as $type)
        <a href="{{ route('shop.category', $type->slug) }}" class="list-group-item list-group-item-action {{ set_active(["catalog/{$type->slug}"]) }}"><i class="fas fa-car"></i> {{ $type->name }}</a>
    @empty
        <a href="#" class="list-group-item">Нет типов товаров</a>
    @endforelse
</div>

<h5>Категории</h5>
<div class="list-group mb-4">
    @forelse($categories as $category)
        <button type="button" class="list-group-item list-group-item-action {{ set_active(["categories/{$category->slug}"]) }}"><i class="fas fa-car"></i> {{ $category->name }}</button>
    @empty
        <a href="#" class="list-group-item">Нет категорий</a>
    @endforelse
</div>

<h5>Производитель</h5>
<div class="list-group mb-4">
    <div class="">
    @forelse($brands as $brand)
        <label class="form-check-label list-group-item list-group-item-action">
            <input type="checkbox" class="" value=""> {{ $brand->name }}
        </label>
    @empty
        <a href="#" class="list-group-item">Нет производителей</a>
    @endforelse
    </div>
</div>