<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}"/>

    <style>
        h3{
            color: #333333;
            font-family: 'Roboto Regular', 'Open Sans', Arial, 'Helvetica Neue', Helvetica, sans-serif;
            font-size: 18px;
            text-transform: uppercase;
        }
    </style>
</head>
<body>

<h3>ОШИБКА В ТЕКСТЕ:</h3>

<a href="{{ $url }}">{{ $url }}</a>

<p>
    &laquo;...
    <em>
        {{ $part1 }} <strong style="color: #c42026;">{{ $mistake }}</strong> {{ $part2 }}
    </em>
    ...&raquo;
</p>

</body>
</html>