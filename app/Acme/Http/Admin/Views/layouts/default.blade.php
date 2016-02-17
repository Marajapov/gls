<!DOCTYPE html>
<html lang="ру">
<head>
  <meta charset="utf-8"/>

  <title>
    @yield('title')
  </title>

  <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}"/>
  <link rel="stylesheet" href="{{ asset('css/font-awesome.css') }}"/>
  <link rel="stylesheet" href="{{ asset('css/admin/jasny/jasny-bootstrap.min.css') }}"/>

  {{--<link rel="stylesheet" href="{{ asset('css/admin/awesome-bootstrap-checkbox.min.css') }}"/>--}}
  <link rel="stylesheet" href="{{ asset('css/bootstrap-datetimepicker.css') }}">
  <link rel="stylesheet" href="{{ asset('css/bootstrap-select.css') }}">

  <!-- Admin page styles -->
  <link rel="stylesheet" href="{{ asset('css/admin/custom.css') }}"/>
  <link rel="stylesheet" href="{{ asset('css/admin/style.css') }}"/>

  <link rel="stylesheet" href="{{ asset('css/admin/select/select2.min.css') }}"/>


  <!-- JS scripts forom admin page -->
  <script src="{{ asset('js/jquery-1.11.2.min.js') }}"></script>
  <script src="{{ asset('js/bootstrap.js') }}"></script>
  <script src="{{ asset('js/admin/jasny/jasny-bootstrap.min.js') }}"></script>

  {{--<script src="{{ asset('js/admin/nprogress.js') }}"></script>--}}
  {{--<script>--}}
    {{--NProgress.start();--}}
  {{--</script>--}}

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  @yield('styles')

</head>
<body class="nav-md">
<div class="container body">
  <div class="main_container">
    <div class="col-md-3 left_col">
      <div class="left_col scroll-view">

        <div class="navbar nav_title" style="border: 0;">
          <a href="{{ route('front.home') }}" class="site_title">
          </a>
        </div>
        <div class="clearfix"></div>

        @include('Admin::partials.header2')

        @yield('header')
      </div>
    </div>

    <!-- top navigation -->
    <div class="top_nav">

      <div class="nav_menu">
        <nav class="" role="navigation">
          <div class="nav toggle ">
            <a data-toggle="tooltip" data-placement="bottom" title="Меню" id="menu_toggle"><i class="fa fa-dedent"></i></a>
          </div>
          <div>
          </div>

          <ul class="nav navbar-nav navbar-right">
            <li><a href="/locale/kg">KG</a></li>
            <li><a href="/locale/ru">Ru</a></li>
            <li class="">
              <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-user"></i>
                {{ auth()->user()->getName() }}
                <span class=" fa fa-caret-down"></span>
              </a>
              <ul class="dropdown-menu dropdown-usermenu animated fadeInDown pull-right">
                <li><a href="javascript:;"><i class="fa fa-user-secret"></i>&nbsp;Профиль</a>
                </li>
                <li>
                  <a href="javascript:;"><i class="fa fa-cog"></i>&nbsp;Оңдоолор </a>
                </li>
                <li>
                  <a href="javascript:;"><i class="fa fa-info"></i>&nbsp;Жардам</a>
                </li>
                <li class="divider"></li>
                <li><a href="javascript:document.getElementById('logout-form').submit()"><i class="fa fa-power-off"></i>&nbsp;Чыгуу</a></li>
              </ul>
            </li>

          </ul>

        </nav>
      </div>

    </div>
    <!-- /top navigation -->

    <!-- Content -->
    <div class="right_col" role="main">
      @yield('content')

    </div>
    <!-- Content -->

  </div><!--end page-container-->
</div><!--end container body-->

{{--<script src="{{ asset('js/admin/progressbar/bootstrap-progressbar.min.js') }}"></script>--}}
{{--<script src="{{ asset('js/admin/nicescroll/jquery.nicescroll.min.js') }}"></script>--}}
<script src="{{ asset('js/admin/custom.js') }}"></script>

@yield('scripts')

{{--<script>--}}
  {{--NProgress.done();--}}
{{--</script>--}}
</body>
</html>