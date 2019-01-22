<div id="filter_refresh">
    <form id="filter_form" method="POST">
        <fieldset id="filter_form_lock">
            <button class="btn btn-outline-primary btn-block"
                    type="button" data-toggle="collapse"
                    data-target="#collapseCatalog"
                    aria-expanded="false"
                    aria-controls="collapseCatalog">
                <i class="fas fa-list-alt"></i> Каталог {{ '/ ' . $catalogType->name ?? '' }}
            </button>
            <br>
        <div class="list-group mb-4 collapse" id="collapseCatalog">
            @forelse($productTypes as $type)
                <a href="{{ route('shop.category', $type->slug) }}"
                   class="list-group-item list-group-item-action {{ set_active(["catalog/{$type->slug}"]) }}">
                    <i class="fas fa-car"></i> {{ $type->name }}
                </a>
            @empty
                <a href="#" class="list-group-item">Нет типов товаров</a>
            @endforelse
        </div>
            <div class="card" >
                <div class="card-header">
                   <i class="fas fa-dollar-sign"></i> Цена
                </div>
                <div class="form-row container mb-3 mt-3 ">
                    <div class="input-group ">
                        <div class="input-group-prepend">
                            <span class="input-group-text">От</span>
                        </div>
                        <input type="number"
                               class="form-control"
                               name="price[from]"
                               min="{{ $products->min('price') }}"
                               max="{{ $products->max('price') }}"
                               id="price[from]" {{ !empty(Request::get('price[from]')) ? "placeholder=".  Request::get('price[from]'): "value=" . $products->min('price')}}>
                        <div class="input-group-prepend">
                            <span class="input-group-text">До</span>
                        </div>
                        <input type="number"
                               class="form-control"
                               name="price[to]"
                               id="price[to]" {{ !empty(Request::get('price[to]')) ? "placeholder=".  Request::get('price[to]'): "value=" . $products->max('price')}}>
                    </div>
                </div>

                <div class="list-group list-group-flush">
                    <button type="button" class="btn btn-outline-primary btn-sm list-group-item text-center"><i class="fas fa-redo"></i> Сбросить фильтры (dev)</button>
                </div>


                <div class="card-header">
                    <i class="fas fa-list-ol"></i> Категории
                </div>
                <div class="list-group list-group-flush">
                    @forelse($categories as $category)
                        @if($category->products_count)
                            <label class="form-check-label list-group-item list-group-item-action">
                                <input type="checkbox"
                                       name="category[]"
                                       value="{{ $category->id }}"
                                       {{ !empty(Request::get('category')) && in_array($category->id, Request::get('category')) ? "checked" : ""}}
                                >
                                {{ $category->name }} ({{ $category->products_count }})
                            </label>
                        @endif
                    @empty
                        <a href="#" class="list-group-item">Нет категорий</a>
                    @endforelse
                </div>

                <div class="card-header">
                    <i class="fas fa-archive"></i> Производитель
                </div>
                <div class="list-group list-group-flush">
                    @forelse($brands as $brand)
                        <label class="form-check-label list-group-item list-group-item-action">
                            <input type="checkbox" name="brand[]"
                                   class="filter_brand_{{ $brand->id }}"
                                   value="{{ $brand->id }}"
                                    {{ !empty(Request::get('brand')) && in_array($brand->id, Request::get('brand')) ? "checked" : ""}}
                            >
                            {{ $brand->name }} ({{ $brand->product_count }})
                        </label>
                    @empty
                        <li class="list-group-item text-center">Нет производителей</li>
                    @endforelse
                </div>

                @foreach($props as $prop)
                    <div class="card-header">
                        <i class="fas fa-filter"></i> {{ $prop->name }}
                    </div>

                    @foreach($prop->propValue->unique('value') as $value)
                        <div class="list-group list-group-flush">
                            <label class="form-check-label list-group-item list-group-item-action">
                                <input type="checkbox" name="prop[{{ $value->id }}][]"
                                       value="{{ $value->value }}"
                                        {{ !empty(Request::get('prop')) && in_array($value->value, Request::get('prop')) ? "checked" : ""}}                                >
                                {{ $value->value }}
                            </label>
                        </div>
                    @endforeach
                @endforeach


            </div>

        <input type="hidden" name="sort[column]" id="sort_column" value="name">
        <input type="hidden" name="sort[order]" id="sort_order" value="asc">
        <input type="hidden" name="slug" id="slug" value="{{ $catalogType->slug }}">

        </fieldset>
    </form>
</div>