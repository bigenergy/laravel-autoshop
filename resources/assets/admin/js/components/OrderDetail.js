let OrderDetail = (() => {
    const addButtonSelector = '.add-product';
    const path = '/admin/order/order_items';
    const delButtonSelector = '.orderItem-delete__button';

    let init = () => {
        listenAddProduct();
        listenUpdateProduct();
        listenDeleteProduct();
    };

    // Добавление

    let listenAddProduct = () => {
        $(document).on('click', addButtonSelector, function() {
            let selectedProductsIds = $("#product_selector").val();
            let SelectedProducts = [];

            $.each(selectedProductsIds, function (key, value) {
                let selectedItem = {
                    'product_id' : value,
                    'quantity': 1
                };

                SelectedProducts.push(selectedItem);
            });

            reloadOrderItems(SelectedProducts);

            selectedProductsIds.forEach(function(item) {
                $("#product_selector option[value=\'" + item + "\']").remove();
            });
        });
    };

    // Изменение

    let listenUpdateProduct = () => {

        $("#order_products_list").on('change', "input", function() {
            reloadOrderItems();
        });
    };

    // Удаление

    let listenDeleteProduct = () => {
        $(document).on('click', delButtonSelector, function() {
            let id = $(this).data('id');
            let name = $(this).data('name');

            $("#orderItem-"+id).remove();
            reloadOrderItems();

            $("#product_selector").append('<option value="' + id + '">' + name + '</option>');
        });
    };

    // Заполнить информацию о заказае
    let insertOrderInformation = function(data) {
        $("#order_information").html(data);
    };

    // Заполнить информацию о товарах по заказу
    let insertOrderItems = function(data) {
        $("#order_products_list").html(data);
    };

    // Обновить информацию о товарах
    let reloadOrderItems = function(selectedProducts = []) {

        let orderId = $("#my_order").data('id');
        $("#order_products_list").find('input').each(function() {
            let selectedItem = {
                'product_id' : $(this).data('id'),
                'quantity': $(this).val()
            };
            selectedProducts.push(selectedItem);
        });

        if(selectedProducts.length > 0) {
            $.post(path, {'products': selectedProducts, 'order_id': orderId}).then(function (response) {
                insertOrderItems(response.order_items);
                insertOrderInformation(response.order);

                return true;
            });
        }
    };

    return {
        init: init
    };
})();

export default OrderDetail;
