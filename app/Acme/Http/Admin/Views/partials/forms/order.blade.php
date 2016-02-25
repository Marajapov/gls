<div class="row">
    <div class="col-md-3">
        <div class="form-group">
            <label>Имя клиента</label>
            <input name="name" type="text" class="form-control" placeholder="Имя">
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label for="exampleInputEmail1">Телефон клиента</label>
            <input name="phone" type="text" class="form-control" placeholder="Телефон">
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="exampleInputEmail1">Адрес клиента</label>
            <input name="address" type="text" class="form-control" placeholder="Адрес">
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <label>Описание заказа</label>
            <textarea name="description" rows="5" class="form-control" placeholder="Текст описания"></textarea>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-3">
        <div class="form-group">
            <label for="cost1">Дата</label>
            <input id="date" name="date" type="text" class="form-control">
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label for="cost1">Дата</label>
            <input id="time" name="time" type="text" class="form-control">
        </div>
    </div>
</div>

<h5 class="subtitle">Исполнители</h5>

<div class="doers">

    <div class="inner">
        <div id="doer1" class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <label for="category1">Категория</label>
                    <select onchange="selectChange($('#category1'), $('#subCategory1'));" id="category1" name="category1" class="form-control selectpicker orderCategory" title="-- Выберите категорию --">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                    </select>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="subCategory1">Подкатегория</label>
                    <select id="subCategory1" name="subCategory1" class="form-control selectpicker orderSubcategory" title="-- Выберите подкатегорию --">
                    </select>
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <label for="count1">Количество</label>
                    <input id="count1" name="count1" type="text" class="form-control">
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <label for="cost1">Цена</label>
                    <input id="cost1" name="cost1" type="text" class="form-control">
                </div>
            </div>

        </div>
    </div>
    <a id="addDoer" class="btn btn-success btn-morphing" href="#">Еще</a>
</div>

<div class="action">
    <button type="submit" class="btn btn-primary">Сохранить</button>
    <button onclick="history.go(-1);" class="btn btn-default">Назад</button>
</div>
