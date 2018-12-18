let OrderDetail = (() => {
    const route = '/admin/orders/get_info';
    const orderItemTr = $('.order_items_tr');
    const productsListSelect = $('#products_list_select');
    const modalApplyButton = $('#apply_selected_products');
    const orderItemsContainer = $('#order_items_container');

    let init = () => {
        listenApplyProductsButton();
    };

    let listenApplyProductsButton = () => {
        modalApplyButton.click(function () {
            updateOrderInfo();
        });
    };

    let updateOrderInfo = () => {
        let productsData = $.merge(currentProducts(), selectedProducts()).toArray();

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

    return {
        init: init
    };
})();

export default OrderDetail;