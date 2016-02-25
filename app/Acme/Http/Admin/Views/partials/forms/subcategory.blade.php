<div class="row">

    <div class="col-md-4">
        <div class="form-group">
            <label for="category1">Категория</label>
            <select id="category1" name="category1" class="form-control selectpicker" title="-- Выберите категорию --">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
            </select>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label>Название</label>
            <input type="text" class="form-control" placeholder="Имя">
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label>Цена</label>
            <input type="text" class="form-control" placeholder="Цена">
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            <div class="checkbox checkbox-success">
                <input id="checkbox3" class="styled" type="checkbox">
                <label for="checkbox3">
                    активный
                </label>
            </div>
        </div>
    </div>
</div>

<button type="submit" class="btn btn-primary">Сохранить</button>
<button onclick="history.go(-1);" class="btn btn-default">Назад</button>
