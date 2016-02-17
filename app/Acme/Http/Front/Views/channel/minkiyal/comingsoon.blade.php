<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Страница на реконструкции</title>

  <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}"/>
  <link rel="stylesheet" href="{{ asset('css/style.css') }}"/>

  <style>
    body{
      width: 100%;
      height: 100%;
    }
    .container{
      position: relative;
    }
    .container .media{
      margin-top: 50px;
    }
    .media-left{
      width: 30%;
      padding-right: 100px;
    }
    .media-body h4{
      padding: 0;
      margin: 0;
      color: #ffffff;
      font-size: 64px;
      font-weight: bold;
      text-transform: uppercase;
    }
    .btn{
      display: block;
      margin: 50px auto 0;
      padding: 10px 30px;
      background: #ffffff;
      color: #b60038;
      font-size: 24px;
      font-weight: bold;
      text-transform: uppercase;

      -webkit-transition: all 0.2s ease;
      -moz-transition: all 0.2s ease;
      -ms-transition: all 0.2s ease;
      -o-transition: all 0.2s ease;
      transition: all 0.2s ease;
    }
    .btn:hover{
      opacity: 0.88;
      color: #b60038;
    }
  </style>
</head>
<body class="madaniyat">

<div class="container">

    <div class="media">
      <div class="media-left media-middle">
        <a href="#">
          <img class="media-object" src="{{ asset('images/channels/min-kiyal.png') }}" alt="">
        </a>
      </div>
      <div class="media-body media-middle">
        <h4 class="media-heading">Бул баракча иштеп чыгуу стадиясында.</h4>
        ...
      </div>
    </div>
    <a href="{{ route('front.home') }}">
    <button class="btn">
      Артка кайтуу
    </button>
    </a>

</div>

</body>
</html>