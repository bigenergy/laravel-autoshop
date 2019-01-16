window.$ = window.JQuery = require('jquery');

require ('bootstrap');
import Swiper from 'swiper';

let ProductDetail = require('./components/ProductDetail').default;
let AjaxSetupHeaders = require('./components/AjaxSetupHeaders').default;
let CartDetail = require('./components/CartDetail').default;
let FilterDetail = require('./components/FilterDetail').default;

$(document).ready(() => {
    AjaxSetupHeaders.init();
    ProductDetail.init();
    CartDetail.init();
    FilterDetail.init();

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

var galleryThumbs = new Swiper('.gallery-thumbs', {
    spaceBetween: 10,
    slidesPerView: 4,
    loop: true,
    freeMode: true,
    loopedSlides: 5, //looped slides should be the same
    watchSlidesVisibility: true,
    watchSlidesProgress: true,
});
var galleryTop = new Swiper('.gallery-top', {
    spaceBetween: 10,
    loop:true,
    loopedSlides: 5, //looped slides should be the same
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
    thumbs: {
        swiper: galleryThumbs,
    },
});