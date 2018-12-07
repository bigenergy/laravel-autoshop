$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});


$(document).on('click', '.buy-button', function() {

    let productId = $(this).data('id');
    let quantity = $(this).parent().find('.product-count').val();

    let productData = {
        'product_id' : productId,
        'quantity': quantity
    };

    $.ajax({
        url: '/cart/add',
        type: "POST",
        data: productData,
        success: function(response) {
            console.log(response);

            $.alert({
                icon: 'fas fa-check-double',
                type: 'success',
                title: 'Выполнено',
                content: 'Товар добавлен в вашу корзину!',
                theme: 'supervan',
                autoClose: 'thx|2000',
                buttons: {
                    thx: {
                        text: 'ОК',
                    }
                }


            });
        },
    });

});