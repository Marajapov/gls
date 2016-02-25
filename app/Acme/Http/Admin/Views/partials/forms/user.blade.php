<div class="row">
    <div class="col-md-3">
        <div class="form-group">
            <label>Ф.И.О.</label>
            <input name="name" type="text" class="form-control" placeholder="Имя">
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label for="exampleInputEmail1">Телефон</label>
            <input name="phone" type="text" class="form-control" placeholder="Телефон">
        </div>
    </div>
</div>

<h5 class="subtitle">Специальности</h5>

<div class="doers">

    <div class="inner">
        <div id="doer1" class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <label for="category1">Категория</label>
                    {!! Form::select('category_id', ['0'=>'-- Выберите --']+$categoryList, null, ["class" => "form-control selectpicker", "data-live-search"=>"true", "title" => "-- Выберите --"]) !!}
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="subCategory1">Подкатегория</label>
                    <select id="subCategory1" name="subCategory1" class="form-control selectpicker" title="-- Выберите категорию --">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                    </select>
                </div>
            </div>

        </div>
    </div>
    <a id="addDoer" class="btn btn-success btn-morphing" href="#">Еще</a>
</div>

<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            <div class="checkbox checkbox-primary">
                <input id="checkbox3" class="styled" type="checkbox">
                <label for="checkbox3">
                    админ
                </label>
            </div>
        </div>
    </div>
</div>

<div class="action">
    <button type="submit" class="btn btn-primary">Сохранить</button>
    <button onclick="history.go(-1);" class="btn btn-default">Назад</button>
</div>
