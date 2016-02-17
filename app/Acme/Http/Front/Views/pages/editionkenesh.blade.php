@extends('Front::layouts.default')
@section('title', '2013 - 2015 - жылга карай КТРКнын Өнүгүү стратегиясынын долбоору | КТРК')
@section('styles')
	<link rel="stylesheet" type="text/css" href="{{ asset('/static/css/styles.css') }}">
@stop
@section('content')
    <div class="container main-wrapper">

            <div class="row">
                <div class="top-left-block col-md-9 panel-top-news">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title"><span>Редакциялык кеңешчи</span></h3>
                        </div>
                        <div class="mainnews">
                            <figure class="effect-zoe">
                                <a href="article.html" class="main-img"><img src="{{ asset('static/images/rs/1.jpg') }}" alt="img26"></a>
                                <div class="news-channel">
                                    <a href="channel.html"><img src="{{ asset('static/images/logo_notext.png') }}" alt=""/></a>
                                </div>
                                <figcaption>
                                    <h2><a href="article.html">КТРКнын Редакциялык Кеңешчисинин (Омбудсмен) институтунун иш-аракети</a></h2>
                                    <p class="calendar"><span class="glyphicon glyphicon-calendar" aria-hidden="true"></span> 07.10.2015</p>
                                    <p class="views"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span> 555</p>
                                    <p class="comments"><span class="glyphicon glyphicon-comment" aria-hidden="true"></span> 14</p>

                                </figcaption>
                            </figure>
                        </div>
                        <div class="panel-heading">
                            <h3 class="panel-title"><span>Жанылыктар</span></h3>
                        </div>
                        <div class="row "> 
                            <div class="rsnews">
                                <div class="col-xs-12 col-sm-4 col-md-4 rsimg">
                                    <figure class="effect-zoe">
                                        <a href="article.html" class="main-img"><img src="{{ asset('image.jpg') }}" alt="img26"><i class="fa fa-image"></i></a>
                                    </figure>
                                </div>
                                <div class="col-xs-12 col-sm-8 col-md-8 rsanons">
                                    <h2><a href="article.html">Теледебаты КТРК помогли кыргызстанцам с выбором</a></h2>
                                    <h3> Прошедшие в эфире Общественного телерадиоканала теледебаты кандидатов в депутаты ЖК показали не только мастерство журналистов, режиссеров, телеоператоров КТРК, но и помогли телезрителям лучше узнать героев дебатных сражений? </h3>
                                    <div class="rscounters">
                                        <p class="calendar"><span class="glyphicon glyphicon-calendar" aria-hidden="true"></span> 07.10.2015</p>
                                        <p class="views"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span> 555</p>
                                        <p class="comments"><span class="glyphicon glyphicon-comment" aria-hidden="true"></span> 14</p> 
                                    </div>
                                </div>                        
                            </div>
                            <div class="rsnews">                              
                                <div class="col-xs-12 col-sm-4 col-md-4 rsimg">
                                    <figure class="effect-zoe">
                                        <a href="article.html" class="main-img"><img src="{{ asset('static/images/logo_notext.png') }}" alt="img26"><i class="fa fa-play-circle-o"></i></a>
                                    </figure>
                                </div>
                                <div class="col-xs-12 col-sm-8 col-md-8 rsanons">
                                    <h2><a href="article.html">Вместо казахского радио, зазвучало кыргызское</a></h2>
                                    <h3> С жалобой на то, что в Манасском районе Таласской области, в течении недели вместо привычных программ “Биринчи радио ” и “Кыргыз радио ” звучит казахская радиостанция, в институт Редакционного Советника КТРК обратилась жительница села Арал Карачач Кочорбаева.</h3>
                                    <div class="rscounters">
                                        <p class="calendar"><span class="glyphicon glyphicon-calendar" aria-hidden="true"></span> 07.10.2015</p>
                                        <p class="views"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span> 555</p>
                                        <p class="comments"><span class="glyphicon glyphicon-comment" aria-hidden="true"></span> 14</p> 
                                    </div>
                                </div>                       
                            </div>
                            <div class="rsnews">                              
                                <div class="col-xs-12 col-sm-4 col-md-4 rsimg">
                                    <figure class="effect-zoe">
                                        <a href="article.html" class="main-img"><img src="{{ asset('static/images/channels/1-radio.png') }}" alt="img26"><i class="fa fa-link"></i></a>
                                    </figure>
                                </div>
                                <div class="col-xs-12 col-sm-8 col-md-8 rsanons">
                                    <h2><a href="article.html">Кыргызские новости на китайском радио, в русском выпуске новостей</a></h2>
                                    <h3> Согласно жалобе жителя села Гульча Алайского района Абдысатара Абдылдаева, с которой он 17 августа этого года, обратился в институт Редакционного советника КТРК , в течении августа месяца в их селе не было сигнала "Биринчи радио" Общественного телерадиоканала..</h3>
                                     <div class="rscounters">
                                        <p class="calendar"><span class="glyphicon glyphicon-calendar" aria-hidden="true"></span> 07.10.2015</p>
                                        <p class="views"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span> 555</p>
                                        <p class="comments"><span class="glyphicon glyphicon-comment" aria-hidden="true"></span> 14</p> 
                                    </div>
                                </div>
                            </div>
                            <div><br><br></div>
                        </div><!-- end row -->

                    </div>
                </div>
                <div class="top-right-block col-md-3">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title"><span>Все о редакционном советнике </span></h3>
                        </div>
                        <div class="aboutrs">
                            <button type="button" class="btn btn-star  btn-block">Для чего нужен Редакционный Советник КТРК?</button>
                            <button type="button" class="btn btn-star btn-block">Что делать, если Ваши права были нарушены?</button>
                            <button type="button" class="btn btn-star btn-block">Процедура рассмотрения заявлений и жалоб</button>
                            <button type="button" class="btn btn-star btn-block">Как связаться с Редакционным Советником?</button>
                            <button type="button" class="btn btn-star btn-block">Отчеты редакционного советника</button>
                            <button type="button" class="btn btn-star btn-block">Презентация Редакционного Советника</button>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title"><span>Сотрудники Редакционного советника</span></h3>
                        </div>
                        <div class="aboutpersons">
                            <div class="textpersons">
                                <img src="{{ asset('static/images/rs/tamara1.jpg') }}" class="img-rounded"> 
                                <a href="#"><h3>Валиева Тамара Бектурсуновна</h3></a><p>редакционный советник КТРК</p>
                            </div>
                            <div class="textpersons">
                                <img src="{{ asset('static/images/rs/gulnara.jpg') }}" class="img-rounded"> 
                                <a href="#"><h3>Мамбеталиева Гульнара Мунуровна </h3></a><p>ассистент редакционного советника КТРК</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="row">
                <div class="rspersons">
                </div>
            </div>
        </div>

@stop