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
</div>

<div class="row">
    <div class="col-md-3">
        <div class="form-group">
            <label for="flag">Глобальный пользователь</label>
            {!! Form::hidden('flag', 0) !!}
            {!! Form::checkbox('flag', 1, null, ["id" => "flag", "class" => "form-control styled", "style" => "width: 34px; margin: 0"]) !!}  
        </div>        
    </div>
</div>

<div class="row">
    <div class="col-md-3">
        <div class="form-group">
            <label for="role">Роль</label>
            {!! Form::select('role',$userRole, null, ["class" => "form-control selectpicker", "title" => "-- Выберите --"]) !!}
        </div>        
    </div>
</div>

<div class="action">
    <a href="{{ route('admin.user.changePassword', $user->id) }}" class="btn btn-default">Изменить пароль</a>
    <button type="submit" class="btn btn-primary">Сохранить</button>
    <a href="#" onclick="history.go(-1);" class="btn btn-default">Назад</a>
</div>
