let CartDetail = (() => {
    const $deleteProductButton = $('.delete-button');
    const $routeDeleteProduct = '/cart/destroy';

    let init = () => {
        listenClickBuyButton();
    };

    let listenClickBuyButton = () => {
        $deleteProductButton.click(function () {
            let productData = {
                'id': $(this).data('id'),
                //'quantity': $(this).parent().find('.product-count').val()
            };

            $.post($routeDeleteProduct, productData).then(function (response) {
                console.log('OK');
                $('#cartModal').modal('show');
            });
        });
    };

    return {
        init: init
    };
})();

export default CartDetail;