@extends('Front::layouts.default')
@section('title', 'GLS' )

@section('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('slick/slick.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('slick/slick-theme.css') }}"/>
@stop

@section('content')
    <div class="wrapper">

        <div id="carousel" class="carousel slide" data-ride="carousel">

            <div class="container">
                <article>
                    <h2 class="col-xs-8">Онлайн сервис заказа услуг</h2>

                    <div class="clearfix">
                        <h4 class="col-md-8 col-sm-8 hidden-xs">
                            Поможем найти надежного исполнителя для решения ваших задач
                        </h4>
                    </div>

                    <a href="{{ route('front.order.new')}}" class="btn btn-danger btn-fill">Оформить заявку</a>
                </article>
            </div>

            <div class="carousel slide" data-ride="carousel">

                <!-- Indicators -->
                <ol class="carousel-indicators">
                    <li data-target="#carousel" data-slide-to="0" class="active"></li>
                    <li data-target="#carousel" data-slide-to="1"></li>
                    <li data-target="#carousel" data-slide-to="2"></li>
                    <li data-target="#carousel" data-slide-to="3"></li>
                    <li data-target="#carousel" data-slide-to="4"></li>
                    <li data-target="#carousel" data-slide-to="5"></li>
                </ol>

                <!-- Wrapper for slides -->
                <div class="carousel-inner">
                    <div class="item active">
                    </div>
                    <div class="item">
                    </div>
                    <div class="item">
                    </div>
                    <div class="item">
                    </div>
                    <div class="item">
                    </div>
                    <div class="item">
                    </div>
                </div>

                <!-- Controls -->
                <a class="left carousel-control" href="#carousel" data-slide="prev">
                    <span class="fa fa-angle-left"></span>
                </a>
                <a class="right carousel-control" href="#carousel" data-slide="next">
                    <span class="fa fa-angle-right"></span>
                </a>
            </div>
        </div> <!-- end carousel -->

        <div class="main">


            <div class="section landing-section section-with-space section-gray section-services">

                <h2 class="text-center">Услуги</h2>

                <div id="services" class="container services">
                    <div class="row">

                        @foreach($categories as $key=>$category)

                                <div class="col-md-3 col-xs-6 column" @if($key>7) style="display: none;" @endif>
                                    <div class="icon-wrap task-{{$category->class}}">
                                        <i></i>
                                    </div>
                                    <h4>
                                        <a href="{{ route('front.order.new.category',$category) }}">
                                            {{$category->name}}
                                        </a>
                                    </h4>
                                </div>
                        @endforeach

                    </div>
                </div>


                <a href="#" class="btn btn-fill btn-danger btn-all">Все услуги</a>
            </div>

            <div class="section section-gray section-with-space landing-section section-advantages">
                <div class="container">
                    <h2 class="text-center">Основные преимущества TezTap</h2>

                    <div class="media advantage-2">
                        <div class="media-left media-middle">
                            <span class="media-icon"></span>
                        </div>
                        <div class="media-body media-middle">
                            <h4 class="media-heading">Проверенные исполнители</h4>
                            <p>
                                Наши исполнители проходят процедуру верификации, мы проверяем отзывы, разбираемся с жалобами и контролируем качество их работы. Наш сервис безопасен для заказчиков.
                            </p>
                        </div>
                    </div>

                    <div class="media advantage-1">
                        <div class="media-left media-middle">
                            <span class="media-icon"></span>
                        </div>
                        <div class="media-body media-middle">
                            <h4 class="media-heading">Выгодные цены</h4>
                            <p>
                                У наших исполнителей нет расходов на офис и другие затраты, которые сервисные компании обычно включают в стоимость своих услуг.
                            </p>
                        </div>
                    </div>

                    <div class="media advantage-3">
                        <div class="media-left media-middle">
                            <span class="media-icon"></span>
                        </div>
                        <div class="media-body media-middle">
                            <h4 class="media-heading">Экономия времени</h4>
                            <p>
                                На сайте TezTap.kg, или по телефону, вы можете заказать необходимых исполнителей за несколько минут. Многие из них готовы приступить к работе в тот же день, а иногда в тот же час.
                            </p>
                        </div>
                    </div>

                </div>
            </div>

            <div class="section section-dark-blue section-with-space text-center landing-section section-tasks">
                <div class="container">
                    <h2>Последние заявки</h2>

                    <div class="tasks">
                        <div class="task task-cargo">
                            <div class="media">
                                <div class="media-left">
                                    <a href="#">
                                        <i></i>
                                    </a>
                                </div>
                                <div class="media-body">
                                    <a href="#" class="media-heading">
                                        Ежедневно довозить туда-обратно ребенка и взрослого
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="task task-home">
                            <div class="media">
                                <div class="media-left">
                                    <a href="#">
                                        <i></i>
                                    </a>
                                </div>
                                <div class="media-body">
                                    <a href="#" class="media-heading">
                                        Купить в ИКЕА и доставить детский столик и стульчик
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="task task-courier">
                            <div class="media">
                                <div class="media-left">
                                    <a href="#">
                                        <i></i>
                                    </a>
                                </div>
                                <div class="media-body">
                                    <a href="#" class="media-heading">
                                        Купить в ИКЕА и доставить детский столик и стульчик
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="task task-clean">
                            <div class="media">
                                <div class="media-left">
                                    <a href="#">
                                        <i></i>
                                    </a>
                                </div>
                                <div class="media-body">
                                    <a href="#" class="media-heading">
                                        Купить в ИКЕА и доставить детский столик и стульчик
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="task task-computer">
                            <div class="media">
                                <div class="media-left">
                                    <a href="#">
                                        <i></i>
                                    </a>
                                </div>
                                <div class="media-body">
                                    <a href="#" class="media-heading">
                                        Купить в ИКЕА и доставить детский столик и стульчик
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="task task-photo hidden-xs">
                            <div class="media">
                                <div class="media-left">
                                    <a href="#">
                                        <i></i>
                                    </a>
                                </div>
                                <div class="media-body">
                                    <a href="#" class="media-heading">
                                        Купить в ИКЕА и доставить детский столик и стульчик
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="task task-web hidden-xs">
                            <div class="media">
                                <div class="media-left">
                                    <a href="#">
                                        <i></i>
                                    </a>
                                </div>
                                <div class="media-body">
                                    <a href="#" class="media-heading">
                                        Купить в ИКЕА и доставить детский столик и стульчик
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="task task-tech hidden-xs">
                            <div class="media">
                                <div class="media-left">
                                    <a href="#">
                                        <i></i>
                                    </a>
                                </div>
                                <div class="media-body">
                                    <a href="#" class="media-heading">
                                        Купить в ИКЕА и доставить детский столик и стульчик
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="task task-holiday hidden-xs">
                            <div class="media">
                                <div class="media-left">
                                    <a href="#">
                                        <i></i>
                                    </a>
                                </div>
                                <div class="media-body">
                                    <a href="#" class="media-heading">
                                        Купить в ИКЕА и доставить детский столик и стульчик
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@stop

@section('scripts')
    <script type="text/javascript" src="{{ asset('js/jquery-migrate-1.2.1.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('slick/slick.min.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('.tasks').slick({
                dots: false,
                infinite: true,
                autoplay: true,
                speed: 600,
                slidesToShow: 3,
                slidesToScroll: 1,
                responsive: [
                    {
                        breakpoint: 1024,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 1,
                            infinite: true,
                            dots: false
                        }
                    },
                    {
                        breakpoint: 768,
                        settings: "unslick"
                    }
                    // You can unslick at a given breakpoint now by adding:
                    // settings: "unslick"
                    // instead of a settings object
                ]
            });

            $('.btn-all').click(function () {
                $(this).hide();
                $('.column').each(function () {
                    $(this).show();
                });
            });

            $('#btnServices').click(function () {
                $('.btn-all').hide();
                $('.column').each(function () {
                    $(this).show();
                });
            });
        });
    </script>
@stop