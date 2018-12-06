window.$ = window.JQuery = require('jquery');

let ProductDetail = require('./components/ProductDetail').default;
let AjaxSetupHeaders = require('./components/AjaxSetupHeaders').default;

$(document).ready(() => {
    AjaxSetupHeaders.init();
    ProductDetail.init();
});
