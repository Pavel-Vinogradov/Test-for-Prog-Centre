
<div class="modal fade"
     id="addProducts"
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
                                   placeholder="Название товара"
                                   required>
                        </label>
                    </div>
                    <div class="form-group">
                        <label>
                            <input type="text"
                                   class="form-control"
                                   name="description"
                                   value=""
                                   placeholder="Описание товара"
                                   required>
                        </label>
                    </div>
                    <div class="form-group">
                        <label>
                            <input type="text"
                                   class="form-control"
                                   name="price"
                                   value=""
                                   placeholder="Цена товара"
                                   required>
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