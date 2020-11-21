<?php

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">
    <!--  use bootstrap-->
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
          integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2"
          crossorigin="anonymous">
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
          integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA=="
          crossorigin="anonymous"/>
    <link rel="stylesheet"
          type="text/css"
          href="https://cdn.datatables.net/v/bs4/dt-1.10.22/datatables.min.css"/>
    <link href="//cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">

    <style>
        label {
            display: block;
        }
    </style>

    <title>Каталог</title>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <h4 class="text-center   mt-3">
                Каталог товаров
            </h4>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <button type="button"
                    class="btn btn-primary m-1 float-right"
                    data-toggle="modal"
                    data-target="#exampleModal">
                <i class="far fa-file-alt"></i>&nbsp;&nbsp;
                Добавить товар
            </button>
            <a href="#"
               class="btn btn-success m-1 float-right"> <i class="far fa-file-excel"></i>&nbsp;&nbsp;Экспорт в Excel</a>
        </div>
    </div>
    <hr class="mt-3">
    <!--    Table-->
    <div class="row">
        <div class="col-lg-12">
            <div class="table-catalogs"
                 id="catalogs">

            </div>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade"
     id="exampleModal"
     tabindex="-1"
     role="dialog"
     aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog"
         role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"
                    id="exampleModalLabel">Добавить товар</h5>
                <button type="button"
                        class="close"
                        data-dismiss="modal"
                        aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form
                      method="post"
                      id="form-data">
                    <div class="form-group">
                        <label>
                            <input type="text"
                                   class="form-control"
                                   name="name"
                                   value=""
                                   placeholder="Название товара" required>
                        </label>
                    </div>
                    <div class="form-group">
                        <label>
                            <input type="text"
                                   class="form-control"
                                   name="description"
                                      value=""
                                   placeholder="Описание товара" required>
                        </label>
                    </div>
                    <div class="form-group">
                        <label>
                            <input type="text"
                                   class="form-control"
                                   name="price"
                                   value=""
                                   placeholder="Цена товара" required>
                        </label>
                    </div>
                    <div class="form-group">

                        <button type="button"
                                class="btn btn-secondary"
                                data-dismiss="modal">Закрыть
                        </button>
                        <button type="submit"
                                id="insert"
                                name="insert"
                                value="Сохранить"
                                class="btn btn-danger">Сохранить
                        </button>

                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

<!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"-->
<!--         integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"-->
<!--         crossorigin="anonymous"></script>-->
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script type="text/javascript"
        src="https://cdn.datatables.net/v/bs4/dt-1.10.22/datatables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js"
        integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s"
        crossorigin="anonymous"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.min.js"></script>

<script>
    $(document).ready(function () {
        let formData = $("#form").serialize();
        console.log(formData);
        // view ajax request
        view();
        function view() {
            $.ajax({
                type: "POST",
                url: 'controller/action.php',
                data: {action: 'view'},
                success: function (responce) {
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

        $('#insert').click(event=>
        {

            if( $("#form-data")[0].checkValidity()) {
                event.preventDefault();

                $.ajax({
                    type: "POST",
                    url: 'controller/action.php',
                    data: $('#form-data').serialize()+'&action=insert' ,
                    success:function () {
                         // console.log(response);
                        Swal.fire(
                            'Good job!',
                            'You clicked the button!',
                            'success'
                        )
                        $('#exampleModal').modal('hide');
                        $('#form-data')[0].reset();
                        view();
                    }
                })


            }
        })

    });
</script>
</body>

</html>