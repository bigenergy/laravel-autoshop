window.$ = window.JQuery = require('jquery');

let AjaxSetupHeaders = require('./components/AjaxSetupHeaders').default;
let OrderDetail = require('./components/OrderDetail').default;


$(document).ready(() => {
    AjaxSetupHeaders.init();
    OrderDetail.init();
});
