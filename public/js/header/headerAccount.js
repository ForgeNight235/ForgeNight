const headerAccountSetting = () => {
    const link = document.querySelector('.header__account-link');
    const menu = document.querySelector('.header__account-menu');
    let timeoutId;

    link.addEventListener('mouseenter', () => {
        clearTimeout(timeoutId);
        menu.style.display = 'block';
    });

    menu.addEventListener('mouseleave', () => {
        timeoutId = setTimeout(() => {
            menu.style.display = 'none';
            menu.style.right = '0';
            menu.style.textAlign = 'right';
        }, 1000); // добавляем задержку в 500 миллисекунд (полсекунды)
    });
}

const initHeaderAccountSetting = () => {
    headerAccountSetting();
}

document.addEventListener('DOMContentLoaded', initHeaderAccountSetting);
