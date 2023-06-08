const pageAnchor = () => {
    const addToCartLink = document.querySelectorAll('.addToCartLink');
    if (addToCartLink)
    {
        // Обрабатываем клик на ссылке добавления в корзину
        document.querySelectorAll('.addToCartLink').forEach(function (link) {
            link.addEventListener('click', function (e) {
                // Сохраняем текущую позицию скролла в localStorage
                var scrollPosition = window.pageYOffset || document.documentElement.scrollTop;
                localStorage.setItem('scrollPosition', scrollPosition);
            });
        });

        // Проверяем, есть ли сохраненная позиция скролла
        var savedScrollPosition = localStorage.getItem('scrollPosition');
        if (savedScrollPosition !== null) {
            // Прокручиваем к сохраненной позиции скролла
            window.scrollTo(0, savedScrollPosition);
            // Очищаем сохраненную позицию скролла после использования
            localStorage.removeItem('scrollPosition');
        }
    }

}
const initPageAnchor = () => {
    pageAnchor();
}
document.addEventListener('DOMContentLoaded', initPageAnchor);
