$(document).ready(function () {

    // view ajax request
    view();

    function view() {
        $.ajax({
            type: "POST",
            url: 'controller/action.php',
            data: {action: 'view'},
            success: (responce) => {
                // console.log(responce);
                $('#catalogs').html(responce);
                $('table').DataTable(
                    {
                        "language": {
                            "processing": "Подождите...",
                            "search": "Поиск:",
                            "lengthMenu": "Показать _MENU_ записей",
                            "info": "Записи с _START_ до _END_ из _TOTAL_ записей",
                            "infoEmpty": "Записи с 0 до 0 из 0 записей",
                            "infoFiltered": "(отфильтровано из _MAX_ записей)",
                            "infoPostFix": "",
                            "loadingRecords": "Загрузка записей...",
                            "zeroRecords": "Записи отсутствуют.",
                            "emptyTable": "В таблице отсутствуют данные",
                            "paginate": {
                                "first": "Первая",
                                "previous": "Предыдущая",
                                "next": "Следующая",
                                "last": "Последняя"
                            },
                            "aria": {
                                "sortAscending": ": активировать для сортировки столбца по возрастанию",
                                "sortDescending": ": активировать для сортировки столбца по убыванию"
                            },
                            "select": {
                                "rows": {
                                    "_": "Выбрано записей: %d",
                                    "0": "Кликните по записи для выбора",
                                    "1": "Выбрана одна запись"
                                }
                            }
                        },


                    }
                );
            },

        });
    }

    //insert
    $('#insert').click(event => {

        if ($("#form-data")[0].checkValidity()) {
            event.preventDefault();

            $.ajax({
                type: "POST",
                url: 'controller/action.php',
                data: $('#form-data').serialize() + '&action=insert',
                success: () => {
                    // console.log(response);
                    Swal.fire(
                        'Good job!',
                        'You clicked the button!',
                        'success'
                    )
                    $('#addProducts').modal('hide');
                    $('#form-data')[0].reset();
                    view();
                }
            })


        }
    });
    // getID
    $('body').on('click', '.editBtn', (event) => {
        event.preventDefault();
        let getId = $(event.currentTarget).attr('id');
        // console.log(getId)
        $.ajax(
            {
                type: "POST",
                url: 'controller/action.php',
                data: {getId: getId},
                success: (response) => {
                    let date = JSON.parse(response);
                    $('#id').val(date.id);
                    $('#name').val(date.name);
                    $('#description').val(date.description);
                    $('#price').val(date.price);

                }
            }
        )

    });
    // edit
    $('#edit').click(event => {

        if ($("#edit-form-data")[0].checkValidity()) {
            event.preventDefault();

            $.ajax({
                type: "POST",
                url: 'controller/action.php',
                data: $('#edit-form-data').serialize() + '&action=edit',
                success: () => {
                    Swal.fire(
                        'Good job!',
                        'You clicked the button!',
                        'success'
                    )
                    $('#editModal').modal('hide');
                    $('#edit-form-data')[0].reset();
                    view();
                }
            })


        }
    });
    //delete
    $('body').on('click', '.delBtn', event => {
        event.preventDefault();
        let getId = $(event.currentTarget).attr('id');
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-success',
                cancelButton: 'btn btn-danger'
            },
            buttonsStyling: false
        });
        swalWithBootstrapButtons.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'No, cancel!',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: "POST",
                    url: 'controller/action.php',
                    data: {delId: getId},
                    success: () => {
                    },
                });
                swalWithBootstrapButtons.fire(
                    'Deleted!',
                    'Your file has been deleted.',
                    'success'
                );
                 view();
            } else if (
                /* Read more about handling dismissals below */
                result.dismiss === Swal.DismissReason.cancel
            ) {
                swalWithBootstrapButtons.fire(
                    'Cancelled',
                    'Your imaginary file is safe :)',
                    'error'
                )
            }
        })
    })
});