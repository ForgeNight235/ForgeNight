// Модальное окно для выхода из аккаунта
// logoutMobile-btn
const modal = () => {
    const logoutBtns = document.querySelectorAll('.logout-btn');

    if (logoutBtns)
    {
        const logoutURL = "/auth/logoutUser";
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-success',
                cancelButton: 'btn btn-danger'
            },
            buttonsStyling: false
        });

        if (logoutBtns.length > 0) {
            logoutBtns.forEach((logoutBtn) => {
                logoutBtn.addEventListener('click', function(e) {
                    e.preventDefault(); // Останавливаем стандартное поведение ссылки
                    swalWithBootstrapButtons.fire({
                        title: 'Выйти из аккаунта?',
                        text: "Вы не сможете совершить заказ",
                        icon: 'question',
                        showCancelButton: true,
                        confirmButtonText: 'Выйти',
                        cancelButtonText: 'Остаться',
                        reverseButtons: true,
                        preConfirm: function () {
                            return new Promise(function (resolve) {
                                window.location.href = logoutURL;
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
                        } else if (result.dismiss === Swal.DismissReason.cancel) {
                            swalWithBootstrapButtons.fire(
                                'Вы остаетесь!',
                                'Окно автоматически закроется',
                                'success'
                            );
                            setTimeout(function () {
                                Swal.close();
                            }, 1000);
                        }
                    });
                });
            });
        }
    }
}

const initModal = () => {
    modal();
}

document.addEventListener('DOMContentLoaded', initModal);

