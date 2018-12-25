let ProductType = (() => {
    const $typeSelector = $('.type_selector');
    const $routeAddToCart = '/getprops';

    let init = () => {
        listenClickBuyButton();
    };

    let listenClickBuyButton = () => {
        $typeSelector.click(function () {
            let productData = {
                'id': $(this).parent().find('.type_selector').val()
            };

            $.get($routeAddToCart, productData).then(function (response) {
                console.log(response);

                $(".box-body").append(response);
            });
        });
    };

    return {
        init: init
    };
})();

export default ProductType;