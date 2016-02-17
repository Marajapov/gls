<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Document</title>
</head>
<body>
  {!! Form::model($test, ['route' => 'admin.test.store', 'enctype' => 'multipart/form-data']) !!}
    {!! Form::file('images[]', array('multiple'=>true)) !!}
    {!! Form::submit('Submit', array('class'=>'send-btn')) !!}
  {!! Form::close() !!}
</body>
</html>
