<div class="row">
    <div class="col-md-3">
        <div class="form-group">
            <label>Имя клиента</label>
            {!! Form::text('client_name', null, ["class" => "form-control", "required" => true, "placeholder" => "Имя"]) !!}
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label for="exampleInputEmail1">Телефон клиента</label>
            {!! Form::text('client_phone', null, ["class" => "form-control", "required" => true, "placeholder" => "Телефон"]) !!}
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="exampleInputEmail1">Адрес клиента</label>
            {!! Form::text('client_adres', null, ["class" => "form-control", "required" => true, "placeholder" => "Адрес"]) !!}
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label>Короткое название</label>
            {!! Form::text('name', null, ["class" => "form-control", "required" => true, "placeholder" => "Коротко опишите заказ"]) !!}
        </div>
    </div>


    <div class="col-md-3">
        <div class="form-group">
            <label for="count1">Количество</label>
            {!! Form::text('count', null, ["class" => "form-control", "required" => true, "placeholder" => "Количество"]) !!}
        </div>
    </div>


    <div class="col-md-3">
        <div class="form-group">
            <label for="price1">Цена</label>
            {!! Form::text('price', null, ["class" => "form-control", "required" => true, "placeholder" => "Цена"]) !!}
        </div>
    </div>
</div>


<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <label>Описание заказа</label>
            {!! Form::textarea('description', null, ["class" => "form-control", "rows"=>5, "required" => true, "placeholder" => "Текст описания"]) !!}
        </div>
    </div>
</div>

<div class="row">
    <div class=" col-md-4">
        <label for="attachment">Добавить фото</label>
        <div class="fileinput fileinput-new input-group" data-provides="fileinput">
            <div class="form-control" data-trigger="fileinput">
                <i class="glyphicon glyphicon-file fileinput-exists"></i>
                <span class="fileinput-filename"></span>
            </div>
            <span class="input-group-addon btn btn-default btn-file">
                        <span class="fileinput-new">Выберите файл</span>
            <span class="fileinput-exists">Изменить</span>
            <input id="attachment" type="file" name="attachment">
            </span>
            <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Удалить</a>
        </div>
        <p class="help-block">Фото помогает исполнителям лучше понять ваше задание и оценить объем работы</p>
    </div>
</div>

<h5 class="subtitle">Исполнители</h5>
<div class="doers">

    <div class="inner">
        <div id="doer1" class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <label for="category1">Категория</label>
                    {!! Form::select('category_id', $categories, null, ["class" => "form-control selectpicker", "onchange"=>"categoryChange($('#category1'), $('#subCategory1'), $('#price1'))", "id" => "category1", "title" => "-- Выберите --"]) !!}
                   
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="subCategory1">Подкатегория</label>
                    {!! Form::select('subcategory_id', $subcategories, null, ["class" => "form-control selectpicker", "id" => "subCategory1", "title" => "-- Выберите --"]) !!}
                </div>
            </div>
        </div>
    </div>
</div>

<div class="action">
    <button type="submit" class="btn btn-primary">Сохранить</button>
    <button onclick="history.go(-1);" class="btn btn-default">Назад</button>
</div>
