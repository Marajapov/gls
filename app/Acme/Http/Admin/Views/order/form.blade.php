<div class="row">
    <div class="col-md-3">
        <div class="form-group">
            <label>Имя клиента</label>
            <input name="client_name" type="text" class="form-control" placeholder="Имя">
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label for="exampleInputEmail1">Телефон клиента</label>
            <input name="client_phone" type="text" class="form-control" placeholder="Телефон">
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="exampleInputEmail1">Адрес клиента</label>
            <input name="client_adres" type="text" class="form-control" placeholder="Адрес">
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label>Короткое название</label>
            <input name="name" type="text" class="form-control" placeholder="Коротко опишите заказ">
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

<h5 class="subtitle">Исполнители</h5>

<div class="doers">

    <div class="inner">
        <div id="doer1" class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <label for="category1">Категория</label>
                    <select id="category1" name="categories[]" onchange="categoryChange($('#category1'), $('#subCategory1'), $('#price1'))" class="form-control selectpicker" title = "-- Выберите категорию --">
                        @foreach($categories as $category)
                            <option value="{{ $category->getId() }}">{{ $category->getName() }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="subCategory1">Подкатегория</label>
                    <select id="subCategory1" name="subcategories[]" onchange="subcategoryChange($('#subCategory1'), $('#price1'))" class="form-control selectpicker" title="-- Выберите подкатегорию --">
                    </select>
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <label for="count1">Количество</label>
                    <input id="count1" name="counts[]" type="text" class="form-control">
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <label for="price1">Цена</label>
                    <input id="price1" name="prices[]" type="text" class="form-control">
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
