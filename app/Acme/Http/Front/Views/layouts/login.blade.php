<!DOCTYPE html>
<html lang="ру">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

    <title>
        @yield('title')
    </title>

    <!-- Bootstrap core CSS     -->
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="{{ asset('css/admin/animate.min.css') }}" rel="stylesheet"/>

    <!--  Light Bootstrap Table core CSS    -->
    <link href="{{ asset('css/admin/light-bootstrap-dashboard.css') }}" rel="stylesheet"/>
    <link href="{{ asset('css/admin/style.css') }}" rel="stylesheet"/>

    <!--     Fonts and icons     -->
    <link href="{{ asset('css/font-awesome.css') }}" rel="stylesheet">
    <link href="{{ asset('css/admin/pe-icon-7-stroke.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('css/login.css') }}"/>

    @yield('styles')

</head>
<body class="login">

    @yield('content')

<!--   Core JS Files   -->
<script src="{{ asset('js/jquery-1.11.2.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/bootstrap.min.js') }}" type="text/javascript"></script>

<!--  Checkbox, Radio & Switch Plugins -->
<script src="{{ asset('js/admin/bootstrap-checkbox-radio-switch.js') }}"></script>

<!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
<script src="{{ asset('js/admin/light-bootstrap-dashboard.js') }}"></script>

</body>
</html>


