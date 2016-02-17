<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>

    <meta property="og:url"                content="{{ Request::url()}}" />
    <meta property="og:site_name"          content="{{ trans('site.TradeMark') }}" />
    <meta property="og:type"               content="article" />
    <meta property="og:title"              content="title title title"/>
    <meta property="og:description"        content="description" />
    <meta property="og:image"              content="{{ asset('images/banner_250x250.png') }}" />

    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}"/>
    <link rel="stylesheet" href="{{ asset('css/font-awesome.css') }}"/>
    <link rel="stylesheet" href="{{ asset('css/goodshare.css') }}"/>
</head>
<body>

<div class="social">
    <button class="goodshare btn-fb" data-type="fb">
        <i class="fa fa-facebook"></i>
        <span data-counter="fb"></span>
    </button>
    <!-- Button with share to Facebook & share counter -->
    <button class="goodshare btn-vk" data-type="vk">
        <i class="fa fa-vk"></i>
        <span data-counter="vk"></span>
    </button>
    <button class="goodshare btn-ok" data-type="ok">
        <i class="fa fa-odnoklassniki"></i>
        <span data-counter="ok"></span>
    </button>
    <button class="goodshare btn-gp" data-type="gp">
        <i class="fa fa-google-plus"></i>
        <span data-counter="gp"></span>
    </button>
    <button class="goodshare btn-tw" data-type="tw">
        <i class="fa fa-twitter"></i>
        <span data-counter="tw"></span>
    </button>
</div>

<script src="{{ asset('js/jquery-1.11.2.min.js') }}"></script>
<script src="{{ asset('js/goodshare.js') }}"></script>

</body>
</html>