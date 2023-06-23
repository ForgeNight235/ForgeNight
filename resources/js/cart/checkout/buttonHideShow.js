const showHideBtn = () => {
    // Сохраняем текущие значения из форм
    var addressFormValues = JSON.parse(JSON.stringify(Object.fromEntries(new FormData(document.querySelector('.address')).entries())));
    var contactsFormValues = JSON.parse(JSON.stringify(Object.fromEntries(new FormData(document.querySelector('.contacts')).entries())));

// Сравниваем текущие значения с сохраненными при инициализации страницы
    var isAddressFormChanged = false;
    var isContactsFormChanged = false;

    document.querySelector('.address').addEventListener('input', function() {
        isAddressFormChanged = JSON.stringify(Object.fromEntries(new FormData(document.querySelector('.address')).entries())) !== JSON.stringify(addressFormValues);
        var btnSave = document.querySelector('.address .btn-save');
        if (isAddressFormChanged) {
            btnSave.style.display = 'block';
        } else {
            btnSave.style.display = 'none';
        }
    });

    document.querySelector('.contacts').addEventListener('input', function() {
        isContactsFormChanged = JSON.stringify(Object.fromEntries(new FormData(document.querySelector('.contacts')).entries())) !== JSON.stringify(contactsFormValues);
        var btnSave = document.querySelector('.contacts .btn-save');
        if (isContactsFormChanged) {
            btnSave.style.display = 'block';
        } else {
            btnSave.style.display = 'none';
        }
    });
};
const initShowHideBtn = () => {
    showHideBtn();
}

document.addEventListener('DOMContentLoaded', initShowHideBtn);
