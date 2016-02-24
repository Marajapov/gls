    <!-- sidebar menu -->
    <div class="sidebar" data-color="blue" data-image="{{ asset('images/admin/img/sidebar-5.jpg') }}">
        <!--
            Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple"
            Tip 2: you can also add an image using data-image tag
        -->
        <div class="sidebar-wrapper">
            <div class="logo">
                <a href="#" class="simple-text">
                    GLS Admin
                </a>
            </div>

            <ul class="nav">
                <li>
                    <a href="{{ route('admin.home') }}">
                        <i class="pe-7s-graph"></i>
                        <p>Главная</p>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.order.index') }}">
                        <i class="pe-7s-note2"></i>
                        <p>Заказы</p>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.category.index') }}">
                        <i class="pe-7s-keypad"></i>
                        <p>Категории</p>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="pe-7s-user"></i>
                        <p>Пользователи</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <!--  end sidebar menu -->

    <div class="main-panel">
        <nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-left">
                        <li>
                            <a href="{{ route('admin.order.create') }}" class="btn btn-success btn-block">
                                Добавить заказ
                                <i class="pe-7s-note2"></i>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">

                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                Азамат
                                <b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Личный кабинет</a></li>

                                <li class="divider"></li>
                                <li><a href="#">Выйти</a></li>
                            </ul>
                        </li>

                    </ul>
                </div>
            </div>
        </nav>