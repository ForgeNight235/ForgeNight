// Слайдер новых предметов
const sliderNewsProducts = () => {
    const sliderCheck = document.querySelector(".mySwiper-newsProducts");
    // const sliderSaleCheck = document.querySelector(".mySwiper-newsProductsSale");

    if (sliderCheck)
    {
        var swiper = new Swiper(".mySwiper-newsProducts", {
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
                    slidesPerView: 2,
                }, 375: {
                    slidesPerView: 1,
                }, 320: {
                    slidesPerView: 1,
                }
            }
        })

// Слайдер новых предметов


//// Слайдер для товаров со скидками
//         var swiperSales = new Swiper(".mySwiper-sales", {
//             slidesPerView: 1, scrollbar: {
//                 el: ".swiper-scrollbar-sales", hide: false,
//             },
//         });
    }
    // if (sliderSaleCheck)
    // {
    //     var swiper = new Swiper(".mySwiper-newsProductsSale", {
    //         slidesPerView: 4, spaceBetween: 30, loop: true, navigation: {
    //             nextEl: ".swiper-button-next", prevEl: ".swiper-button-prev",
    //         }, breakpoints: {
    //             2560: {
    //                 slidesPerView: 4,
    //             }, 1440: {
    //                 slidesPerView: 4
    //             }, 1024: {
    //                 slidesPerView: 3
    //             }, 768: {
    //                 slidesPerView: 3,
    //             }, 425: {
    //                 slidesPerView: 2,
    //             }, 375: {
    //                 slidesPerView: 1,
    //             }, 320: {
    //                 slidesPerView: 1,
    //             }
    //         }
    //     })
    // }

}

const initSliderNewsProducts = () => {
    sliderNewsProducts();
}
document.addEventListener('DOMContentLoaded', initSliderNewsProducts);
