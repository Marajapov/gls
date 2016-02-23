<!-- sidebar menu -->
    <div class="sidebar" data-color="blue" data-image="assets/img/sidebar-5.jpg">
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
                <li class="active">
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
                    <a href="#">
                        <i class="pe-7s-user"></i>
                        <p>Пользователи</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <!--  end sidebar menu -->