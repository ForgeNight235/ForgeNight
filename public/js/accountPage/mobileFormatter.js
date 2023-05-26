const MobileFormatter = () => {
    const phoneInput = document.getElementById('mobile');

    phoneInput.addEventListener('input', () => {
        let phone = phoneInput.value.replace(/\D/g, ''); // удаляем все нецифровые символы

        if (phone.length > 0 && phone[0] !== '7' && phone[0] !== '+') {
            phone = '+7' + phone;
        }

        if (phone.length > 1 && phone[0] === '7') {
            phone = `+${phone}`;
        }

        if (phone.length >= 2) {
            phone = phone.slice(0, 2) + ' (' + phone.slice(2);
        }

        if (phone.length >= 7) {
            phone = phone.slice(0, 7) + ') ' + phone.slice(7);
        }

        if (phone.length >= 12) {
            phone = phone.slice(0, 12) + '-' + phone.slice(12);
        }

        if (phone.length >= 15) {
            phone = phone.slice(0, 15) + '-' + phone.slice(15);
        }

        phoneInput.value = phone;
    });
}
const initMobileFormatter = () => {
    MobileFormatter();
}
document.addEventListener('DOMContentLoaded', initMobileFormatter());
