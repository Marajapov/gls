<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Страница на реконструкции</title>

  <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}"/>
  <link rel="stylesheet" href="{{ asset('css/style.css') }}"/>

  <style>
    body{

    }
    .container{
      position: absolute;
      margin: auto;
      top: 0;
      right: 0;
      bottom: 0;
      left: 0;
      height: 400px;
      border-radius: 3px;

      text-align: center;
    }
    .container .media{
    }
    .media-left{
      width: 40%;
      padding-right: 100px;
    }
    .media-body h4{
      padding: 0;
      margin: 0;
      color: #005197;
      font-size: 48px;
      font-weight: bold;
      text-transform: uppercase;
    }
    .btn{
      margin: 75px auto 0;
      padding: 10px 30px;
      background: #005197;
      color: #FFFFFF;
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
<body class="kyrgyzradio">

<div class="container">

    <div class="media">
      <div class="media-left media-middle">
        <a href="#">
          <img class="media-object" src="{{ asset('images/channels/kg-radio.png') }}" alt="">
        </a>
      </div>
      <div class="media-body media-middle">
        <h4 class="media-heading">
          @if(app()->getlocale() == 'kg')
            УЧУРДА БУЛ БАРАКЧА ИШТЕЛИП ЖАТАТ.
          @else
            СТРАНИЦА НА СТАДИИ РАЗРАБОТКИ
          @endif
        </h4>
      </div>
    </div>
    <a class="btn" href="{{ route('front.home') }}">
      @if(app()->getlocale()=='kg')
        Артка кайтуу
      @else
        Назад
      @endif
    </a>

</div>

</body>
</html>