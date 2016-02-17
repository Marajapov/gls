<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Document</title>
</head>
<body>
@foreach($images as $row)
	<p>		
		<img src="{{ asset('uploads/'.$row->name) }} " alt="">
		{{ $row->name }}
	</p>
@endforeach
</body>
</html>
