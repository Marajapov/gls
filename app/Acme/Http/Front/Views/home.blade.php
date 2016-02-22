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

                    <a href="#" class="btn btn-danger">Оформить заявку</a>
                </article>
            </div>

            <div class="carousel slide" data-ride="carousel">

                <!-- Indicators -->
                <ol class="carousel-indicators">
                    <li data-target="#carousel" data-slide-to="0" class="active"></li>
                    <li data-target="#carousel" data-slide-to="1"></li>
                    <li data-target="#carousel" data-slide-to="2"></li>
                </ol>

                <!-- Wrapper for slides -->
                <div class="carousel-inner">
                    <div class="item active">
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

                <div class="container services">
                    <div class="row">
                        <div class="col-md-3 col-sm-4 col-xs-6 column">
                            <div class="icon-wrap task-courier">
                                <i></i>
                            </div>
                            <h4>Курьерские услуги</h4>
                            <ul class="list-group">
                                <li class="list-group-item">
                                    <a href="#">Услуги пешего курьера</a>
                                </li>
                                <li class="list-group-item">
                                    <a href="#">Услуги курьера на авто</a>
                                </li>
                                <li class="list-group-item">
                                    <a href="#">Купить и доставить</a>
                                </li>
                                <li class="list-group-item">
                                    <a href="#">Срочная доставка</a>
                                </li>
                                <li class="list-group-item">
                                    <a href="#">Доставка продуктов</a>
                                </li>
                                <li class="list-group-item">
                                    <a href="#">Доставка еды из ресторанов</a>
                                </li>
                                <li class="list-group-item">
                                    <a href="#">Курьер на день</a>
                                </li>
                                <li class="list-group-item">
                                    <a href="#">Другая посылка</a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-3 col-sm-4 col-xs-6 column">
                            <div class="icon-wrap task-home">
                                <i></i>
                            </div>
                            <h4>Домашний мастер</h4>
                            <ul class="list-group">
                                <li class="list-group-item">
                                    <a href="#">Мастер на час</a>
                                </li>
                                <li class="list-group-item">
                                    <a href="#">Отделочные работы</a>
                                </li>
                                <li class="list-group-item">
                                    <a href="#">Ремонт под ключ</a>
                                </li>
                                <li class="list-group-item">
                                    <a href="#">Строительные услуги</a>
                                </li>
                                <li class="list-group-item">
                                    <a href="#">Электромонтажные работы</a>
                                </li>
                                <li class="list-group-item">
                                    <a href="#">Сантехнические работы</a>
                                </li>
                                <li class="list-group-item">
                                    <a href="#">Сборка и ремонт мебели</a>
                                </li>
                                <li class="list-group-item">
                                    <a href="#">Установка и ремонт дверей, замков</a>
                                </li>
                                <li class="list-group-item">
                                    <a href="#">Плиточные работы</a>
                                </li>
                                <li class="list-group-item">
                                    <a href="#">Что-то другое</a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-3 col-sm-4 col-xs-6 column hidden-xs">
                            <div class="icon-wrap task-cargo">
                                <i></i>
                            </div>
                            <h4>Грузоперевозки</h4>
                            <ul class="list-group">
                                <li class="list-group-item">
                                    <a href="#">Переезды</a>
                                </li>
                                <li class="list-group-item">
                                    <a href="#">Вывоз мусора</a>
                                </li>
                                <li class="list-group-item">
                                    <a href="#">Услуги грузчиков</a>
                                </li>
                                <li class="list-group-item">
                                    <a href="#">Негабаритный груз</a>
                                </li>
                                <li class="list-group-item">
                                    <a href="#">Мебель и бытовая техника</a>
                                </li>
                                <li class="list-group-item">
                                    <a href="#">Пассажирские перевозки</a>
                                </li>
                                <li class="list-group-item">
                                    <a href="#">Строительные грузы и оборудование</a>
                                </li>
                                <li class="list-group-item">
                                    <a href="#">Транспортные средства</a>
                                </li>
                                <li class="list-group-item">
                                    <a href="#">Междугородные перевозки</a>
                                </li>
                                <li class="list-group-item">
                                    <a href="#">Другой груз</a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-3 col-xs-6 column hidden-sm hidden-xs">
                            <div class="icon-wrap task-clean">
                                <i></i>
                            </div>
                            <h4>Клининговые услуги</h4>
                            <ul class="list-group">
                                <li class="list-group-item">
                                    <a href="#">Мытье окон</a>
                                </li>
                                <li class="list-group-item">
                                    <a href="#">Вынос мусора</a>
                                </li>
                                <li class="list-group-item">
                                    <a href="#">Помощь при переезде</a>
                                </li>
                                <li class="list-group-item">
                                    <a href="#">Поддерживающая уборка квартиры</a>
                                </li>
                                <li class="list-group-item">
                                    <a href="#">Генеральная уборка квартиры</a>
                                </li>
                                <li class="list-group-item">
                                    <a href="#">Ремонт и пошив одежды</a>
                                </li>
                                <li class="list-group-item">
                                    <a href="#">Приготовление еды</a>
                                </li>
                                <li class="list-group-item">
                                    <a href="#">Глажение белья</a>
                                </li>
                                <li class="list-group-item">
                                    <a href="#">Чистка ковров, мебели</a>
                                </li>
                                <li class="list-group-item">
                                    <a href="#">Что-то другое</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="container services">
                    <div class="row">
                        <div class="col-md-3 col-sm-4 col-xs-6 column">
                            <div class="icon-wrap task-computer">
                                <i></i>
                            </div>
                            <h4>Компьютерная помощь</h4>
                            <ul class="list-group">
                                <li class="list-group-item">
                                    <a href="#">Ремонт компьютеров и ноутбуков</a>
                                </li>
                                <li class="list-group-item">
                                    <a href="#">Восстановление данных</a>
                                </li>
                                <li class="list-group-item">
                                    <a href="#">Удаление вирусов</a>
                                </li>
                                <li class="list-group-item">
                                    <a href="#">Установка и настройка ОС, программ</a>
                                </li>
                                <li class="list-group-item">
                                    <a href="#">Настройка интернета и Wi-Fi</a>
                                </li>
                                <li class="list-group-item">
                                    <a href="#">Ремонт и замена комплектующих</a>
                                </li>
                                <li class="list-group-item">
                                    <a href="#">Настройка и ремонт оргтехники</a>
                                </li>
                                <li class="list-group-item">
                                    <a href="#">Консультация и обучение</a>
                                </li>
                                <li class="list-group-item">
                                    <a href="#">Ремонт мониторов</a>
                                </li>
                                <li class="list-group-item">
                                    <a href="#">Что-то другое</a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-3 col-sm-4 col-xs-6 column">
                            <div class="icon-wrap task-photo">
                                <i></i>
                            </div>
                            <h4>Фото- и видео-услуги</h4>
                            <ul class="list-group">
                                <li class="list-group-item">
                                    <a href="#">Фотосъемка</a>
                                </li>
                                <li class="list-group-item">
                                    <a href="#">Видеосъемка</a>
                                </li>
                                <li class="list-group-item">
                                    <a href="#">Ретушь фотографий</a>
                                </li>
                                <li class="list-group-item">
                                    <a href="#">Создание видеороликов под ключ</a>
                                </li>
                                <li class="list-group-item">
                                    <a href="#">Монтаж и цветокоррекция видео</a>
                                </li>
                                <li class="list-group-item">
                                    <a href="#">Видеопрезентации, заставки, слайд-шоу</a>
                                </li>
                                <li class="list-group-item">
                                    <a href="#">Оцифровка</a>
                                </li>
                                <li class="list-group-item">
                                    <a href="#">Что-то другое</a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-3 col-sm-4 col-xs-6 column hidden-xs">
                            <div class="icon-wrap task-web">
                                <i></i>
                            </div>
                            <h4>Web-разработка</h4>
                            <ul class="list-group">
                                <li class="list-group-item">
                                    <a href="#">Сайт под ключ</a>
                                </li>
                                <li class="list-group-item">
                                    <a href="#">Поддержка и помощь по сайту</a>
                                </li>
                                <li class="list-group-item">
                                    <a href="#">Программирование</a>
                                </li>
                                <li class="list-group-item">
                                    <a href="#">Верстка</a>
                                </li>
                                <li class="list-group-item">
                                    <a href="#">Разработка приложений и программ</a>
                                </li>
                                <li class="list-group-item">
                                    <a href="#">Что-то другое</a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-3 col-xs-6 column hidden-sm hidden-xs">
                            <div class="icon-wrap task-tech">
                                <i></i>
                            </div>
                            <h4>Установка и ремонт техники</h4>
                            <ul class="list-group">
                                <li class="list-group-item">
                                    <a href="#">Стиральные машины</a>
                                </li>
                                <li class="list-group-item">
                                    <a href="#">Холодильники и морозильные камеры</a>
                                </li>
                                <li class="list-group-item">
                                    <a href="#">Посудомоечные машины</a>
                                </li>
                                <li class="list-group-item">
                                    <a href="#">Электрические плиты и панели</a>
                                </li>
                                <li class="list-group-item">
                                    <a href="#">Кондиционеры и сплит-системы</a>
                                </li>
                                <li class="list-group-item">
                                    <a href="#">Водонагреватели, бойлеры, котлы, колонки</a>
                                </li>
                                <li class="list-group-item">
                                    <a href="#">Вытяжки</a>
                                </li>
                                <li class="list-group-item">
                                    <a href="#">Газовые плиты</a>
                                </li>
                                <li class="list-group-item">
                                    <a href="#">Духовые шкафы</a>
                                </li>
                                <li class="list-group-item">
                                    <a href="#">Швейные машины</a>
                                </li>
                                <li class="list-group-item">
                                    <a href="#">Мелкая бытовая техника</a>
                                </li>
                                <li class="list-group-item">
                                    <a href="#">Что-то другое</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <a href="#" class="btn btn-fill btn-danger btn-all">Все категории</a>
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
                                <div class="media-right">
                                    <span>500c.</span>
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
                                <div class="media-right">
                                    <span>500c.</span>
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
                                <div class="media-right">
                                    <span>500c.</span>
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
                                <div class="media-right">
                                    <span>500c.</span>
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
                                <div class="media-right">
                                    <span>500c.</span>
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
                                <div class="media-right">
                                    <span>500c.</span>
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
                                <div class="media-right">
                                    <span>500c.</span>
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
                                <div class="media-right">
                                    <span>500c.</span>
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
                                <div class="media-right">
                                    <span>500c.</span>
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
    <script type="text/javascript" src="{{ asset('js/readmore.js') }}"></script>
    <script>
            $('.services .list-group').readmore({
                speed: 500,
                moreLink: '<a class="moreLink" href="#">Показать еще <i class="fa fa-chevron-right"></i></a>',
                lessLink: '<a class="lessLink" href="#">Закрыть</a>',
                collapsedHeight: 120,
                heightMargin: 10
            });
    </script>

    <script type="text/javascript">
        $(document).ready(function(){
            $('.tasks').slick({
                dots: false,
                infinite: true,
                speed: 300,
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
        });
    </script>
@stop