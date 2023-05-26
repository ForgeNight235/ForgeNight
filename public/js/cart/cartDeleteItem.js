const cart = (container) => {
    const items = container.querySelectorAll('.item');

    const removeCartItem = (e, item) => {
        e.preventDefault();

        const isAccepted = confirm('Вы действительно хотите удалить товар из корзины?');

        if(!isAccepted) return false;

        // Без перезагрузки страницы (ассинхронно)
        fetch(e.currentTarget.href).then((r) => {
            if(r.ok) {
                return item.remove();
            }

            alert('Ошибка при удалении товара из корзины')
        });

        // window.location.href = e.currentTarget.href;
    }

    items.forEach((item) => {
        const removeButton = item.querySelector('a.button');

        removeButton.addEventListener('click', (e) => removeCartItem(e, item));
    })

}
