// Для главного слайдера
var swiper = new Swiper(".mySwiper-main", {
    direction: "vertical", slidesPerView: 1, spaceBetween: 30, mousewheel: true, scrollbar: {
        el: ".swiper-scrollbar", hide: false, dragPosition: 1
    }, loop: true, navigation: {
        nextEl: ".swiper-button-next",
    },
});

// Слайдер новых предметов
var swiperNews = new Swiper(".mySwiper-news", {
    slidesPerView: 4, spaceBetween: 30, loop: true, navigation: {
        nextEl: ".swiper-button-next", prevEl: ".swiper-button-prev",
    }, breakpoints: {
        2560: {
            slidesPerView: 4,
        }, 1440: {
            slidesPerView: 4
        }, 1024: {
            slidesPerView: 3
        }, 768: {
            slidesPerView: 3,
        }, 425: {
            slidesPerView: 1,
        }, 375: {
            slidesPerView: 1,
        }, 320: {
            slidesPerView: 1,
        }
    }
});

// Слайдер для товаров со скидками
var swiperSales = new Swiper(".mySwiper-sales", {
    slidesPerView: 1, scrollbar: {
        el: ".swiper-scrollbar-sales", hide: false,
    },
});

// Бургер меню для шапки веб-сайта
const burger = document.querySelector('.burger');
const body = document.querySelector('body');
const menu = document.querySelector('.menu');
const closeMenuButton = document.querySelector('.close-menu');

// обработчик клика на бургер
burger.addEventListener('click', () => {
    burger.classList.toggle('active');
    body.classList.toggle('locked');
    menu.classList.toggle('active');
});

// обработчик клика на кнопку закрытия меню
closeMenuButton.addEventListener('click', () => {
    burger.classList.remove('active');
    menu.classList.remove('active');
});
