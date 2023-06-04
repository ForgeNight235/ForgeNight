const showAllProductsInOrder = () => {
    // Получаем все кнопки "показать все товары"
    var showItemsButtons = document.querySelectorAll('.order button');

    // Перебираем кнопки и добавляем обработчик события для каждой
    showItemsButtons.forEach(function (button) {
        // Назначаем обработчик события "клик"
        button.addEventListener('click', function () {
            // Находим соответствующий блок order-items
            var orderItems = this.parentNode.nextElementSibling;

            // Проверяем, отображен ли блок order-items
            if (orderItems.style.display === 'none') {
                // Если блок скрыт, то отображаем его
                orderItems.style.display = 'block';
            } else {
                // Если блок уже отображается, то скрываем его
                orderItems.style.display = 'none';
            }
        });
    });
}

const initShowAllProductsInOrder = () => {
    showAllProductsInOrder();
}

document.addEventListener('DOMContentLoaded', initShowAllProductsInOrder);
