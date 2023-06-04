const registrationRule = () => {
    const form = document.querySelector('#registration');
    const checkbox = document.querySelector('#privacy_policy');

    form.addEventListener('submit', (event) => {
        if (!checkbox.checked) {
            event.preventDefault();
            alert('Пожалуйста, примите правила конфиденциальности');
        }
    });
}

const initRegistrationRule = () => {
    registrationRule();
}
document.addEventListener('DOMContentLoaded', initRegistrationRule);
