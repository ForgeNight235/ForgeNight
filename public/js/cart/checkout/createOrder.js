const API_URL = window.location.origin;

console.log(API_URL);

const makeFormData = (formEl) => {
    const inputs = formEl.querySelectorAll('input');
    const textareas = formEl.querySelectorAll('textarea');

    const formData = new FormData();

    for (const input of inputs) {
        formData.append(input.name, input.value);
    }

    for (const textarea of textareas) {
        formData.append(textarea.name, textarea.value);
    }

    return formData;
}

const Request = {
    get(url, config={} ){
        return fetch(API_URL + url, {
            method: "GET",
            headers: {
                "Accept": "application/json",
                "Content-type": "application/json"
            },
            ...config
        });
    },

    post(url, body, config = {}) {
        return fetch(API_URL + url, {
            method: "POST",
            headers: {
                "Accept": "application/json"
            },
            body: body,
            ...config
        });
    }
};

const createOrder = (formEl) => {
    const button = formEl.querySelector('button');

    button.addEventListener('click', (e) => {
        e.preventDefault();

        Request.post('/cart/create/ordering', makeFormData(formEl))
            .then((r) => r.json())
            .then((data) => {
                if(data.status) {
                    return window.location.href = data.redirect_url;
                }
                alert(data.message);
            })
    });
}

const initOrder = () => {
    const checkoutFormElement = document.getElementById('js-checkout');

    if (checkoutFormElement) {
        createOrder(checkoutFormElement);
    }

    const cartElement = document.querySelector('.cart-section');

    if (cartElement) {
        cart(cartElement);
    }

}

document.addEventListener('DOMContentLoaded', initOrder);
