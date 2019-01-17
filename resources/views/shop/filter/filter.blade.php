<form id="filter_form" method="POST">
    <fieldset id="filter_form_lock">
    <h5><i class="fas fa-list-alt"></i> Каталог</h5>
    <div class="list-group mb-4">
        @forelse($productTypes as $type)
            <a href="{{ route('shop.category', $type->slug) }}"
               class="list-group-item list-group-item-action {{ set_active(["catalog/{$type->slug}"]) }}">
                <i class="fas fa-car"></i> {{ $type->name }}
            </a>
        @empty
            <a href="#" class="list-group-item">Нет типов товаров</a>
        @endforelse
    </div>
    <h5><i class="fas fa-dollar-sign"></i> Цена</h5>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label>От</label>
            <input type="number"
                   class="form-control"
                   name="min_price"
                   id="min_price" {{ !empty(Request::get('min_price')) ? "placeholder=".  Request::get('min_price'): "value=" . $products->min('price')}}>
        </div>
        <div class="form-group col-md-6 text-right">
            <label>До</label>
            <input type="number"
                   class="form-control"
                   name="max_price"
                   id="max_price" {{ !empty(Request::get('max_price')) ? "placeholder=".  Request::get('max_price'): "value=" . $products->max('price')}}>
        </div>
    </div>
    <h5><i class="fas fa-list-ol"></i> Категории</h5>
    <div class="list-group mb-4">
        <div class="">
            @forelse($categories as $category)
                <label class="form-check-label list-group-item list-group-item-action">
                    <input type="checkbox"
                           name="categories[]"
                           value="{{ $category->id }}"
                           {{ !empty(Request::get('categories')) && in_array($category->id, Request::get('categories')) ? "checked" : ""}}
                    >
                    {{ $category->name }}
                </label>
            @empty
                <a href="#" class="list-group-item">Нет категорий</a>
            @endforelse
        </div>
    </div>
    <h5><i class="fab fa-mailchimp"></i> Производитель</h5>
    <div class="list-group mb-4">
        <div class="">
        @forelse($brands as $brand)
            <label class="form-check-label list-group-item list-group-item-action">
                <input type="checkbox" name="brands[]"
                       class="filter_brand_{{ $brand->id }}"
                       value="{{ $brand->id }}"
                        {{ !empty(Request::get('brands')) && in_array($brand->id, Request::get('brands')) ? "checked" : ""}}
                >
                {{ $brand->name }}
            </label>
        @empty
            <a href="#" class="list-group-item">Нет производителей</a>
        @endforelse
        </div>
    </div>
    <input type="hidden" name="slug" id="slug" value="{{ $catalogType->slug }}">
    <input type="hidden" name="sort" id="sort" value="name">
    <input type="hidden"  name="sort_type" id="sort_type" value="asc">
    </fieldset>
</form>