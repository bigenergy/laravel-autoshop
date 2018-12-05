<h6>Фильтр брендов</h6>
<div class="list-group">
    @forelse($brands as $brand)
        <div class="list-group-item"><input type="checkbox" name="vehicle1" value="Bike"> Бренд</div>
    @empty
        <a href="#" class="list-group-item">Нет брендов</a>
    @endforelse
    <div class="list-group-item"><button type="button" class="btn btn-outline-success btn-block btn-sm">Применить фильтр</button></div>
</div>