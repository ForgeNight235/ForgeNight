// Для главного слайдера
const mainSlider = () => {
    var swiper = new Swiper(".mySwiper-main", {
        direction: "vertical", slidesPerView: 1, spaceBetween: 30, mousewheel: true, scrollbar: {
            el: ".swiper-scrollbar", hide: false, dragPosition: 1
        }, loop: true, navigation: {
            nextEl: ".swiper-button-next",
        },
    });
}
const initMainSlider = () => {
    mainSlider();
}
document.addEventListener('DOMContentLoaded', initMainSlider);
