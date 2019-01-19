@forelse($products as $product)
    <div class="col-lg-4 col-md-6 mb-4">
        <div class="card h-100">
            <a href="{{ route('shop.product', ['productSlug' => $product->slug]) }}">
                <img class="card-img-top" src="{{ $product->thumbnail }}" height="140px" alt="{{ $product->name }}">
            </a>
            <div class="card-body">
                @if($product->isNew)
                    <span class="badge badge-danger">Новинка</span>
                @endif
                <h4 class="card-title">
                    <b>{{ $product->name }}</b>
                </h4>
                <h5>{{ $product->price }} $</h5>
                <p class="card-text">{{ substr($product->description, 0, 100) }}...</p>
            </div>

            <div class="card-footer">
                <a href="{{ route('shop.product', ['productSlug' => $product->slug]) }}" class="btn btn-outline-success btn-block btn-sm"><i class="fas fa-cart-arrow-down"></i> Купить</a>
            </div>
        </div>
    </div>
@empty
    <div class="container">
        <div class="alert alert-warning text-center" role="alert">
            <i class="far fa-frown fa-5x mb-3"></i><br>
            К сожалению, нет товаров, удовлетворяющих выбранным условиям.<br>
            Попробуйте изменить критерии поиска.
        </div>
    </div>
@endforelse