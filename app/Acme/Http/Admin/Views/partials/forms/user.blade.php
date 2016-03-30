<div class="row">
    <div class="col-md-3">
        <div class="form-group">
            <label>Ф.И.О.</label>
            {!! Form::text('name', null, ["class" => "form-control", "required" => true, "placeholder" => "Имя"]) !!}
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label for="exampleInputEmail1">Телефон</label>
            {!! Form::text('phone', null, ["class" => "form-control", "required" => true, "placeholder" => "Телефон"]) !!}
            
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label for="exampleInputEmail1">Пароль</label>
            {!! Form::text('password2', null, ["class" => "form-control", "required" => true, "placeholder" => "Пароль"]) !!}
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
                    <select id="category1" name="categories[]" onchange="categoryChange($('#category1'), $('#subCategory1'))" class="form-control selectpicker" title = "-- Выберите категорию --">
                        @foreach($categories as $category)
                            <option value="{{ $category->getId() }}">{{ $category->getName() }}</option>
                        @endforeach
                    </select>

                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="subCategory1">Подкатегория</label>
                    <select id="subCategory1" name="subcategories[]" class="form-control selectpicker" title="-- Выберите категорию --">
                    </select>
                </div>
            </div>

        </div>
    </div>
    <a id="addDoer" class="btn btn-success btn-morphing" href="#">Еще</a>
</div>


<div class="action">
    <button type="submit" class="btn btn-primary">Сохранить</button>
    <a href="#" onclick="history.go(-1);" class="btn btn-default">Назад</a>
</div>
