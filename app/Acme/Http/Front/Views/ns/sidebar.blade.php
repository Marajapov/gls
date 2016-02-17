<div class="col-md-2">
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
            <li><a href="{{ route('front.ns.index') }}">{{ trans('site.BaikoochuKeneshMain') }}</a></li>
            <li><a href="{{ route('front.ns.team') }}">{{ trans('site.BaikoochuKeneshTeam') }} </a></li>
            <li><a href="{{ route('front.ns.posts') }}">{{ trans('site.BaikoochuKeneshNews') }}</a></li>
            <li>
              <a data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample" class="collapsed">
                {{ trans('site.BaikoochuKeneshBase') }}
                <i class="fa fa-chevron-right"></i>
              </a>
              <div class="collapse" id="collapseExample">
                <ul>
                  <li><a href="{{ asset('static/files/ns/reglament_ot_17_01_13.pdf') }}" target="_blank">{{ trans('site.BaikoochuKeneshReglament') }}</a></li>
                  <li><a href="{{ asset('static/files/ns/polozhenie_o_poryadke_provedeniya.pdf') }}" target="_blank">Положение о порядке проведения открытого конкурса на замещение должности Генерального Директора КТРК КР</a></li>
                </ul>
              </div>
            </li>
            <li><a href="{{ route('front.ns.reports') }}">{{ trans('site.BaikoochuKeneshReports') }}</a></li>
            {{--<li><a href="{{ route('front.ns.galleries') }}">{{ trans('site.BaikoochuKeneshGallery') }}</a></li>--}}
            <li><a href="{{ route('front.ns.contacts') }}">{{ trans('site.BaikoochuKeneshContacts') }}</a></li>
            {{--<li><a href="#">Сурамжылоо</a></li>--}}
          </ul>

        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>

    <div class="panel-heading sidebar-panel-heading">
      <h3 class="panel-title"><span>{{ trans('site.BaikoochuKeneshAsk') }}</span></h3>
    </div>
    <div class="panel-body sidebar-panel-body">
      <h4><strong>Как Вы оцениваете работу НС КТРК?</strong></h4>

      <div id="poll" class="poll">
        <form >
          <div class="radio">
            <input type="radio" name="vote" id="radio1" value="1" onclick="getVote(this.value)">
            <label for="radio1">
              Отлично
            </label>
          </div>
          <div class="radio">
            <input type="radio" name="vote" id="radio2" value="2" onclick="getVote(this.value)">
            <label for="radio2">
              Хорошо
            </label>
          </div>
          <div class="radio">
            <input type="radio" name="vote" id="radio3" value="3" onclick="getVote(this.value)">
            <label for="radio3">
              Удовлетворительно
            </label>
          </div>
        </form>
      </div>

    </div>

  </div>
</div>