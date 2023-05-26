// Бургер меню для шапки веб-сайта

const burger = () => {
    // if (document.contains(document.querySelector('.burger')) && document.contains(document.querySelector('.close-menu'))) {
    const burger = document.querySelector('.burger');
    const body = document.querySelector('body');
    const menu = document.querySelector('.menu');
    const closeMenuButton = document.querySelector('.close-menu');

// обработчик клика на бургер
    burger.addEventListener('click', () => {
        burger.classList.toggle('active');
        body.classList.toggle('locked');
        menu.classList.toggle('active');
    });

// обработчик клика на кнопку закрытия меню
    closeMenuButton.addEventListener('click', () => {
        burger.classList.remove('active');
        menu.classList.remove('active');
        body.classList.remove('locked');
    });
}
const initBurger = () => {
    burger();
}
document.addEventListener('DOMContentLoaded', initBurger);
