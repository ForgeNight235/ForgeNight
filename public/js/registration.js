const registration = () => {
    const form = document.querySelector('#registration');
    const checkbox = document.querySelector('#privacy_policy');

    form.addEventListener('submit', (event) => {
        if (!checkbox.checked) {
            event.preventDefault();
            alert('Пожалуйста, примите правила конфиденциальности');
        }
    });
}

const init = () => {
    registration();
}
document.addEventListener('DOMContentLoaded', init);
