const successMessage = () => {

    const successMessage = document.getElementById('success-message');

    if (successMessage)
    {
        setTimeout(function() {
            var successMessage = document.getElementById('success-message');
            if (successMessage) {
                successMessage.classList.remove('show');
            }
        }, 5000);
    }

}

const initSuccessMessage = () => {
    successMessage();
}

document.addEventListener('DOMContentLoaded', initSuccessMessage);
