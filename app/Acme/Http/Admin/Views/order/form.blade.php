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
</div>

<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <label>Описание заказа</label>
{!! Form::textarea('description', null, ["class" => "form-control", "rows"=>5, "required" => true, "placeholder" => "Текст описания"]) !!}
        </div>
    </div>
</div>

<h5 class="subtitle">Исполнители</h5>

@if($order->client_name)
    @foreach($order_ties as $order_tie)
        <div class="row">

            <div class="col-md-2">
                <div class="form-group">
                    <label>Категория</label>
                    <input class="form-control" type="text" value="{{ $order_tie->category->name }}" disabled/>
                </div>
            </div>

            <div class="col-md-2">
                <div class="form-group">
                    <label for="exampleInputEmail1">Подкатегория</label>
                    <input class="form-control" type="text" value="{{ $order_tie->subcategory->name }}" disabled/>
                </div>
            </div>

            <div class="col-md-2">
                <div class="form-group">
                    <label>Количество</label>
                    <input class="form-control" type="text" value="{{ $order_tie->count }}" disabled/>
                </div>
            </div>

            <div class="col-md-2">
                <div class="form-group">
                    <label for="exampleInputEmail1">Цена</label>
                    <input class="form-control" type="text" value="{{ $order_tie->price }}" disabled/>
                </div>
            </div>
            
            <div class="col-md-2">
                <div class="form-group">
                    <a rel="tooltip" class="delete" href="{{ route('deleteItem', $order_tie->id) }}" title="Удалить">
                        <i class="pe-7s-close-circle"></i>
                    </a>
                </div> 
            </div>

        </div>
    @endforeach
@endif

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
