let CartDetail = (() => {
    const $deleteProductButton = $('.delete-button');
    const $routeDeleteProduct = '/cart/destroy';
    const $changeButtonSelector = '.buy-number';

    let init = () => {
        listenClickBuyButton();
        listenClickChangeButton();
    };

    let listenClickBuyButton = () => {
        $deleteProductButton.click(function () {
            let productData = {
                'id': $(this).data('id')
            };

            $.post($routeDeleteProduct, productData).then(function (response) {
                console.log('OK');
                $(".refresh-after-ajax").load(window.location + " .refresh-after-ajax");
                $(".refresh-price").load(window.location + " .refresh-price");

                $(document).find('.card-' + productData.id).remove();
            });
        });
    };

    let listenClickChangeButton = () => {
        $(document).on('change', $changeButtonSelector, function() {
            let productData = {
                'product_id': $(this).data('id'),
                'quantity': $(this).parent().find('.product-count').val()
            };

            $.post('/cart/edit', productData).then(function (response) {

                $(".refresh-price").load(window.location + " .refresh-price");

            });

        });
    };

    return {
        init: init
    };
})();

export default CartDetail;