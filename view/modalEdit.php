<div class="modal fade"
     id="editModal"
     tabindex="-1"
     role="dialog"
     aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog"
         role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"
                    id="exampleModalLabel">Редактировать товар</h5>
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
                    id="edit-form-data">
                    <input type="hidden"
                           name="id"
                           id="id">
                    <div class="form-group">
                        <label>
                            <input type="text"
                                   class="form-control"
                                   name="name"
                                   id="name"
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
                                   id="description"
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
                                   id="price"
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
                                id="edit"
                                name="edit"
                                value="Save"
                                class="btn btn-danger">Сохранить
                        </button>

                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
