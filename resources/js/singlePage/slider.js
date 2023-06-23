// Слайдер для страницы одного товара

const itemSlider = () => {
    var thumbsSwiper = new Swiper(".item__content__container .mySwiper", {
        loop: true,
        spaceBetween: 10,
        slidesPerView: 3,
        freeMode: true,
        watchSlidesProgress: true,
    });

    var gallerySwiper = new Swiper(".item__content__container .mySwiper2", {
        loop: true,
        spaceBetween: 10,
        navigation: {
            nextEl: ".item__content__container .swiper-button-next",
            prevEl: ".item__content__container .swiper-button-prev",
        },
        thumbs: {
            swiper: thumbsSwiper,
        },
        zoom: {
            enabled: true,
            maxRatio: 3,
        }
    });
};

const initItemSlider = () => {
    itemSlider();
};

document.addEventListener('DOMContentLoaded', initItemSlider);

