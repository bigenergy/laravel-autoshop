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
    <div class="">
        @forelse($categories as $category)
            <label class="form-check-label list-group-item list-group-item-action">
                <input type="checkbox" class="filter_category_{{ $category->id }}" value=""> {{ $category->name }}
            </label>
        @empty
            <a href="#" class="list-group-item">Нет категорий</a>
        @endforelse
    </div>
</div>


<h5>Производитель</h5>
<div class="list-group mb-4">
    <div class="">
    @forelse($brands as $brand)
        <label class="form-check-label list-group-item list-group-item-action">
            <input type="checkbox" name="filter_brand_{{ $brand->id }}" class="filter_brand_{{ $brand->id }}" value=""> {{ $brand->name }}
        </label>
    @empty
        <a href="#" class="list-group-item">Нет производителей</a>
    @endforelse
    </div>
</div>

<h5>Стоимость</h5>
<div class="form-row">
    <div class="form-group col-md-6">
        <label>От</label>
        <input type="number" class="form-control" id="inputEmail4" placeholder="$0">
    </div>
    <div class="form-group col-md-6 text-right">
        <label>До</label>
        <input type="number" class="form-control" placeholder="$1,0000">
    </div>
</div>