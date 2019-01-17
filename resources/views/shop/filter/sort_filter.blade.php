<fieldset id="sort_filter">
    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <label class="input-group-text" for="inputGroupSelect01">Сортировать по</label>
        </div>
        <select class="custom-select" id="sortingSelector">
            <option selected disabled>Выберите...</option>
            <option value="price"
                    data-type="asc"
                    {{ Request::get('sort') == 'price' && Request::get('sort_type') == 'asc' ? 'selected="selected"' : '' }}>По возрастанию цены</option>
            <option value="price"
                    data-type="desc"
                    {{ Request::get('sort') == 'price' && Request::get('sort_type') == 'desc' ? 'selected="selected"' : '' }}>По убыванию цены</option>
            <option value="name"
                    data-type="asc"
                    {{ Request::get('sort') == 'name' && Request::get('sort_type') == 'asc' ? 'selected="selected"' : '' }}>По наименованию</option>
            <option value="isNew"
                    data-type="desc"
                    {{ Request::get('sort') == 'isNew' && Request::get('sort_type') == 'desc' ? 'selected="selected"' : '' }}>По новинкам</option>
        </select>
    </div>

</fieldset>
<div class="text-center" id="sorting_loader" hidden>
    <span class="spinner-border spinner-border-sm text-success" role="status" aria-hidden="true"></span>
    Загрузка...
    <hr>
</div>