{{--<h5>Категории</h5>--}}
{{--<div class="list-group mb-4">--}}
    {{--@forelse($categories as $category)--}}
        {{--<button type="button" class="list-group-item list-group-item-action {{ set_active(["categories/{$category->slug}"]) }}"><i class="fas fa-car"></i> {{ $category->name }}</button>--}}
    {{--@empty--}}
        {{--<a href="#" class="list-group-item">Нет категорий</a>--}}
    {{--@endforelse--}}
{{--</div>--}}

{{--<h5>Тип товара</h5>--}}
{{--<div class="list-group mb-4">--}}
    {{--@forelse($productTypes as $type)--}}
        {{--<button type="button" class="list-group-item list-group-item-action"><i class="fas fa-car"></i> {{ $type->name }}</button>--}}
    {{--@empty--}}
        {{--<a href="#" class="list-group-item">Нет типов товаров</a>--}}
    {{--@endforelse--}}
{{--</div>--}}