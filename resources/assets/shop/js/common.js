window.$ = window.JQuery = require('jquery');

require ('bootstrap');


let ProductDetail = require('./components/ProductDetail').default;
let AjaxSetupHeaders = require('./components/AjaxSetupHeaders').default;

$(document).ready(() => {
    AjaxSetupHeaders.init();
    ProductDetail.init();

    // if ($('#product-page').length) {
    //     ProductDetail.init();
    // }
});
