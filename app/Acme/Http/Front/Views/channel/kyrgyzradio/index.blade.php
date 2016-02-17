@extends('Front::channel.kyrgyzradio.default')
@section('title', "Кыргыз Радиосу")
@section('styles')
@endsection
@section('content')
@include('Front::channel.kyrgyzradio.nav')

<div id="kyrgyzhome" class="container">
   <section id="main-slider">
      @if($anons->first())
      <div class="owl-carousel">
         @foreach($anons as $row)
         <div class="item">
            <img src="{{asset($row->thumbnail)}}" height="358" width="1600" alt="">
            <div class="slider-inner">
               <div class="container">
                  <div class="row">
                     <div class="col-sm-6">
                        <div class="carousel-content">
                           <h2><span>{{ $row->getNameOne() }}</span></h2>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <!--/.item-->
         @endforeach
      </div>
      <!--/.owl-carousel-->
      @endif
   </section>
   <!--/#main-slider-->
   <section id="cta2">
      <div class="container">
         <div class="text-center">
            <h2 class="wow fadeInUp" data-wow-duration="300ms" data-wow-delay="0ms"><span>Кыргыз радиосу</span> - жан дүйнөнүн азыгы </h2>
            <p class="wow fadeInUp" data-wow-duration="300ms" data-wow-delay="100ms">“Кыргыз радиосу көөнөрбөс мурастар казынасы</p>
         </div>
      </div>
   </section>
   <section id="cta" class="wow fadeIn">
      <div class="row">
         <div class="col-md-6">
               @if($quoteTopLeft)          
               <div id="nt-example2-container">                 
                   <ul id="nt-example2">
                     @foreach($quoteTopLeft as $top)
                       <li data-infos="{{ $top->getDesc() }} ">
                       <i class="fa fa-quote-left"></i>
                        <i class="fa fa-fw fa-play state"></i>
                        <span class="author"><img src="{{asset($top->file)}}" alt=""></span>
                        <span class="name">                           
                           {{ $top->getAuthor() }}
                        </span>
                       </li>
                     @endforeach
                   </ul>
                   <div id="nt-example2-infos-container">
                      <div id="nt-example2-infos-triangle"></div>
                      <div id="nt-example2-infos" class="row">
                        <div class="col-xs-4">
                           <div class="infos-author">                                            
                              <img src="{{asset($quoteTopLeft->first()->file)}}" alt=""> 
                           </div>
                           <i class="fa fa-arrow-left" id="nt-example2-prev"></i>
                           <i class="fa fa-arrow-right" id="nt-example2-next"></i>
                        </div>
                        <div class="col-xs-8"> 
                           <span class="name">{{ $top->getAuthor() }}</span>                             
                           <span class="qicon"></span>   
                           <div class="infos-text"></i> {{ $top->getDesc() }}</div>                        
                        </div>
                      </div>
                   </div>                
               </div>           
               @endif 
         </div>   
         <div class="col-md-6"> 
              @if($quoteTopRight)          
            <div id="nt-example21-container">                 
                <ul id="nt-example21">
                  @foreach($quoteTopRight as $top)
                    <li data-infos="{{ $top->getDesc() }} ">
                    <i class="fa fa-quote-left"></i>
                     <i class="fa fa-fw fa-play state"></i>
                     <span class="author"><img src="{{asset($top->file)}}" alt=""></span>
                     <span class="name">                           
                        {{ $top->getAuthor() }}
                     </span>
                    </li>
                  @endforeach
                </ul>
                <div id="nt-example21-infos-container">
                   <div id="nt-example21-infos-triangle"></div>
                   <div id="nt-example21-infos" class="row">
                     <div class="col-xs-4">
                        <div class="infos-author">                                            
                           <img src="{{asset($quoteTopRight->first()->file)}}" alt=""> 
                        </div>
                        <i class="fa fa-arrow-left" id="nt-example21-prev"></i>
                        <i class="fa fa-arrow-right" id="nt-example21-next"></i>
                     </div>
                     <div class="col-xs-8"> 
                        <span class="name">{{ $top->getAuthor() }}</span>                             
                        <span class="qicon"></span>   
                        <div class="infos-text"></i> {{ $top->getDesc() }}</div>                        
                     </div>
                   </div>
                </div>                
            </div>           
            @endif 
        
         </div>
      </div>
   </section>
   <!--/#cta-->
   <section id="services" >
      <div class="container">
         <div class="section-header">
            <h2 class="section-title text-center wow fadeInDown">Уктуруулар</h2>
         </div>
         <div class="row">
            <div class="features">
               @if($kyrgyzradioProjects) 
               @foreach($kyrgyzradioProjects as $key=> $project)
               @if($project->kgprogram()->first())
               <div class="col-md-6 col-sm-6 wow fadeInUp" data-wow-duration="300ms" data-wow-delay="100ms">
                  <div class="media service-box">
                     <div class="media-body">
                        <div role="tabpanel">
                           <ul class="nav main-tab nav-justified" role="tablist">
                              <li role="presentation" class="active"> 
                                 <a href="#{{ $project->id}}" role="tab" data-toggle="tab" aria-controls="{{ $project->id}}" aria-expanded="true">{{ $project->getName() }}</a>
                              </li>
                              <li role="presentation">
                                 <a href="#{{ $key+99 }}" role="tab" data-toggle="tab" aria-controls="{{ $key+99 }}" aria-expanded="false">Уктуруу жөнүндө</a>
                              </li>
                           </ul>
                           <div id="tab-content" class="tab-content">
                              <div role="tabpanel" class="tab-pane fade active in" id="{{ $project->id}}" aria-labelledby="{{ $project->id}}">
                                 <div class="onenews">
                                    <div class="panel panel-articles">
                                       <div class="panel-body">
                                          @if($project->kgprogram()->get())
                                          @foreach($project->kgprogram()->get() as $post)
                                          <div class="media">
                                             <div class="media-left">
                                                <a href="{{ route('kyrgyzradio.news', $post) }}">
                                                <img class="media-object thumb" src="@if(!($post->getFile()))images/live_bg.png @else {{ asset($post->getFile()) }} @endif" alt="image">
                                                </a>
                                             </div>
                                             <div class="media-body">
                                                <div class="extra">
                                                   <span class="e-datetime">{{ $post->getDay() }} , {{ $post->getMonthRu() }}, {{ $post->getTime()}}</span>
                                                   <span class="e-views"><i class="fa fa-eye"></i>{{ $post->getViewed() }}</span>
                                                </div>
                                                <a class="media-heading" href="{{ route('kyrgyzradio.news', $post) }}">{{ $post->getTitle() }}</a>
                                             </div>
                                          </div>
                                          @endforeach
                                          @endif
                                       </div>
                                       <footer>
                                          <a href="{{ route('kyrgyzradio.allnews') }}">Баардык жаңылыктар<i class="fa fa-arrow-right"></i></a>
                                       </footer>
                                    </div>
                                 </div>
                              </div>
                              <div role="tabpanel" class="tab-pane fade" id="{{ $key+99 }}" aria-labelledby="{{ $key+99 }}">
                                 <p>{{ $project->description }}</p>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <!--/.col-md-4-->
               @endif
               @endforeach
               @endif                             
            </div>
         </div>
         <!--/.row-->    
      </div>
      <!--/.container-->
   </section>
   <!--/#services-->
   <section id="cta" class="wow fadeIn">
      <div class="container">
      <div class="row">
         <div class="col-md-6">
               @if($quoteMiddleLeft)          
               <div id="nt-example22-container">                 
                   <ul id="nt-example22">
                     @foreach($quoteMiddleLeft as $top)
                       <li data-infos="{{ $top->getDesc() }} ">
                       <i class="fa fa-quote-left"></i>
                        <i class="fa fa-fw fa-play state"></i>
                        <span class="author"><img src="{{asset($top->file)}}" alt=""></span>
                        <span class="name">                           
                           {{ $top->getAuthor() }}
                        </span>
                       </li>
                     @endforeach
                   </ul>
                   <div id="nt-example22-infos-container">
                      <div id="nt-example22-infos-triangle"></div>
                      <div id="nt-example22-infos" class="row">
                        <div class="col-xs-4">
                           <div class="infos-author">                                            
                              <img src="{{asset($quoteMiddleLeft->first()->file)}}" alt=""> 
                           </div>
                           <i class="fa fa-arrow-left" id="nt-example22-prev"></i>
                           <i class="fa fa-arrow-right" id="nt-example22-next"></i>
                        </div>
                        <div class="col-xs-8"> 
                           <span class="name">{{ $top->getAuthor() }}</span>                             
                           <span class="qicon"></span>   
                           <div class="infos-text"></i> {{ $top->getDesc() }}</div>                        
                        </div>
                      </div>
                   </div>                
               </div>           
               @endif 
         </div>   
         <div class="col-md-6"> 
              @if($quoteMiddleRight)          
            <div id="nt-example23-container">                 
                <ul id="nt-example23">
                  @foreach($quoteMiddleRight as $top)
                    <li data-infos="{{ $top->getDesc() }} ">
                    <i class="fa fa-quote-left"></i>
                     <i class="fa fa-fw fa-play state"></i>
                     <span class="author"><img src="{{asset($top->file)}}" alt=""></span>
                     <span class="name">                           
                        {{ $top->getAuthor() }}
                     </span>
                    </li>
                  @endforeach
                </ul>
                <div id="nt-example23-infos-container">
                   <div id="nt-example23-infos-triangle"></div>
                   <div id="nt-example23-infos" class="row">
                     <div class="col-xs-4">
                        <div class="infos-author">                                            
                           <img src="{{asset($quoteMiddleRight->first()->file)}}" alt=""> 
                        </div>
                        <i class="fa fa-arrow-left" id="nt-example23-prev"></i>
                        <i class="fa fa-arrow-right" id="nt-example23-next"></i>
                     </div>
                     <div class="col-xs-8"> 
                        <span class="name">{{ $top->getAuthor() }}</span>                             
                        <span class="qicon"></span>   
                        <div class="infos-text"></i> {{ $top->getDesc() }}</div>                        
                     </div>
                   </div>
                </div>                
            </div>           
            @endif 
        
         </div>
      </div>
      </div>
   </section>
   <!--/#cta-->
   <section id="portfolio">
      <div class="container">
         <div class="section-header2">
            <h2 class="section-title text-center wow fadeInDown">Сүрөттөр</h2>
         </div>
         <div class="panel-body">
            <section>
               @if($photoGalleries != null)
               @foreach($photoGalleries as $photoGallery)
               <div class="col-md-4">
                  <div class="gallery-item">
                     <a href="{{ route('kyrgyzradio.photos', $photoGallery) }}" class="thumb">
                        <img src="{{ asset($photoGallery->status) }}" alt="...">
                        <i class="fa fa-camera"></i>
                        <div class="extra">
                           <span class="e-datetime">{{ $photoGallery->getDay() }} {{ $photoGallery->getMonthRu() }}, {{ $photoGallery->getTime() }}</span>
                        </div>
                     </a>
                     <h2>                           
                        <a href="{{ route('kyrgyzradio.photos', $photoGallery) }}">{{ $photoGallery->getName() }}</a>
                     </h2>
                  </div>
               </div>
               @endforeach
               @endif
            </section>
            <footer>
               <a href="{{ route('kyrgyzradio.allphotos') }}">
               <span>Баардык сүрөттөр <i class="fa fa-arrow-circle-right"></i></span>
               </a>
            </footer>
         </div>
      </div>
      <!--/.container-->
   </section>

   <!--/#cta-->
   <section id="about">
      <div class="container">
         <div class="section-header">
            <h2 class="section-title text-center wow fadeInDown">Кыргыз Радиосу жөнүндө</h2>
            <p class="text-center wow fadeInDown">Радионун негизги урааны “Кыргыз радиосу - жан дүйнөнүн азыгы”. <br> “Кыргыз радиосу көөнөрбөс мурастар казынасы!”</p>
         </div>
         <div class="row">
            <div class="col-sm-3 wow fadeInLeft">
               <h3 class="column-title">.</h3>
               <!-- 16:9 aspect ratio -->               
               <div class="img-responsive">
                  <img src="{{asset('images/channels/kg-radio.png')}}" alt="">
               </div>
            </div>
            <div class="col-sm-9 wow fadeInRight">
               <h3 class="column-title">Тарыхы</h3>
               <p>Кыргыз радиосу мурдагы Улуттук мамлекеттик радионун курамынан 2009-жылы июнь айында өзүнчө адабий-музыкалык канал катары бөлүнүп чыккан. Кыргыз радиосу улуттук идеологияны жүргүзгөн, калкка рухий азык тараткан, элибиздин көркөм дөөлөттөрүн жайылткан, адабий-музыкалык багытта жан дүйнөнү тазарткан, адеп-ахлак, каада-салттын мектеби болгон уникалдуу радио. Кыргыз радиосунун концепциясы  - көркөм өнөрдүн таасири аркылуу жалпы угармандардын жан дүйнөсүн байытуу, тарбиялоо. </p>
               <p>Ырасында эле “Адабият –элдин сезими, элдин рухий турмушунун жемиши” (В.Белинский) же болбосо музыканын тили көтөрүлбөй турган тил. Ал жандын тили (А.Ауэрбах) - деп таамай айтылгандай, адабият менен музыка бүтүндөй элди тазалыкка, адамгерчиликке тарбиялай турган курал. Кыргыз радиосу ушул улуу максатты аркалайт. </p>
               <p>Күн сайын 12(он эки) саттык уктуруулар эфирге чыгат. Уктуруулар жалаң кыргыз тилинде даярдалат. Уктуруулардын сапатын жакшыртып, угармандардын катарын көбөйтүү максатында редакция жамааты ар убакта талкууларды, талдоолорду өткөрүп, өз кызматын өтөп бүткөн уктурууларды жаап, жаңы долбоорлордун үстүндө изденип, эфирге даярдап келишет. Ошол эле учурда Радионун жүзүн чагылдырып турган роликтер маал-маалы менен жаңыланып турат. Бүгүнкүдөй саясатташкан , күнүмдүк көйгөйлөр адамдын адамдын акыл-эсин чарчатып турган кымгуут заманда угармандардын жан дүйнөсүнө азык берип, эс алууга багыттап, жакшылыкка үндөп келаткан Кыргыз Радиосунун келечеги алдыда</p>
            </div>
         </div>
         <div class="section-header">
            <p class="text-justify wow fadeInDown">.</p>
         </div>
      </div>
   </section>
</div>
@stop
@section('footerscript2')

@stop