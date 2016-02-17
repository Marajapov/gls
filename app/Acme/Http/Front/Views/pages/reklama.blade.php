@extends('Front::layouts.default')
@section('title', trans('site.Reklama')." | КТРК")


@section('styles')
  <link rel="stylesheet" href="{{ asset('css/pages.css') }}"/>
@endsection

@section('content')

  <div class="container main-wrapper">

    <div class="row">
      <section class="content clearfix">
        <div class="panel panel-default panel-reklama">
          <div class="panel-heading">
            <h3 class="panel-title">{{ trans('site.Reklama') }}</h3>
          </div>
          <div class="panel-body">

            @if($lc=='kg')
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>Жарнак кабыл алынат</th>
                    <th>Кызмат көрсөтүү</th>
                    <th>Жарнак берүү</th>
                    <th>Байланыш:</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>Коомдук биринчи канал</td>
                    <td>Аудио-видео материал даярдоо</td>
                    <td>Жарнамалык ролик (аудио/видео)</td>
                    <td>Бишкек ш., Жаш Гвардия бульвары 59. ,1-каб., 10,7,5- кабинеттер</td>
                  </tr>
                  <tr>
                    <td>"Биринчи радио"</td>
                    <td>Техниканы ижарага берүү</td>
                    <td>Жүгүртмө сап</td>
                    <td>ТV/RV менеджер – 0312 648581, 0312 649158</td>
                  </tr>
                  <tr>
                    <td>"Кыргыз радиосу"</td>
                    <td>Эфирдик убакытты сатуу</td>
                    <td>PR-сюжет</td>
                    <td>Жүгүртмө сап боюнча менеджер - 0312 654111</td>
                  </tr>
                  <tr>
                    <td>"Миң-Кыял FM"</td>
                    <td>Видеоматериалдарды сатуу</td>
                    <td>Аба ырайына демөөрчү</td>
                    <td>Е-mail: <a href="mailto:reklama.otrk@gmail.com">reklama.otrk@gmail.com</a></td>
                  </tr>
                </tbody>
              </table>

              <div class="price">
                <p>Жарнамалык маалыматты эфирге берүү боюнча баалар</p>
                <a target="_blank" href="{{ asset('static/files/reklama/prays-list-prays-2015g_0.pdf') }}">
                  <i class="fa fa-file-pdf-o"></i>
                  <span>
                    Прайс-баракты жүктөө
                  </span>
                </a>
              </div>

            @else

              <table class="table table-bordered">
                <thead>
                <tr>
                  <th>Прием рекламы: </th>
                  <th>Услуги</th>
                  <th>Виды рекламы:</th>
                  <th>Контакты</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                  <td>Общественный первый канал</td>
                  <td>Создание аудио и видео-роликов</td>
                  <td>Рекламный ролик (аудио/видео</td>
                  <td>г. Бишкек, Молодая Гвардия 59, 1эт., 10,7,5 каб.</td>
                </tr>
                <tr>
                  <td>"Биринчи радио"</td>
                  <td>Аренда техники</td>
                  <td>Бегущая строка</td>
                  <td>ТV/RV менеджер – 0312 648581,  0312 649158</td>
                </tr>
                <tr>
                  <td>"Кыргыз радио"</td>
                  <td>Продажа видеоматериала</td>
                  <td>PR-сюжеты</td>
                  <td>Бегущая строка - 0312 654111</td>
                </tr>
                <tr>
                  <td>"Мин-Кыял FM"</td>
                  <td>Продажа эфирного времени</td>
                  <td>Спонсорство прогноза погоды </td>
                  <td>Е-mail: <a href="mailto:reklama.otrk@gmail.com">reklama.otrk@gmail.com</a></td>
                </tr>
                </tbody>
              </table>

              <div class="price">
                <p>Прайс – лист на размещение Рекламно Информационных Материалов на 2015-г.</p>
                <a target="_blank" href="{{ asset('static/files/reklama/prays-list-prays-2015g_0.pdf') }}">
                  <i class="fa fa-file-pdf-o"></i>
                  <span>
                    Прайс-баракты жүктөө
                  </span>
                </a>
              </div>

            @endif
          </div>

          <div class="panel-heading">
            <h3 class="panel-title">{{ trans('site.ReklamaRent') }}</h3>
          </div>
          <div class="panel-body tech-price">
            @if($lc=='kg')
              <p>Прайс –барак. Саатына кошумча нарк салыгы эске алынат.</p>
              <p>Техникалык каражаттардын баасы 1 саат үчүн, сом менен көрсөтүлгөн.</p>

              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>№</th>
                    <th>Баалар</th>
                    <th>Техникалык каражаттардын тизмеси:</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>1</td>
                    <td>14881,34</td>
                    <td>КТС (Көчмө телевизиондук станция) Ford Tranzit</td>
                  </tr>
                  <tr>
                    <td>2</td>
                    <td>9329,49</td>
                    <td>КТС "Магнолия" 83-А №79</td>
                  </tr>
                  <tr>
                    <td>3</td>
                    <td>12951,21</td>
                    <td>КТС "Магнолия" 83-А №66</td>
                  </tr>
                  <tr>
                    <td>4</td>
                    <td>429,31</td>
                    <td>ВСТиР аппараттык кабылдамасы</td>
                  </tr>
                  <tr>
                    <td>5</td>
                    <td>3 119,55</td>
                    <td>Тонваген (Үн көчмө авто)</td>
                  </tr>
                  <tr>
                    <td>6</td>
                    <td>1697,79</td>
                    <td>MPEG видеокамерасы</td>
                  </tr>
                  <tr>
                    <td>7</td>
                    <td>1399,49</td>
                    <td>Sony HXR-NX5E видеокамерасы</td>
                  </tr>
                  <tr>
                    <td>8</td>
                    <td>17891,80</td>
                    <td>№1 Борбордук аппарат</td>
                  </tr>
                  <tr>
                    <td>9</td>
                    <td>1927,72</td>
                    <td>№2 Борбордук аппарат</td>
                  </tr>
                  <tr>
                    <td>10</td>
                    <td>28563,99</td>
                    <td>С-120 студиясы</td>
                  </tr>
                  <tr>
                    <td>11</td>
                    <td>9006,62</td>
                    <td>"Ала-Тоо" эфирдик аппараты</td>
                  </tr>
                  <tr>
                    <td>12</td>
                    <td>28998,15</td>
                    <td>С-600-1 студиясы</td>
                  </tr>
                  <tr>
                    <td>13</td>
                    <td>28714,07</td>
                    <td>С-600-2 студиясы</td>
                  </tr>
                  <tr>
                    <td>14</td>
                    <td>4940,32</td>
                    <td>С-600-1 студиясы (жазуусуз)</td>
                  </tr>
                  <tr>
                    <td>15</td>
                    <td>3494,12</td>
                    <td>С-600-2 студиясы (жазуусуз)</td>
                  </tr>
                  <tr>
                    <td>16</td>
                    <td>5215,31</td>
                    <td>АСБ-3 "Замананын" студиясы</td>
                  </tr>
                  <tr>
                    <td>17</td>
                    <td>5379,54</td>
                    <td>РРЛ ( эфирдик аппарат менен)</td>
                  </tr>
                  <tr>
                    <td>18</td>
                    <td>733,17</td>
                    <td>Телекинопроекция</td>
                  </tr>
                  <tr>
                    <td>19</td>
                    <td>1539,93</td>
                    <td>"MPEG IMX" АВМ-12 монтаждык аппараты</td>
                  </tr>
                  <tr>
                    <td>20</td>
                    <td>4199,07</td>
                    <td>"MPEG IMX" АВМ-17 монтаждык аппараты</td>
                  </tr>
                  <tr>
                    <td>21</td>
                    <td>1608,66</td>
                    <td>"MPEG IMX" АВМ-18 монтаждык аппараты</td>
                  </tr>
                  <tr>
                    <td>22</td>
                    <td>359,97</td>
                    <td>АВМ-22 "mini DV, DVCAM,DVD монтаждоо</td>
                  </tr>
                  <tr>
                    <td>23</td>
                    <td>3811,54</td>
                    <td>АВМ-28 кайра форматтоо аппараты</td>
                  </tr>
                  <tr>
                    <td>24</td>
                    <td>498,92</td>
                    <td>"Замана" студиясынын монтаждык аппараты</td>
                  </tr>
                  <tr>
                    <td>25</td>
                    <td>526,22</td>
                    <td>"Доолот" студиясынын үн жаздыруу жана үн коштоо аппараты</td>
                  </tr>
                  <tr>
                    <td>26</td>
                    <td>1938,80</td>
                    <td>Радиоберүүнүн борбордук аппараты</td>
                  </tr>
                  <tr>
                    <td>27</td>
                    <td>849,21</td>
                    <td>№1 РВ аппараты</td>
                  </tr>
                  <tr>
                    <td>28</td>
                    <td>798,19</td>
                    <td>№2 РВ аппараты</td>
                  </tr>
                  <tr>
                    <td>29</td>
                    <td>553,00</td>
                    <td>№3 РВ аппараты</td>
                  </tr>
                  <tr>
                    <td>30</td>
                    <td>581,66</td>
                    <td>№5 РВ аппараты</td>
                  </tr>
                  <tr>
                    <td>31</td>
                    <td>1014,08</td>
                    <td>№6 РВ аппараты</td>
                  </tr>
                  <tr>
                    <td>32</td>
                    <td>960,58</td>
                    <td>№7 РВ аппараты</td>
                  </tr>
                  <tr>
                    <td>33</td>
                    <td>553,71</td>
                    <td>№8 РВ аппараты</td>
                  </tr>
                  <tr>
                    <td>34</td>
                    <td>309,47</td>
                    <td>КРОСС</td>
                  </tr>
                  <tr>
                    <td>35</td>
                    <td>725,74</td>
                    <td>Чоң концерттик студияны берүү</td>
                  </tr>
                  <tr>
                    <td>36</td>
                    <td>652,06</td>
                    <td>Кичине концерттик студияны берүү</td>
                  </tr>
                  <tr>
                    <td>37</td>
                    <td>1088,01</td>
                    <td>Литдрамблокту берүү</td>
                  </tr>
                  <tr>
                    <td>38</td>
                    <td>350,28</td>
                    <td>Үн жаздыруу цехинин монтаждык аппараты</td>
                  </tr>
                  <tr>
                    <td>39</td>
                    <td>298,58</td>
                    <td>Эфирдик материалдарды санарипке салуу монтажы</td>
                  </tr>
                  <tr>
                    <td>40</td>
                    <td>486,54</td>
                    <td>СD, DVD-дисктерге, МД, МК жана флешкага көчүрүп берүү</td>
                  </tr>
                </tbody>
              </table>

            @else
              <p>Прайс – лист</p>
              <p>за 1 час с учетом НДС и НсП с 1 апреля 2013г. по 31 марта 2014г. ( сом )</p>

              <table class="table table-bordered">
                <thead>
                <tr>
                  <th>№</th>
                  <th>Цены</th>
                  <th>Список технических и аппаратных средств:</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                  <td>1</td>
                  <td>14881,34</td>
                  <td>ПТС (передвижная телевизионная станция) Ford Tranzit</td>
                </tr>
                <tr>
                  <td>2</td>
                  <td>9329,49</td>
                  <td>ПТС "Магнолия" 83-А №79</td>
                </tr>
                <tr>
                  <td>3</td>
                  <td>12951,21</td>
                  <td>ПТС "Магнолия" 83-А №66</td>
                </tr>
                <tr>
                  <td>4</td>
                  <td>429,31</td>
                  <td>Приемная аппаратная ВСТиР</td>
                </tr>
                <tr>
                  <td>5</td>
                  <td>3 119,55</td>
                  <td>Тонваген (Автозвукопередвижка)</td>
                </tr>
                <tr>
                  <td>6</td>
                  <td>1697,79</td>
                  <td>Видеокамера MPEG</td>
                </tr>
                <tr>
                  <td>7</td>
                  <td>1399,49</td>
                  <td>Видеокамера Sony HXR-NX5E</td>
                </tr>
                <tr>
                  <td>8</td>
                  <td>17891,80</td>
                  <td>Центральная аппаратная №1</td>
                </tr>
                <tr>
                  <td>9</td>
                  <td>1927,72</td>
                  <td>Центральная аппаратная №2</td>
                </tr>
                <tr>
                  <td>10</td>
                  <td>28563,99</td>
                  <td>Студия С-120</td>
                </tr>
                <tr>
                  <td>11</td>
                  <td>9006,62</td>
                  <td>Эфирная аппаратная "Ала-Тоо"</td>
                </tr>
                <tr>
                  <td>12</td>
                  <td>28998,15</td>
                  <td>Студия С-600-1</td>
                </tr>
                <tr>
                  <td>13</td>
                  <td>28714,07</td>
                  <td>Студия С-600-2</td>
                </tr>
                <tr>
                  <td>14</td>
                  <td>4940,32</td>
                  <td>Студия С-600-1 (без записи))</td>
                </tr>
                <tr>
                  <td>15</td>
                  <td>3494,12</td>
                  <td>Студия С-600-2 (без записи)</td>
                </tr>
                <tr>
                  <td>16</td>
                  <td>5215,31</td>
                  <td>Студия АСБ-3 "Замана"</td>
                </tr>
                <tr>
                  <td>17</td>
                  <td>5379,54</td>
                  <td>РРЛ (м-у эфирными аппаратными)</td>
                </tr>
                <tr>
                  <td>18</td>
                  <td>733,17</td>
                  <td>Телекинопроекционная</td>
                </tr>
                <tr>
                  <td>19</td>
                  <td>1539,93</td>
                  <td>Монтажная аппаратная "MPEG IMX" АВМ-12</td>
                </tr>
                <tr>
                  <td>20</td>
                  <td>4199,07</td>
                  <td>Монтажная аппаратная "MPEG IMX" АВМ-17</td>
                </tr>
                <tr>
                  <td>21</td>
                  <td>1608,66</td>
                  <td>Монтажная аппаратная "MPEG IMX" АВМ-18</td>
                </tr>
                <tr>
                  <td>22</td>
                  <td>359,97</td>
                  <td>Монтажная АВМ-22 "mini DV, DVCAM,DVD</td>
                </tr>
                <tr>
                  <td>23</td>
                  <td>3811,54</td>
                  <td>Аппаратная переформатации АВМ-28</td>
                </tr>
                <tr>
                  <td>24</td>
                  <td>498,92</td>
                  <td>Монтажные аппаратные студии "Замана"</td>
                </tr>
                <tr>
                  <td>25</td>
                  <td>526,22</td>
                  <td>Аппаратные дубляжа и озвучивания "Доолот"</td>
                </tr>
                <tr>
                  <td>26</td>
                  <td>1938,80</td>
                  <td>Центральная аппаратная Радиовещания</td>
                </tr>
                <tr>
                  <td>27</td>
                  <td>849,21</td>
                  <td>Аппаратная №1 РВ</td>
                </tr>
                <tr>
                  <td>28</td>
                  <td>798,19</td>
                  <td>Аппаратная №2 РВ</td>
                </tr>
                <tr>
                  <td>29</td>
                  <td>553,00</td>
                  <td>Аппаратная №3 РВ</td>
                </tr>
                <tr>
                  <td>30</td>
                  <td>581,66</td>
                  <td>Аппаратная №5 РВ</td>
                </tr>
                <tr>
                  <td>31</td>
                  <td>1014,08</td>
                  <td>Аппаратная №6 РВ</td>
                </tr>
                <tr>
                  <td>32</td>
                  <td>960,58</td>
                  <td>Аппаратная №7 РВ</td>
                </tr>
                <tr>
                  <td>33</td>
                  <td>553,71</td>
                  <td>Аппаратная №8 РВ</td>
                </tr>
                <tr>
                  <td>34</td>
                  <td>309,47</td>
                  <td>КРОСС</td>
                </tr>
                <tr>
                  <td>35</td>
                  <td>725,74</td>
                  <td>Эксплуатация большой концертной студии (БКС)</td>
                </tr>
                <tr>
                  <td>36</td>
                  <td>652,06</td>
                  <td>Эксплуатация малой концертной студии (МКС)</td>
                </tr>
                <tr>
                  <td>37</td>
                  <td>1088,01</td>
                  <td>Эксплуатация Литдрамблока</td>
                </tr>
                <tr>
                  <td>38</td>
                  <td>350,28</td>
                  <td>Монтажная аппаратная цеха звукозаписи</td>
                </tr>
                <tr>
                  <td>39</td>
                  <td>298,58</td>
                  <td>Монтажная оцифровки эфирных материалов</td>
                </tr>
                <tr>
                  <td>40</td>
                  <td>486,54</td>
                  <td>Перезапись на СD, DVD-диски, МД, МК и флешку</td>
                </tr>
                </tbody>
              </table>
            @endif
          </div>
        </div>
      </section>

    </div>
  </div>
@endsection


@section('footerScript')
@endsection