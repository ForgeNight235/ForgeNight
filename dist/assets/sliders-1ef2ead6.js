const e=()=>{document.querySelector(".mySwiper-newsProducts")&&new Swiper(".mySwiper-newsProducts",{slidesPerView:4,spaceBetween:30,loop:!0,navigation:{nextEl:".swiper-button-next",prevEl:".swiper-button-prev"},breakpoints:{2560:{slidesPerView:4},1440:{slidesPerView:4},1024:{slidesPerView:3},768:{slidesPerView:3},425:{slidesPerView:2},375:{slidesPerView:1},320:{slidesPerView:1}}})},s=()=>{e()};document.addEventListener("DOMContentLoaded",s);