// Скрытие - открытие секций о доставке товаров, описание товара и отзывы
const itemConfig = () => {
    const itemInfo = document.querySelector('.accordion');
    const itemDescription = document.querySelector('.item-description');
    // const itemReviews = document.querySelector('.item-reviews');

    const itemInfoBtn = document.getElementById("product");
    const itemDescriptionBtn = document.getElementById("description");
    // const itemReviewsBtn = document.getElementById("reviews");

    itemDescriptionBtn.addEventListener('click', () => {
        itemInfo.classList.toggle('closed', true);
        // itemReviews.classList.toggle('closed', true);
        itemDescription.classList.toggle('closed', false);
    });

    itemInfoBtn.addEventListener('click', () => {
        itemInfo.classList.toggle('closed', false);
        itemDescription.classList.toggle('closed', true);
        // itemReviews.classList.toggle('closed', true);
    });

    // itemReviewsBtn.addEventListener('click', () => {
    //     itemReviews.classList.toggle('closed', false);
    //     itemDescription.classList.toggle('closed', true);
    //     itemInfo.classList.toggle('closed', true);
    // });
}

const initItemConfig = () => {
    itemConfig();
}

document.addEventListener('DOMContentLoaded', initItemConfig);
