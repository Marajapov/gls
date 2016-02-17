<div class="col-md-3">
  <div class="row">
    <nav class="navbar navbar-custom">
      <div class="">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Меню</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">
            <li><a href="{{ route('front.rs.index') }}">Главная</a></li>
            <li><a href="{{ route('front.rs.about') }}">Для чего нужен Редакционный Советник КТРК? </a></li>
            <li><a href="{{ route('front.rs.faq') }}">Что делать, если Ваши права были нарушены?</a></li>
            <li><a href="{{ route('front.rs.procedure') }}">Процедура рассмотрения заявлений и жалоб</a></li>
            <li><a target="_blank" href="{{ asset('static/files/rs/ombudsmen_presentation.pdf') }}">Презентация Редакционного Советника</a></li>
            <li><a href="{{ route('front.rs.contacts') }}">Как связаться с Редакционным Советником?</a></li>
          </ul>

        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>

    <div class="panel-heading sidebar-panel-heading">
      <h3 class="panel-title"><span>Наши советники</span></h3>
    </div>
    <div class="panel-body sidebar-panel-body">

      <div class="thumbnail">
        <a href="{{ route('front.rs.person',1) }}">
          <img src="{{ asset('static/images/rs/rs.jpg') }}" alt="...">
        </a>
        <div class="caption">
          <h3>Валиева Тамара Бектурсуновна</h3>
          <p>редакционный советник КТРК</p>
          <a class="btn btn-default" href="{{ route('front.rs.person',1) }}">Подробнее</a>
        </div>
      </div>

    </div>

  </div>
</div>