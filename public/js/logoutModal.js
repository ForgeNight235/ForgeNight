// Модальное окно для выхода из аккаунта

const modalLogout = () => {
    const logoutButton = document.getElementById('logout-btn');

    if (logoutButton)
    {
        const logoutUrl = logoutButton.dataset.logouturl;

        const swalWithBootstrapButtons = swal.mixin({
            customClass: {
                confirmButton: 'btn btn-success',
                cancelButton: 'btn btn-danger'
            },
            buttonsStyling: false
        });

        logoutButton.addEventListener('click', function(e) {
            e.preventDefault();
            swalWithBootstrapButtons.fire({
                title: 'Выйти из аккаунта?',
                text: 'Вы не сможете совершить заказ',
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: 'Выйти',
                cancelButtonText: 'Остаться',
                reverseButtons: true,
                preConfirm: function() {
                    return new Promise(function(resolve) {
                        window.location.href = logoutUrl;
                        resolve();
                    });
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    swalWithBootstrapButtons.fire(
                        'Вы остаетесь!',
                        'Your file has been deleted.',
                        'warning'
                    );
                    window.location.replace('/catalog');
                    // Здесь нужно написать код, который выполнится, если пользователь нажмет кнопку "Yes, delete it!"
                } else if (result.dismiss === swal.DismissReason.cancel) {
                    swalWithBootstrapButtons.fire(
                        'Вы остаетесь!',
                        'Окно автоматически закроется',
                        'success'
                    );
                    setTimeout(function() {
                        swal.close();
                    }, 3000);
                }
            });
        });
    }

}

const initModalLogout = () => {
    modalLogout();
}

document.addEventListener('DOMContentLoaded', initModalLogout);


