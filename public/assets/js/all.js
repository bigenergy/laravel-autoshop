window.$ = window.JQuery = require('jquery');

//let ProductDetail = require('./components/ProductDetail').default;
let AjaxSetupHeaders = require('./components/AjaxSetupHeaders').default;
//let CartDetail = require('./components/CartDetail').default;

$(document).ready(() => {
    AjaxSetupHeaders.init();
    //ProductDetail.init();
    //CartDetail.init();

    // if ($('#product-page').length) {
    //     ProductDetail.init();
    // }
});
