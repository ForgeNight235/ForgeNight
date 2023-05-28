const saveBtnAttach = () => {
    document.querySelectorAll('input[name="quantity"]').forEach((input) => {
        const form = input.closest('.product__form');
        const btn = form.querySelector('.btn-save');

        // Добавляем слушатели для события "input" и кликов на кнопки "minus" и "plus"
        input.addEventListener('input', () => {
            btn.classList.add('visible');
        });

        form.querySelectorAll('.btn-minus, .btn-plus').forEach((btn) => {
            btn.addEventListener('click', () => {
                btn.closest('.product__form').querySelector('.btn-save').classList.add('visible');
            });
        });
    });
};

document.addEventListener('DOMContentLoaded', saveBtnAttach);
