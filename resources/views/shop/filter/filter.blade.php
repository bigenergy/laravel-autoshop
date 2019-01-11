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
    <button type="button" class="list-group-item list-group-item-action active">
        Cras justo odio
    </button>
    <button type="button" class="list-group-item list-group-item-action">Dapibus ac facilisis in</button>
    <button type="button" class="list-group-item list-group-item-action">Morbi leo risus</button>
    <button type="button" class="list-group-item list-group-item-action">Porta ac consectetur ac</button>
    <button type="button" class="list-group-item list-group-item-action" disabled>Vestibulum at eros</button>
</div>