@foreach ($orderItems as $orderItem)
    <div class="col-md-12" id="{{"orderItem-".$orderItem->product_id}}">
        <div class="order-products__item">
            <div class="row">
                <div class="col-md-2">
                    @if(count($orderItem->product->images) > 0)
                        <a href="{{"/client/product/".$orderItem->product->slug}}">
                            <img style="max-width: 50px;"
                                 class="card-img-top"
                                 src="{{$orderItem->product->images[0]->fullUrl}}"
                                 alt="{{$orderItem->product->images[0]->name}}"
                            >
                        </a>
                    @endif
                </div>
                <div class="col-md-6">
                    <a href="{{"/client/product/".$orderItem->product->slug}}">{{ $orderItem->product->name }}</a>
                </div>
                <div class="col-md-1">{{ $orderItem->price }} руб</div>
                <div class="col-md-1"><b>{{ $orderItem->total_price }}</b></div>
                <div class="col-md-1">
                    <input
                            min="1"
                            data-id="{{ $orderItem->product_id }}"
                            data-price="{{ $orderItem->price }}"
                            type="number"
                            class="buy-number product-count form-control input-sm"
                            name="order_items[{{$orderItem->product_id}}]"
                            value="{{ $orderItem->quantity }}">
                </div>
                <div class="col-md-1">
                    <div class="btn btn-sm btn-danger orderItem-delete__button"
                         data-id="{{$orderItem->product_id}}"
                         data-name="{{$orderItem->product->name}}"
                    >Удалить</div>
                </div>
            </div>
        </div>
    </div>
@endforeach