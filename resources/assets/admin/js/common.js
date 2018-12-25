window.$ = window.JQuery = require('jquery');

let AjaxSetupHeaders = require('./components/AjaxSetupHeaders').default;
let OrderDetail = require('./components/OrderDetail').default;
let ProductType = require('./components/ProductType').default;


$(document).ready(() => {
    AjaxSetupHeaders.init();
    OrderDetail.init();
    ProductType.init();
});
