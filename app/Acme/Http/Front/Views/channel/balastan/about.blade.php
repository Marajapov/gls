@extends('Front::channel.balastan.default')
@section('title', trans('radiopages.BAbout'))
@section('styles')
@endsection
@section('content')
<div class="container-fluid pages-header">
   <div class="row">
      @include('Front::channel.balastan.nav')
      <div class="container pages-title">
         <div class="row">
            <div class="title col-md-12">
               <h3>{{ trans('radiopages.BAbout') }}</h3>
            </div>
         </div>
      </div>
   </div>
</div>
<div class="container-fluid aboutbtn">
   <div class="row">
      <div class="container">
         <div class="row">
            <div class="col-md-12">
               <p>“Баластан” каналы 2013-жылы 1- октябрда ачылып, мектеп жашына чейинки жана мектептин башталгыч ошондой эле ортоңку класстарында окуган балдарга арналган республикадагы биринчи  канал,  күн сайын кыргыз жана орус тилдериндеги  (70% кыргыз, 30% орустилинде) билим,  таалим-тарбиялык мааниси  бар  программалар, кинолор, мультфильмдер көрсөтүлөт.</p>
               <p>Программалардын контенти 6 саатка түзүлүп, 7:00дон 00:00го чейинки убакытар алыгында  3 жолукайталанып кичинекей көрөрмандарга сунушталат. Ошондой эле балдар каналы  бир гана балдар үчүн эмес,  ата-энелер үчүн  да  маанилүү маалымат булагы болуп саналат</p>
            </div>
            <div class="col-md-12">
               <p>“Баластан” - счастливый смех детей и радость в каждую семью!
                  Вещает по кабельным каналам в Чуйской области, в социальном пакете цифрового вещания “Кыргызтелеком” в Ошской и Джалал-Абадской области. С января 2014 года канал начал показывать в Баткенской области.  
               </p>
            </div>
         </div>
      </div>
   </div>
</div>
@stop
@section('footerscript2')
@stop