// Слайдер новых предметов
const sliderNews = () => {
    const sliderCheck = document.querySelector(".mySwiper-news");

    if (sliderCheck)
    {
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

// Слайдер новых предметов
        var swipeRecommend = new Swiper(".mySwiper-recommend", {
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
    }

}

const initSliderNews = () => {
    sliderNews();
}
document.addEventListener('DOMContentLoaded', initSliderNews);





