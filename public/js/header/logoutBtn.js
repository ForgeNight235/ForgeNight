// Модальное окно для выхода из аккаунта
// logoutMobile-btn
const modal = () => {
    const logoutURL = "{{ route('auth.logoutUser') }}";
    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: 'btn btn-success',
            cancelButton: 'btn btn-danger'
        },
        buttonsStyling: false
    });
    document.getElementById('logout-btn').addEventListener('click', function(e) {
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

                window.location.replace('/catalog')
                // Здесь нужно написать код, который выполнится, если пользователь нажмет кнопку "Yes, delete it!"
            } else if (result.dismiss === Swal.DismissReason.cancel) {
                swalWithBootstrapButtons.fire(
                    'Вы остаетесь!',
                    'Окно автоматически закроется',
                    'success'
                )
                setTimeout(function () {
                    Swal.close();
                }, 3000);
            }
        });

    });
}
const initModal = () => {
    modal();
}
document.addEventListener('DOMContentLoaded', initModal());
