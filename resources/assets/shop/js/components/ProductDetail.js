let ProductDetail = (() => {
    const $buyButton = $('.buy-button');
    const $routeAddToCart = '/cart/add';

    let init = () => {
        listenClickBuyButton();
    };

    let listenClickBuyButton = () => {
        $buyButton.click(function () {
            let productData = {
                'product_id' : $(this).data('id'),
                'quantity': $(this).parent().find('.product-count').val()
            };

            $.post($routeAddToCart, productData).then(function (response) {
                console.log('OK');
                $('#cartModal').modal('show');
                $(".refresh-cart").load(window.location + " .refresh-cart");

                $buyButton.remove();
                $('<a href="/cart" class="buy-button btn btn-outline-success btn-block">В корзине <i class="fas fa-cart-arrow-down"></i></a>').appendTo('.card-footer' ).trigger( 'create' );

            });
        });
    };

    return {
        init: init
    };
})();

export default ProductDetail;