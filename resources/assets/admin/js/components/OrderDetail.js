let OrderDetail = (() => {
    const route = '/admin/orders/get_info';
    const routeDestroy = '/admin/orders/destroy';
    const orderItemTr = $('.order_items_tr');
    const productsListSelect = $('#products_list_select');
    const modalApplyButton = $('#apply_selected_products');
    const orderItemsContainer = $('#order_items_container');
    const totalPriceUpdate = $(".total_price-ajax-update");
    const destroyOrderButton = $('.destroy_order');

    let init = () => {
        listenApplyProductsButton();
        totalPriceUpdate.hide();
    };

    let listenApplyProductsButton = () => {
        modalApplyButton.click(function () {
            updateOrderInfo();
        });
        destroyOrderButton.click(function () {
            destroyOrder();
        });
    };

    let updateOrderInfo = () => {
        let productsData = $.merge(currentProducts(), selectedProducts()).toArray();

        totalPriceUpdate.show();

        $.post(route, {
            products: productsData
        }).then(function (response) {
            orderItemsContainer.html(response.order_items);
        });
    };

    let currentProducts = () => {
        return orderItemTr.map(function () {
            let quantity = $(this).find('.quantity').val();
            let productId = $(this).find('.product_id').val();

            return {
                quantity: quantity,
                product_id: productId,
            };
        });
    };

    let selectedProducts = () => {
        return productsListSelect.find('option:selected').map(function () {
            return {
                quantity: 1,
                product_id: $(this).val()
            };
        });
    };

    let destroyOrder = () => {


        let productData = {
            'id' : destroyOrderButton.data('id'),
        };

        $.post(routeDestroy, productData).then(function (response) {
            console.log('OK');
            window.location.href = "/admin/order";
        });


    };

    return {
        init: init
    };
})();

export default OrderDetail;