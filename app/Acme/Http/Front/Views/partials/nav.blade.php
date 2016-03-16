<nav class="navbar navbar-default" role="navigation-demo" id="demo-navbar">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ route('front.home') }}">
                <img src="{{ asset('images/logo.png') }}" alt="logo"/>
            </a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="navigation-example-2">
            <ul class="nav navbar-nav navbar-right">
                <a href="{{ route('front.order.new') }}" class="btn btn-fill btn-info"><i class="fa fa-plus"></i>Новое задание</a>
                <a href="{{ route('front.order.all') }}" class="btn btn-simple">Задания</a>
                <a href="#" class="btn btn-simple">Услуги</a>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-->
</nav>