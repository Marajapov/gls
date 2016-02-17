@extends('Front::layouts.default')
@section('title', trans('site.DirectorPage')." | КТРК")
@section('styles')
  <link rel="stylesheet" href="{{ asset('css/custombox.css') }}"/>
  {{--
  <link rel="stylesheet" type="text/css" href="{{ asset('static/css/styles.css') }}">
  --}}
  <link rel="stylesheet" type="text/css" href="{{ asset('css/articles.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('css/pages.css') }}">
@stop
@section('content')
  <div class="container main-wrapper directorpages">
    <div class="row">
      <section class="content clearfix">
        <div id="main-content" class="top-left-block col-md-8">
          <div class="panel panel-default panel-page-withsidebar panel-articles">
            <div class="panel-heading">
              <h3 class="panel-title"><span>{{ trans('site.DirectorPage') }}: Карыпбеков Илим Майрамбекович</span></h3>
            </div>
            <div class="panel-body">
              <div class="persons">
                <div class="row">
                  <div class="media media-director">
                    <div class="media-left media-middle text-center">
                      <img src="{{ asset('images/manager_main.jpg') }}" class="">
                    </div>
                    <div class="media-body media-middle">
                      <ul class="list-group">
                        <li class="list-group-item">
                          <h4>
                            Карыпбеков Илим Майрамбекович
                          </h4>
                          <h5>
                            @if($lc == 'kg')
                              КТРКнын башкы директору
                            @else
                              Генеральный директор КТРК
                            @endif
                          </h5>
                          <button class="btn btn-default" id="button" role="button" data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                            {{ trans('site.More') }}
                          </button>
                        </li>
                        <li>

                        </li>
                        <li class="list-group-item">
                          <span class="list-extra">Facebook</span>
                          <span class="list-info"><a href="https://www.facebook.com/ilim.karypbekov">facebook.com/ilim.karypbekov</a></span>
                        </li>
                        <li class="list-group-item">
                          <span class="list-extra">Twitter</span>
                          <span class="list-info"><a href="https://twitter.com/ilimkm">twitter.com/ilimkm</a></span>
                        </li>
                        <li class="list-group-item">
                        </li>
                      </ul>
                    </div>
                  </div>
                  <div class="collapse" id="collapseExample">
                    <ul class="list-group first-level">
                      @if($lc == 'kg')
                        <li class="list-group-item">
                          Жеке Маалымат
                          <ul class="list-group second-level">
                            <li class="list-group-item">
                              1979-жылы 13-августта туулган.
                            </li>
                          </ul>
                        </li>
                        <li class="list-group-item">
                          Билими
                          <ul class="list-group second-level">
                            <li class="list-group-item">
                              <span class="list-extra">2001- ж.</span>
                              <span class="list-info">Кыргыз мамлекеттик улуттук университетинин укук факультетин артыкчылык менен бүтүргөн</span>
                            </li>
                            <li class="list-group-item">
                              <span class="list-extra">2007 -ж.</span>
                              <span class="list-info">Варшавадагы (Польша) адам укуктары боюнча жогорку эл аралык мектепти аяктаган</span>
                            </li>
                          </ul>
                        </li>
                        <li class="list-group-item">
                          Эмгек жолу
                          <ul class="list-group second-level">
                            <li class="list-group-item">
                              <span class="list-extra">1997-1999ж.</span>
                              <span class="list-info">«Ренессанс» студенттик илимий коомунун президенти, Бишкек</span>
                            </li>
                            <li class="list-group-item">
                              <span class="list-extra">Январь 1999-ж. - июнь 2000-ж. </span>
                              <span class="list-info">«BNS - Securities» ЖЧКнун юристи, Бишкек</span>
                            </li>
                            <li class="list-group-item">
                              <span class="list-extra">Июнь 2000-ж. - июнь 2001-ж.</span>
                              <span class="list-info">Сорос-Кыргызстан фондунун укуктук программалары боюнча кызматкери.</span>
                            </li>
                            <li class="list-group-item">
                              <span class="list-extra">Июнь 2001-ж. - октябрь 2001-ж. </span>
                              <span class="list-info">БУУнун өнүктүрүү программасы,Кочкор району. БУУнун улуттук ыктыярчысы</span>
                            </li>
                            <li class="list-group-item">
                              <span class="list-extra">Февраль 2002-ж. - январь 2003-ж.  </span>
                              <span class="list-info">«Сорос-Кыргызстан» фонду, Бишкек. «Коомдук башкаруу»,«Этникалык азчылык», «Коомдук саясатты иштеп чыгуу» программаларынын кызматкери.</span>
                            </li>
                            <li class="list-group-item">
                              <span class="list-extra">Январь 2003-ж. - 2004-ж.</span>
                              <span class="list-info">«LARC» укуктук долбоорунун юристи, Кара-Балта</span>
                            </li>
                            <li class="list-group-item">
                              <span class="list-extra">Июль 2003-ж.</span>
                              <span class="list-info">Адвокат болуп иштөөгө укук берүү  лицензиясы № 1051, Бишкек шаары</span>
                            </li>
                            <li class="list-group-item">
                              <span class="list-extra">Январь 2004-ж. - июнь 2004-ж.</span>
                              <span class="list-info">«ЛАРК» АК филиалынын директору, Түп району</span>
                            </li>
                            <li class="list-group-item">
                              <span class="list-extra">Июнь 2004–ж. - июнь 2006–ж.</span>
                              <span class="list-info">Медиаөкүл институту/ Интерньюс-Кыргызстан, ага юрист.</span>
                            </li>
                            <li class="list-group-item">
                              <span class="list-extra">Июнь 2006-ж. - учурда </span>
                              <span class="list-info">КР президентине караштуу башкаруу академиясы, окутуучу. (Жарандык жана эмгек укугу, бейөкмөт уюмдардын укуктук негиздери)</span>
                            </li>
                            <li class="list-group-item">
                              <span class="list-extra">Июнь 2006-ж. - февраль 2009-ж.</span>
                              <span class="list-info">«Медиа-өкүл институту» коомдук фондунун директору</span>
                            </li>
                            <li class="list-group-item">
                              <span class="list-extra">Июнь 2008-ж. - февраль 2009-ж.</span>
                              <span class="list-info">КР акыйкатчысынын медиа-өкүлү</span>
                            </li>
                            <li class="list-group-item">
                              <span class="list-extra">Февраль 2009-ж. - октябрь 2009-ж.  </span>
                              <span class="list-info">Кыргыз Республикасынын президентинин катчылыгынын референти</span>
                            </li>
                            <li class="list-group-item">
                              <span class="list-extra">Октябрь 2009-ж -апрель 2010-ж. </span>
                              <span class="list-info">КыргызРеспубликасынын президентинин катчылыгы, көмөк көрсөтүү кызматынын жетекчиси</span>
                            </li>
                            <li class="list-group-item">
                              <span class="list-extra">Февраль 2011-ж.-июль 2011-ж. </span>
                              <span class="list-info">«Альфа Телеком» (соода маркасы «MegaCom») Жабык акционердик коому, «Альфа Телеком» Жабык акционердик коомунун укук маселелери боюнча башкы директорунун орун басары</span>
                            </li>
                            <li class="list-group-item">
                              <span class="list-extra">Апрель 2010-ж. - учурда    </span>
                              <span class="list-info">«Кеңеш берүү жана укук институту» Коомдук фондунун директору</span>
                            </li>
                            <li class="list-group-item">
                              <span class="list-extra">Апрель 2010-ж. - учурда</span>
                              <span class="list-info">«Ин.Консалт»Кеңеш берүү компаниясынын директору</span>
                            </li>
                            <li class="list-group-item">
                              <span class="list-extra">Апрель 2010-2013-ж.</span>
                              <span class="list-info">Америка Борбор Азия университети, окутуучу (адвокатура,  укук клиникасы, ишкерлер укугу)</span>
                            </li>
                            <li class="list-group-item">
                              <span class="list-extra">Июль 2011-ж. - февраль 2012-ж.</span>
                              <span class="list-info">Кыргыз Республикасынын мамлекеттик мүлк министрлиги, «Альфа Телеком» ЖАК сырттан башкаруучу</span>
                            </li>
                            <li class="list-group-item">
                              <span class="list-extra">Октябрь 2011-ж. -учурда</span>
                              <span class="list-info">Кыргыз мамлекеттик юридикалык академиясы, ага окутуучу  (Экономикалык сот, Инвестициялык укук)</span>
                            </li>
                            <li class="list-group-item">
                              <span class="list-extra">Апрель 2013-ж. - февраль 2015-ж.</span>
                              <span class="list-info">«Эл аралык  «Манас» аэропорту» ААК, президенттин кеңешчиси</span>
                            </li>
                            <li class="list-group-item">
                              <span class="list-extra">Февраль 2015-ж.</span>
                              <span class="list-info">КТРКнын башкы директордун милдетин аткаруучу</span>
                            </li>
                            <li class="list-group-item">
                              <span class="list-extra">Март 2015-ж. - учурда</span>
                              <span class="list-info">КТРК башкы директору</span>
                            </li>
                          </ul>
                        </li>
                        <li class="list-group-item">
                          Кошумча маалымат
                          <ul class="list-group second-level">
                            <li class="list-group-item">
                              «K-News», www.knews.kg маалымат агенттигинин негиздөөчүсү
                            </li>
                            <li class="list-group-item">
                              «Svoboda», www.svoboda.kg укук коргоо сайтынын негиздөөчүсү
                            </li>
                            <li class="list-group-item">
                              «Институт Медиа Полиси» коомдук фондунун уюштуруучусу
                            </li>
                            <li class="list-group-item">
                              «Институт Консалтинга и Права» коомдук фондунун уюштуруучусу
                            </li>
                            <li class="list-group-item">
                              «Де-Факто»  гезитинин уюштуруучусу
                            </li>
                          </ul>
                        </li>
                        <li class="list-group-item">
                          Коомдук иштери
                          <ul class="list-group second-level">
                            <li class="list-group-item">
                              Бишкек шаары жана Чүй облусунун адвокаттар  коллегиясынын мүчөсү
                            </li>
                            <li class="list-group-item">
                              Бишкек пресс-клубунун мүчөсү
                            </li>
                            <li class="list-group-item">
                              Маалымдоо каражаттарына келген арыздарды кароочу комиссия мүчөсү
                            </li>
                            <li class="list-group-item">
                              Сорос-Кыргызстан фондунун башкармалыгынын мүчөсү
                            </li>
                            <li class="list-group-item">
                              КТРК көркөм кеңешинин мүчөсү
                            </li>
                            <li class="list-group-item">
                              КР маданият жана маалымат министрлигинин алдындагы “Телекорсөтүү жана радиоуктуруулар жөнүндө” мыйзамдаргаөзгөртүүлөр жана оңдоолорду иштеп чыгуу боюнча жумушчу топтун мүчөсү
                            </li>
                            <li class="list-group-item">
                              КТРКны реформалоо боюнча жумушчу топтун төрагасы
                            </li>
                            <li class="list-group-item">
                              Адам укуктары жана эл аралык укуктар боюнча эксперт
                            </li>
                            <li class="list-group-item">
                              КР президент  институтун реформалоо боюнча жумушчу топтун мүчөсү
                            </li>
                            <li class="list-group-item">
                              Санариптик берүүгө өтүү боюнча мамлекеттик программаны иштеп чыгуу жумушчу тобунун төрагасы
                            </li>
                            <li class="list-group-item">
                              КР өкмөтүн реформалоо боюнча жумушчу топтун мүчөсү
                            </li>
                            <li class="list-group-item">
                              КР жаштар саясатын өнүктүрүү стратегиясын иштеп чыгуу боюнча жумушчу топтун төрагасы
                            </li>
                            <li class="list-group-item">
                              КР Коомдук телерадиоберүү корпорациясынын Байкоочу кеңешинин төрагасы
                            </li>
                          </ul>
                        </li>
                      @elseif($lc == 'ru')
                        <li class="list-group-item">
                          Личная Информация
                          <ul class="list-group second-level">
                            <li class="list-group-item">
                              Дата рождения: 13  августа 1979 года.
                            </li>
                          </ul>
                        </li>
                        <li class="list-group-item">
                          Образование
                          <ul class="list-group second-level">
                            <li class="list-group-item">
                              <span class="list-extra">2001-г.</span>
                              <span class="list-info">С отличием окончил юридический факультет Кыргызского Государственного Национального университета, г.Бишкек.</span>
                            </li>
                            <li class="list-group-item">
                              <span class="list-extra">2007-г.</span>
                              <span class="list-info">окончил Высшую международную школу по правам человека, Польша/Варшава</span>
                            </li>
                          </ul>
                        </li>
                        <li class="list-group-item">
                          Трудовая деятельность
                          <ul class="list-group second-level">
                            <li class="list-group-item">
                              <span class="list-extra">1997-1999гг.</span>
                              <span class="list-info">Президент, Студенческое Научное Общество «Ренессанс», Бишкек</span>
                            </li>
                            <li class="list-group-item">
                              <span class="list-extra">Январь 1999-г. - июнь 2000-г. </span>
                              <span class="list-info">Юрист, ОсОО «BNS - Securities», Бишкек</span>
                            </li>
                            <li class="list-group-item">
                              <span class="list-extra">Июнь 2000-г. - июнь 2001-г.</span>
                              <span class="list-info">Сотрудник правовых программ, Фонд Сорос-Кыргызстан, Бишкек</span>
                            </li>
                            <li class="list-group-item">
                              <span class="list-extra">Июнь 2001-г. - октябрь 2001-г. </span>
                              <span class="list-info">Национальный волонтер ООН, Программа развития ООН, Кочкорский район </span>
                            </li>
                            <li class="list-group-item">
                              <span class="list-extra">Февраль 2002-г. - январь 2003-г.  </span>
                              <span class="list-info">Сотрудник программ «Общественное управление», «Этнические меньшинства», «Выработка общественной политики»,  Фонд «Сорос-Кыргызстан», Бишкек</span>
                            </li>
                            <li class="list-group-item">
                              <span class="list-extra">Январь 2003-г. - 2004-г.</span>
                              <span class="list-info">юрист в правовом проекте «LARC», Кара-Балта</span>
                            </li>
                            <li class="list-group-item">
                              <span class="list-extra">Июль 2003-г.</span>
                              <span class="list-info">Лицензия на право занятия адвокатской деятельностью № 1051, Бишкек</span>
                            </li>
                            <li class="list-group-item">
                              <span class="list-extra">Январь 2004-г. - июнь 2004-г.</span>
                              <span class="list-info">Директор филиала ОО «ЛАРК», Тюпский район </span>
                            </li>
                            <li class="list-group-item">
                              <span class="list-extra">Июнь 2004–г. - июнь 2006–г.</span>
                              <span class="list-info">Старший юрист Института Медиа Представителя / Интерньюс-Кыргызстан.</span>
                            </li>
                            <li class="list-group-item">
                              <span class="list-extra">Июнь 2006-г. - по настоящее время </span>
                              <span class="list-info">Преподаватель (Гражданское и Трудовое право, Правовые основы НПО),  Академия управления при Президенте КР</span>
                            </li>
                            <li class="list-group-item">
                              <span class="list-extra">Июнь 2006-г. - февраль 2009-г.</span>
                              <span class="list-info">Директор Общественного фонда «Институт медиа-представителя»</span>
                            </li>
                            <li class="list-group-item">
                              <span class="list-extra">Июнь 2008-г. - февраль 2009-г.</span>
                              <span class="list-info">Медиа-представитель (омбудсмен) в КР</span>
                            </li>
                            <li class="list-group-item">
                              <span class="list-extra">Февраль 2009-г. - октябрь 2009-г.  </span>
                              <span class="list-info">Референт Секретариата Президента Кыргызской Республики</span>
                            </li>
                            <li class="list-group-item">
                              <span class="list-extra">Октябрь 2009-г. - апрель 2010-г. </span>
                              <span class="list-info">Руководитель Службы взаимодействия,  Секретариат Президента Кыргызской Республики</span>
                            </li>
                            <li class="list-group-item">
                              <span class="list-extra">Февраль 2011-г. - июль 2011-г. </span>
                              <span class="list-info">Заместитель генерального директора ЗАО «Альфа Телеком» по правовым вопросам</span>
                            </li>
                            <li class="list-group-item">
                              <span class="list-extra">Апрель 2010-г.</span>
                              <span class="list-info">Директор Общественного фонда «Институт консалтинга и права»</span>
                            </li>
                            <li class="list-group-item">
                              <span class="list-extra">Апрель 2010-г.</span>
                              <span class="list-info">Директор консалтинговой компании «Ин.Консалт»</span>
                            </li>
                            <li class="list-group-item">
                              <span class="list-extra">Апрель 2010-г. - 2013-г.</span>
                              <span class="list-info">Преподаватель (адвокатура, юридическая клиника,  предпринимательское право), Американский университет в Центральной Азии</span>
                            </li>
                            <li class="list-group-item">
                              <span class="list-extra">Июль 2011-г. - февраль 2012-г.</span>
                              <span class="list-info">Внешний управляющий ЗАО «Альфа Телеком», Министерство государственного имущества Кыргызской Республики</span>
                            </li>
                            <li class="list-group-item">
                              <span class="list-extra">Октябрь 2011-г. - по настоящее время </span>
                              <span class="list-info">Старший преподаватель (Судопроизводство по  экономическим делам, Инвестиционное право), Кыргызскаяой государственная юридическая академия</span>
                            </li>
                            <li class="list-group-item">
                              <span class="list-extra">Апрель 2013-г. - по настоящее время</span>
                              <span class="list-info">Советник президента,  ОАО «Международный аэропорт «Манас»</span>
                            </li>
                            <li class="list-group-item">
                              <span class="list-extra">Февраль 2015-г.</span>
                              <span class="list-info">Исполняющий обязанности генерального директора КТРК</span>
                            </li>
                            <li class="list-group-item">
                              <span class="list-extra">Март 2015-г. - по настоящее время</span>
                              <span class="list-info">Генеральный директор КТРК</span>
                            </li>
                          </ul>
                        </li>
                        <li class="list-group-item">
                          Дополнительная информация
                          <ul class="list-group second-level">
                            <li class="list-group-item">
                              Основатель Информационного агентства «K-News», www.knews.kg
                            </li>
                            <li class="list-group-item">
                              Основатель Правозащитного сайта «Svoboda», www.svoboda.kg
                            </li>
                            <li class="list-group-item">
                              Учредитель Общественного фонда «Институт Медиа Полиси»
                            </li>
                            <li class="list-group-item">
                              Учредитель Общественного фонда «Институт Консалтинга и Права»
                            </li>
                            <li class="list-group-item">
                              Учредитель газеты «Де-Факто»
                            </li>
                          </ul>
                        </li>
                        <li class="list-group-item">
                          Общественная деятельность
                          <ul class="list-group second-level">
                            <li class="list-group-item">
                              Член Коллегии адвокатов Чуйской области и г. Бишкек
                            </li>
                            <li class="list-group-item">
                              Член Бишкекского пресс-клуба
                            </li>
                            <li class="list-group-item">
                              Член Комиссии по рассмотрению жалоб на СМИ
                            </li>
                            <li class="list-group-item">
                              Член правления Фонда Сорос-Кыргызстан
                            </li>
                            <li class="list-group-item">
                              Член Художественного совета НТРК
                            </li>
                            <li class="list-group-item">
                              Член рабочей группы по разработке законопроекта о внесении изменений и дополнений в Закон. КР «О телевидении и радиовещании» при Министерстве культуры и информации КР
                            </li>
                            <li class="list-group-item">
                              Председатель Рабочей комиссии по реформированию НТРК
                            </li>
                            <li class="list-group-item">
                              Эксперт по правам человека и международному праву
                            </li>
                            <li class="list-group-item">
                              Член рабочей группы по реформированию Института Президента Кыргызской Республики
                            </li>
                            <li class="list-group-item">
                              Председатель рабочей группы по разработке Государственной программы по переходу на цифровое вещание
                            </li>
                            <li class="list-group-item">
                              Член рабочей группы по реформированию Правительства Кыргызской Республики
                            </li>
                            <li class="list-group-item">
                              Председатель рабочей группы по разработке Стратегии развития молодежной политики Кыргызской Республики
                            </li>
                            <li class="list-group-item">
                              Председатель Наблюдательного совета Общественной телерадиовещательной корпорации КР
                            </li>
                          </ul>
                        </li>
                      @endif
                    </ul>
                  </div>
                  <div class="panel-heading">
                    <h3 class="panel-title"><span>{{ trans('site.Top news') }}</span></h3>
                  </div>
                  <div class="panel-body">
                    @if($directorPosts)
                      @foreach($directorPosts as $post)
                        <div class="media">
                          <div class="media-left">
                            <a href="{{ route('front.pages.directorPost', $post)}}">
                              <img class="media-object thumb" src="@if(!($post->getFile()))images/live_bg.png @else {{ asset($post->getFile()) }} @endif" alt="image">
                            </a>
                          </div>
                          <div class="media-body">
                            <div class="extra">
                              <span class="e-datetime">{{ $post->getDay() }} , {{ $post->getMonthRu() }}, {{ $post->getTime()}}</span>
                              <span class="e-views"><i class="fa fa-eye"></i>{{ $post->getViewed() }}</span>
                            </div>
                            <a class="media-heading" href="{{ route('front.pages.directorPost', $post)}}">{{ $post->getTitleRuOrKg() }}</a>
                            <h5 class="media-desc">
      <!--                         <p>Кабинет, как у бизнесмена средней руки. Нет ни мебели красного дерева, как в вотчинах других чиновников высокого ранга, ни канцелярского набора из бирюзы. Из роскоши — 6 плазменных телевизоров на стене. Под столом склад жестянок с безалкогольным энергетиком.
                              </p> -->
                            </h5>
                          </div>
                        </div>
                      @endforeach
                    @endif
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div id="right-sidebar" class="top-right-block col-md-4">
          <div class="panel panel-default panel-page-sidebar">
            <div class="panel-heading">
              <h3 class="panel-title"><span>Твиттер</span></h3>
            </div>
            <div class="panel-body">
              <a class="twitter-timeline" href="https://twitter.com/ilimkm" data-widget-id="680338148379996160">Твиты от @ilimkm</a>
              <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
            </div>
            <div class="panel-heading">
              <h3 class="panel-title"><span>Facebook</span></h3>
            </div>
            <div class="panel-body">
              @if($fbpost != null)
                @foreach($fbpost as $post)
                  <div class="fb-post" data-href="https://www.facebook.com/{{$post->title}}" data-width="300">
                  </div>
                @endforeach
              @endif
            </div>
          </div>
        </div>
      </section>
    </div>
  </div>
@endsection
@section('footerScript')
  <div id="fb-root"></div>
  <script>(function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = "//connect.facebook.net/ru_RU/sdk.js#xfbml=1&version=v2.5&appId=977320525631518";
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
  </script>
  <script src="{{ asset('js/custombox.js') }}"></script>
  <script>
    var finished_rendering = function() {
      var height = $('#right-sidebar').height()+37;
      $('#main-content .panel-articles').css('min-height',height);
    }

    $(window).load(function() {
      FB.Event.subscribe('xfbml.render', finished_rendering);
    });
  </script>
@endsection