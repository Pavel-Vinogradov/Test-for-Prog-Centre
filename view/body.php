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
                    data-target="#addProducts">
                <i class="far fa-file-alt"></i>&nbsp;&nbsp;
                Добавить товар
            </button>
            <a href="controller/action.php?export=excel"
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
