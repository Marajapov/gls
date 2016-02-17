<!-- Sidebar -->
<nav class="navbar navbar-inverse navbar-fixed-top" id="sidebar-wrapper" role="navigation">
    <ul class="nav sidebar-nav">
        <li class="sidebar-brand">
            <a href="#">
                Меню
            </a>
        </li>

        @foreach(\Model\Menu\ModelName::code('main')->parent()->get() as $menu)
            @if(count($menu->submenus) > 0)
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        @if(app()->getlocale() == 'kg')
                            {{ $menu->getName() }}
                        @else
                            {{ $menu->getNameRu() }}
                        @endif

                        <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu" role="menu">
                        @foreach($menu->submenus as $submenu)
                            <li><a href="{{ $submenu->getUrl() }}">@if(app()->getlocale() == 'kg'){{ $submenu->getName() }} @else {{ $submenu->getNameRu() }} @endif</a></li>
                        @endforeach
                    </ul>
                </li>

            @else
                <li><a href="{{ $menu->getUrl() }}">
                        @if(app()->getlocale() == 'kg')
                            {{ $menu->getName() }}
                        @else
                            {{ $menu->getNameRu() }}
                        @endif
                    </a></li>
            @endif
        @endforeach
    </ul>
</nav>
<!-- /#sidebar-wrapper -->