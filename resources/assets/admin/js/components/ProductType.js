let ProductType = (() => {
    const $typeSelect = $('.type_selector');
    const attributesContainer = $('#attributes-container');

    let init = () => {
        listenTypeChanged();
    };

    let listenTypeChanged = () => {
        $typeSelect.change(function () {
            let productTypeId = $(this).val();

            $.get(`/admin/type/${productTypeId}/attributes`).then(function (response) {
                attributesContainer.html(response);
            });
        });
    };

    return {
        init: init
    };
})();

export default ProductType;