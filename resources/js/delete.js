$(function () {
    $('.delete').click(function () {
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-success',
                cancelButton: 'btn btn-danger'
            },
            buttonsStyling: false
        })

        swalWithBootstrapButtons.fire({
            title: 'Czy na pewno chcesz usunąć rekord?',

            //TODO: tytuł dać odwołanie tak jak do deleteUrl i w parametrze przekazywać odpowiedni tytuł
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'TAK',
            cancelButtonText: 'NIE',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    method: "DELETE",
                    url: deleteUrl + $(this).data("id")
                })
                    .done(function (data) {
                        window.location.reload();
                    })
                    .fail(function (data) {
                        Swal.fire({
                            icon: data.responseJSON.status,
                            title: data.responseJSON.message
                        });
                    });
            }
        })
    });
});
