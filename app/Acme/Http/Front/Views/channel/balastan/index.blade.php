@extends('Front::channel.balastan.default')
@section('title', "Баластан")
@section('styles')
@endsection
@section('content')
<div class="container-fluid kidsmainbg">
   @include('Front::channel.balastan.nav')
   <div class="row">
      <div class="shows-slider">
         <div class="shows-carousel container">
            <div>
               <article>
                  <div class="show-info">
                     <h1 class="show-name">Баарын билгим келет</h1>
                     <span class="show-day">{{ trans('site.Monday') }} - {{ trans('site.Friday') }}</span>
                     <span class="show-time">19:30</span>
                     <a class="show-btn" href="#">
                     Подробнее
                     </a>
                  </div>
                  <div class="show-img">
                     <img src="{{ asset('images/channels/balastan/slider/1.png') }}" alt="" draggable="false">
                  </div>
               </article>
            </div>
            <div>
               <article>
                  <div class="show-info">
                     <h1 class="show-name">Баарын билгим келет</h1>
                     <span class="show-day">{{ trans('site.Monday') }} - {{ trans('site.Friday') }}</span>
                     <span class="show-time">19:30 / 21:30</span>
                     <a class="show-btn" href="#">
                     Подробнее
                     </a>
                  </div>
                  <div class="show-img">
                     <img src="{{ asset('images/channels/balastan/slider/1.png') }}" alt="" draggable="false">
                  </div>
               </article>
            </div>
            <div>
               <article>
                  <div class="show-info">
                     <h1 class="show-name">Баарын билгим келет</h1>
                     <span class="show-day">{{ trans('site.Monday') }} - {{ trans('site.Friday') }}</span>
                     <span class="show-time">19:30 / 21:30</span>
                     <a class="show-btn" href="#">
                     Подробнее
                     </a>
                  </div>
                  <div class="show-img">
                     <img src="{{ asset('images/channels/balastan/slider/1.png') }}" alt="" draggable="false">
                  </div>
               </article>
            </div>
         </div>
      </div>
   </div>
</div>
<!-- BEGIN Programms category slider -->
<div id="kidsslider" class="container-fluid kidsslider">
   <div class="container">
      <div class="row">
         <div class="col-md-12 programs-slide">
            <div class="kids-slide">
               @if($balastanProjects)
               @foreach($balastanProjects as $project) 
               @if($project->status != 1)
               <div class="col-md-3">
                  <a href="{{ route('balastan.project.videos', $project) }}">
                     <img src="@if(!($project->getFile())) {{ asset('images/project_default.png') }} @else {{ asset($project->getFile()) }} @endif" alt=""/>
                     <h3 class="programmcat">
                  <a href="{{ route('balastan.project.videos', $project) }}">{{ $project->getName() }}</a></h3>
                  </a>
               </div>
               @endif
               @endforeach
               @endif
            </div>
         </div>
      </div>
   </div>
</div>
<!-- END Programms category slider -->
<!-- BEGIN Ad block -->
@if($anons->first())
<div class="container-fluid preklams">
   <div class="container">
      <div class="row">
         <div class="title col-md-12">
            <h3>Анонс</h3>
         </div>
         @foreach($anons as $row)
         <div class="col-md-6 adblock">
            <a href="#">
            <img class="videomain" width="100%" height="340px" src="{{asset($row->thumbnail)}}" alt="" />
            </a>
            <div class="show-text">
               <h2>{{ $row->getNameOne() }}</h2>
               <a class="soon-btn" href="#">
               <i class="fa fa-chevron-right"></i>
               </a>
            </div>
         </div>
         @endforeach
      </div>
   </div>
</div>
@endif
<!-- END Ad block -->
<!-- BEGIN NEW Videos -->
<div class="container-fluid newtopvideos">
   <div class="container">
      <div class="newkidvideos">
         <div class="title">
            <h3>{{ trans('radiopages.NewVideos') }}</h3>
            <a href="{{ route('balastan.videos') }}" class="more-link">{{ trans('radiopages.AllVideos') }}</a>
         </div>
         <div class="row">
            @if($medias != null)
            @foreach($medias as $media)
            <div class="col-md-4 video-block">
               <a href="{{ route('balastan.video', $media) }}" class="video-img">
               <img src="http://img.youtube.com/vi/{{ $media->getUrl()}}/mqdefault.jpg" alt="" />
               <span class="video-overlay"></span>
               </a>
               <div class="video-info">
                  <div class="media">
                     <div class="media-left media-middle">
                        <a href="{{ route('balastan.video', $media) }}">
                        <i class="fa fa-youtube-play video-icon"></i>
                        </a>
                     </div>
                     <div class="media-body media-middle">
                        <h4 class="media-heading video-name"><a href="{{ route('balastan.video', $media) }}">{{ $media->getName() }}</a></h4>
                     </div>
                  </div>
               </div>
            </div>
            @endforeach
            @endif
         </div>
      </div>
   </div>
</div>
<!-- END NEW videos -->
<!-- BEGIN Photogalleries -->
<div class="container-fluid kidsgallery">
   <div class="container">
      <div class="row">
         <div class="col-md-12">
            <div class="title">
               <h3>{{ trans('radiopages.Photos') }}</h3>
               <a href="#" class="more-link">{{ trans('radiopages.Allphotos') }}</a>
            </div>
         </div>
         @if($photoGalleries)
         @foreach($photoGalleries as $photoGallery)
         <div class="col-md-4 video-block">
            <a href="{{ route('balastan.photos', $photoGallery) }}" class="video-img">
            <img src="{{ asset($photoGallery->thumbnail_big) }}" alt="" />
            <span class="video-overlay"></span>
            </a>                    
            <div class="video-info">
               <div class="media">
                  <div class="media-left media-middle">
                     <a href="{{ route('balastan.photos', $photoGallery) }}">
                     <i class="fa fa-camera video-icon"></i>
                     </a>
                  </div>
                  <div class="media-body media-middle">
                     <h4 class="media-heading video-name"><a href="{{route('balastan.photos', $photoGallery)}}">{{ $photoGallery->getName() }}</a></h4>
                  </div>
               </div>
            </div>
         </div>
         @endforeach
         @endif
      </div>
   </div>
</div>
<!-- END Photogalleries -->
@stop
@section('footerScript')
<script>
   if ($(window).width() > 768) {
       $('.kids-slide').slick({
           infinite: true,
           slidesToShow: 4,
           slidesToScroll: 1
       });
   }
   
   if ($(window).width() < 768) {
       $('.kids-slide').slick({
           infinite: true,
           slidesToShow: 2,
           slidesToScroll: 1
       });
   }
   
</script>
<script>
   $('.shows-carousel').slick({
       autoplay: false,
       autoplaySpeed: 2500,
       arrows: false,
       dots: true,
       infinite: true,
       slidesToShow: 1,
       speed: 1000
   });
</script>
@stop