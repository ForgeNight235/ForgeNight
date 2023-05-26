// Создание просмотра фотографий в отзывах, если они есть
// Мы урезаем количество фотографий до 3, далее пишется кнопка
// с показом оставшихся фотографий показываются оставшиеся фото

const reviewPhotos = () => {
    const gallery = document.querySelector('.gallery');
    const images = gallery.querySelectorAll('img');
    const maxImages = 3;

    if (images.length > maxImages) {
        for (let i = maxImages; i < images.length; i++) {
            images[i].style.display = 'none';
        }

        const hiddenImages = images.length - maxImages;
        const btn = document.createElement('button');
        btn.innerHTML = 'показать <br> ещё ' + hiddenImages;

        btn.addEventListener('click', function() {
            for (let i = maxImages; i < images.length; i++) {
                images[i].style.display = 'block';
            }

            btn.style.display = 'none';
        });

        gallery.appendChild(btn);
    }
}
const initReviewPhotos = () => {
    reviewPhotos();
}
document.addEventListener('DOMContentLoaded', initReviewPhotos);
