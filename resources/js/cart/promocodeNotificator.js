const promocodeNotificator = () => {

    const popoverTriggerList = document.querySelectorAll('[data-bs-toggle="popover"]')
    const popoverList = [...popoverTriggerList].map(popoverTriggerEl => new bootstrap.Popover(popoverTriggerEl))

}

const initPromocodeNotificator = () => {
    promocodeNotificator();
}

document.addEventListener('DOMContentLoaded', initPromocodeNotificator);
