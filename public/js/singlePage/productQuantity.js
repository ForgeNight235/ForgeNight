// Кнопка подсчета количества товара, где -, число и +

const productQuantity = () => {

    // const quantityInputs = document.querySelectorAll('input[name="quantity"]');
    //
    // quantityInputs.forEach((input) => {
    //     const minusButton = input.parentNode.querySelector('.btn-minus');
    //     const plusButton = input.parentNode.querySelector('.btn-plus');
    //
    //     minusButton.addEventListener('click', () => {
    //         let value = parseInt(input.value);
    //         value = isNaN(value) ? 1 : value;
    //         value = value < 2 ? 1 : value - 1;
    //         input.value = value;
    //     });
    //
    //     plusButton.addEventListener('click', () => {
    //         let value = parseInt(input.value);
    //         value = isNaN(value) ? 1 : value;
    //         value++;
    //         input.value = value;
    //     });
    // });
    $(document).ready(function() {
        $('.btn-minus').click(function() {
            var input = $(this).parent().find('input');
            var value = parseInt(input.val());
            if (value > 1) {
                input.val(value - 1);
            }
        });

        $('.btn-plus').click(function() {
            var input = $(this).parent().find('input');
            var value = parseInt(input.val());
            input.val(value + 1);
        });
    });
};

const initProductQuantity = () => {
    productQuantity();
};

document.addEventListener('DOMContentLoaded', initProductQuantity);
