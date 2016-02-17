@extends('Front::layouts.default')
@section('title', trans('site.Managers')." | КТРК")
@section('styles')
  <link rel="stylesheet" href="{{ asset('css/pages.css') }}"/>
@endsection

@section('content')
  <div class="container main-wrapper">
    <div class="row">
      <section class="content clearfix">
        <div class="clearfix">
          <div class="top-left-block col-md-12">
            <div class="panel panel-default panel-managers">
              <div class="panel-heading">
                <h3 class="panel-title">
                  <a href="{{ route('front.pages.leaders') }}">{{ trans('site.Managers') }}</a>
                  <span class="divider">
                    <i class="fa fa-circle"></i>
                  </span>
                  @if($leader == '1')
                    <span>Карыпбеков Илим Майрамбекович</span>
                  @elseif($leader == '2')
                    <span>Асылбашев Калыйбек Шаршеналиевич</span>
                  @elseif($leader == '3')
                    <span>Иманалиев Кайрат Олжобаевич</span>
                  @elseif($leader == '4')
                    <span>Алиев Бактияр Жеңишбекович</span>
                  @endif
                </h3>
              </div>
              <div class="panel-body">

                <ul class="list-group first-level">
                  @if($leader == 1)
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
                          <span class="list-info">КТРКнын башкы директордун милдетин аткаруучу</span>
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
                  @elseif($leader == 2)
                    <li class="list-group-item">
                      Жеке Маалымат
                      <ul class="list-group second-level">
                        <li class="list-group-item">
                          1968-жылы 11-июлда туулган.
                        </li>
                        <li class="list-group-item">
                          Үй-бүлөлүү, 4 баланын атасы
                        </li>
                      </ul>
                    </li>
                    <li class="list-group-item">
                      Мамлекеттик сыйлыктары, наамдар
                      <ul class="list-group second-level">
                        <li class="list-group-item">
                          Мамлекеттик кызматтарда 1–класстагы кеңешчи
                        </li>
                        <li class="list-group-item">
                          КР Президентинин “Алтын Калем” дипломунун ээси
                        </li>
                        <li class="list-group-item">
                          КР Ардак грамотасын 2007–жылы  алган
                        </li>
                      </ul>
                    </li>
                    <li class="list-group-item">
                      Билими
                      <ul class="list-group second-level">
                        <li class="list-group-item">
                          <span class="list-extra">2001- ж.</span>
                          <span class="list-info">Москвадагы ишкердик жана укук институтунун Бишкектеги филиалын артыкчылык диплому менен аяктаган.</span>
                        </li>
                        <li class="list-group-item">
                          <span class="list-extra">2010-ж.</span>
                          <span class="list-info">Кыргыз Республикасынын президентинин алдындагы башкаруу академиясынын мамлекеттик башкаруу менеджер адистигине ээ болгон.</span>
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
                          <span class="list-info">КТРКнын башкы директордун милдетин аткаруучу</span>
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
                  @else
                  @endif
                </ul>

              </div><!-- end panel body-->
            </div>

          </div>
        </div>
      </section>
    </div>
  </div>
@stop