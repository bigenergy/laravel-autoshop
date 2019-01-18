<div id="filter_refresh">
    <form id="filter_form" method="POST">
        <fieldset id="filter_form_lock">
            <button class="btn btn-outline-primary btn-block"
                    type="button" data-toggle="collapse"
                    data-target="#collapseCatalog"
                    aria-expanded="false"
                    aria-controls="collapseCatalog">
                <i class="fas fa-list-alt"></i> Каталог
            </button>
            <br>
        <div class="list-group mb-5 collapse" id="collapseCatalog">
            @forelse($productTypes as $type)
                <a href="{{ route('shop.category', $type->slug) }}"
                   class="list-group-item list-group-item-action {{ set_active(["catalog/{$type->slug}"]) }} @if(!$type->product->count()) disabled @endif">
                    <i class="fas fa-car"></i> {{ $type->name }} <span class="badge badge-dark badge-pill">{{ $type->product->count() }}</span>
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
                               name="min_price"
                               min="{{ $products->min('price') }}"
                               max="{{ $products->max('price') }}"
                               id="min_price" {{ !empty(Request::get('min_price')) ? "placeholder=".  Request::get('min_price'): "placeholder=" . $products->min('price')}}>
                        <div class="input-group-prepend">
                            <span class="input-group-text">До</span>
                        </div>
                        <input type="number"
                               class="form-control"
                               name="max_price"
                               id="max_price" {{ !empty(Request::get('max_price')) ? "placeholder=".  Request::get('max_price'): "placeholder=" . $products->max('price')}}>
                    </div>
                </div>

                <div class="list-group list-group-flush">
                    <button type="button" class="btn btn-outline-primary btn-sm list-group-item text-center"><i class="fas fa-redo"></i> Сбросить фильтры</button>
                </div>


                <div class="card-header">
                    <i class="fas fa-list-ol"></i> Категории
                </div>
                <div class="list-group list-group-flush">
                    @forelse($categories as $category)
                        <label class="form-check-label list-group-item list-group-item-action">
                            <input type="checkbox"
                                   name="categories[]"
                                   value="{{ $category->id }}"
                                   {{ !empty(Request::get('categories')) && in_array($category->id, Request::get('categories')) ? "checked" : ""}}
                                   @if(!$category->products->count()) disabled @endif
                            >
                            {{ $category->name }} ({{ $category->products->count() }})
                        </label>
                    @empty
                        <a href="#" class="list-group-item">Нет категорий</a>
                    @endforelse
                </div>

                <div class="card-header">
                    <i class="fab fa-mailchimp"></i> Производитель
                </div>
                <div class="list-group list-group-flush">
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
        <input type="hidden" name="sort_type" id="sort_type" value="asc">
        </fieldset>
    </form>
</div>