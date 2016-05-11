<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Admin Panel</a>
        </div>
        <div class="collapse navbar-collapse">

            <form class="navbar-form navbar-left navbar-search-form hidden" role="search">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-search"></i></span>
                    <input type="text" value="" class="form-control" placeholder="Search...">
                </div>
            </form>

            <ul class="nav navbar-nav navbar-right">

                <li>
                    <a href="{{ route('admin.user.create') }}">
                        <i class="fa fa-plus"></i>
                        <p>Добавить пользователя</p>
                    </a>
                </li>


                <li>
                    <a href="javascript:document.getElementById('logout-form').submit()">
                        <i class="fa fa-sign-out"></i>
                        <p>Выйти</p>
                    </a>
                </li>

            </ul>
        </div>
        {{--<div class="collapse navbar-collapse">--}}
        {{--<ul class="nav navbar-nav navbar-left">--}}
        {{--<li>--}}
        {{--<a href="{{ route('admin.category.create') }}" class="btn btn-success btn-block">--}}
        {{--Добавить категорию--}}
        {{--<i class="pe-7s-keypad"></i>--}}
        {{--</a>--}}
        {{--</li>--}}
        {{--</ul>--}}
        {{--<ul class="nav navbar-nav navbar-right">--}}

        {{--<li class="dropdown">--}}
        {{--<a href="#" class="dropdown-toggle" data-toggle="dropdown">--}}
        {{--Азамат--}}
        {{--<b class="caret"></b>--}}
        {{--</a>--}}
        {{--<ul class="dropdown-menu">--}}
        {{--<li><a href="#">Личный кабинет</a></li>--}}

        {{--<li class="divider"></li>--}}
        {{--<li><a href="javascript:document.getElementById('logout-form').submit()">Выйти</a></li>--}}
        {{--</ul>--}}
        {{--</li>--}}

        {{--</ul>--}}
        {{--</div>--}}
    </div>
</nav>