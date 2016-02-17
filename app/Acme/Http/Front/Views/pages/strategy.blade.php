@extends('Front::layouts.default')
@section('title', trans('site.Strategy').' | КТРК')
@section('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/pages.css') }}">
@stop
@section('content')

    <div class="container main-wrapper">
        <div class="row">
            <section class="content clearfix">
                <div class="clearfix">
                    <div class="top-left-block col-md-12">
                        <div class="panel panel-default panel-page">
                            <div class="panel-heading">
                                <h3 class="panel-title"><span>Стратегия</span></h3>
                            </div>
                            <div class="panel-body">
                                <div class="rsarticles">

                                    @if($lc == 'kg')

                                        <div class="modal fade strategy" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                        <h4 class="modal-title" id="myModalLabel">Стратегия</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <iframe src="{{ asset('/static/files/strategy.pdf') }}" style="width:100%; height:700px;" frameborder="0"></iframe>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Жабуу</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <a data-toggle="modal" data-target=".strategy" class="titlelink">
                                            <i class="fa fa-file-text"></i>
                                            <span>2013-2015-жылга карай Кыргыз Республикасынын Коомдук телерадиоберүү корпорациясынын Өнүгүү стратегиясы</span>
                                        </a>
                                        <p>2012-жылдын 6-декабрында КТРКнын Байкоочу кеңеши тарабынан колдоого алынып,
                                            2013-2015-жылга карай Кыргыз Республикасынын Коомдук телерадиоберүү корпорациясынын Өнүгүү стратегиясы каналдын менеджменти тарабынан иштелип чыкты.</p>

                                        <p>Аталган документти иштеп чыгууда, өлкөнүн негизги каналын өнүктүрүү максатында коомдук жана жарандык коомчулук өкүлдөрүнөн кеңири масштабдагы кеңештер, ой-пикирлер кабыл алынып, документке камтылды. </p>
                                        <p>КТРКнын Өнүгүү стратегиясы алдыдагы үч жылга карай милдеттерди жана максаттарды камтыйт. Эң негизгиси, коомдук берүүнүн принциптерине жараша корпорациянын өнүгүүсүнө карай максаттуу кадамдар каралган.</p>
                                        <p>Өнүгүү стратегиясында төмөнкүдөй милдеттер коюлган: эффективдүү менеджмент, санариптик берүүгө өтүү, контентти жакшыртуу, каражат табуу булактарын көбөйтүү, кызматкерлердин кесиптик чеберчилигин жогорулатуу жана каналдын техникалык жабдыктарын жаңылоо.</p>
                                </div>
                                @elseif($lc == 'ru')
                                    <div class="modal fade strategy" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                    <h4 class="modal-title" id="myModalLabel">Стратегия</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <iframe src="{{ asset('/static/files/strategy.pdf') }}" style="width:100%; height:700px;" frameborder="0"></iframe>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Жабуу</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <a data-toggle="modal" data-target=".strategy" class="titlelink">
                                        <i class="fa fa-file-text"></i>
                                        <span>Стратегия развития Общественной телерадиовещательной корпорации Кыргызской Республики на 2013-2015 гг.</span>
                                    </a>
                                    <p>6 декабря 2012 года Наблюдательным советом КТРК одобрена Стратегия развития Общественной телерадиовещательной корпорации Кыргызской Республики на 2013-2015 гг., разработанный менеджментом канала.</p>

                                    <p>В процессе разработки документа были проведены масштабные консультации с представителями общественности и гражданского сектора, по обсуждению идей и мнений развития главного канала страны.</p>
                                    <p>Стратегия развития КТРК определяет приоритеты и задачи на грядущие три года. И главным образом, предусматривает целенаправленные шаги для развития корпорации согласно принципам общественного вещания.</p>
                                    <p>Документ предусматривает такие задачи, как эффективный менеджмент, переход на цифровое вещание, улучшение контента, диверсификация источников финансирования, развитие человеческого ресурса и техническая модернизация канала.</p>
                                @endif
                            </div>
                        </div><!-- end panel default -->

                    </div>
                </div>
            </section>
        </div>
    </div>
@stop