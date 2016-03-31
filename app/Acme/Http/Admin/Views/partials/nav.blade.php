<!-- sidebar menu -->
<div class="sidebar" data-color="blue" data-image="{{ asset('images/admin/img/sidebar-5.jpg') }}">
    <!--
        Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple"
        Tip 2: you can also add an image using data-image tag
    -->

    <div class="logo">
        <a href="{{ route('admin.home') }}" class="logo-text">
            TezTap
        </a>
    </div>

    <div class="sidebar-wrapper">

        <div class="user">
            <div class="photo">
                <i class="pe-7s-user"></i>
            </div>
            <div class="info">
                <a href="#">
                    {{ auth()->user()->name }}
                </a>
            </div>
        </div>

        <ul id="mainNav" class="nav">
            <li>
                <a href="{{ route('admin.home') }}" data-href="{{ route('admin.home') }}">
                    <i class="pe-7s-graph"></i>
                    <p>Главная</p>
                </a>
            </li>
            <li>
                <a data-toggle="collapse" aria-expanded="false" href="#componentsExamples" data-href="{{ route('admin.order.index') }}">
                    <i class="pe-7s-note2"></i>
                    <p>Заказы<b class="caret"></b></p>
                </a>
                <div class="collapse" id="componentsExamples" aria-expanded="true">
                    <ul class="nav">
                        <li><a href="{{ route('admin.order.index') }}">Все</a></li>
                        <li><a href="{{ route('admin.order.client') }}">Заказы с сайта</a></li>
                        <li><a href="{{ route('admin.order.new') }}">Заказы с админки</a></li>
                        <li><a href="{{ route('admin.order.shared') }}">Разосланные</a></li>
                        <li><a href="{{ route('admin.order.canceled') }}">Отмененные</a></li>
                        <li><a href="{{ route('admin.order.closed') }}">Закрытые</a></li>
                    </ul>
                </div>
            </li>
            <li>
                <a href="{{ route('admin.category.index') }}" data-href="{{ route('admin.category.index') }}">
                    <i class="pe-7s-keypad"></i>
                    <p>Категории</p>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.subcategory.index') }}" data-href="{{ route('admin.subcategory.index') }}">
                    <i class="pe-7s-network"></i>
                    <p>Подкатегории</p>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.user.index') }}" data-href="{{ route('admin.user.index') }}">
                    <i class="pe-7s-users"></i>
                    <p>Пользователи</p>
                </a>
            </li>
        </ul>
    </div>
</div>
<!--  end sidebar menu -->

<div class="main-panel">