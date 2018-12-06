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
            });
        });
    };

    return {
        init: init
    };
})();

export default ProductDetail;