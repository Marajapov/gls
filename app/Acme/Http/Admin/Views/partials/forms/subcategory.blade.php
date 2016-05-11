<div class="row">

    <div class="col-md-4">
        <div class="form-group">
            <label for="category1">Категория</label>
            {!! Form::select('category_id', ['0'=>'-- Выберите категорию --']+$categoryList, null, ["class" => "form-control selectpicker", "title" => "-- Выберите категорию --"]) !!}
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label>Название</label>
            {!! Form::text('name', null, ["class" => "form-control", "required" => true, "placeholder" => "Название"]) !!}
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label>Цена</label>
            {!! Form::text('price', null, ["class" => "form-control", "required" => true, "placeholder" => "Цена"]) !!}
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            <div class="checkbox checkbox-success">
                {!! Form::hidden('published', 0) !!}
                {!! Form::checkbox('published', 1, null, ["id" => "checkboxPublished", "class" => "form-control styled"]) !!}
                <label for="checkboxPublished">
                    Опубликовать
                </label>
            </div>
        </div>
    </div>
</div>

<button type="submit" class="btn btn-primary">Сохранить</button>
<button onclick="history.go(-1);" class="btn btn-default">Назад</button>
