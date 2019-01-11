window.$ = window.JQuery = require('jquery');

require ('bootstrap');
import Swiper from 'swiper';

let ProductDetail = require('./components/ProductDetail').default;
let AjaxSetupHeaders = require('./components/AjaxSetupHeaders').default;
let CartDetail = require('./components/CartDetail').default;

$(document).ready(() => {
    AjaxSetupHeaders.init();
    ProductDetail.init();
    CartDetail.init();

    // if ($('#product-page').length) {
    //     ProductDetail.init();
    // }
});

var swiper = new Swiper('.swiper-container', {
    pagination: {
        el: '.swiper-pagination',
        dynamicBullets: true,
    },
});

var swipernew = new Swiper('#sliderNew', {
    slidesPerView: 3,
    spaceBetween: 30,
    loop: true,
    pagination: {
        el: '#sliderNewPagination',
        clickable: true,
    },
});
