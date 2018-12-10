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

                $(document).find('.card-' + productData.id).remove();
               // $('#cartModal').modal('show');
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

                // $('.card-' + productData.product_id).html(response.message['total_price']);
               // $(".card-" + productData.product_id).load(window.location + " .card" + productData.product_id);

                $(".refresh-after-ajax").refresh(window.location + " .refresh-after-ajax");




            });

        });
    };

    return {
        init: init
    };
})();

export default CartDetail;