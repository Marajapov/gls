@extends('Front::channel.minkiyal.default')
@section('title', "Миң Кыял Фм")
@section('styles')
<link rel="stylesheet" type="text/css" href="{{ asset('css/lightslider.css') }}">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/1.2.6/css/lightgallery.min.css">
@endsection
@section('content')
<div class="container-fluid main">
   <img src="{{ asset('images/channels/minkiyal/main.png')}}" alt="" class="img-responsive innerfix">
</div>
@include('Front::channel.minkiyal.nav')


    <div class="container mingallery">
      <div class="col-md-12">
         <div class="panel" >
            <div class="panel-body">
               <div class="row">
                  <p>{!! $gallery->getDescription() !!}</p>
                  <ul id="imageGallery">
                     @foreach($images as $image)
                     <li data-thumb="{{ asset('froala/uploads/'.$image->name) }}" data-src="{{ asset('froala/uploads/'.$image->name) }}">
                        <img class="resizegallery" src="{{ asset('froala/uploads/'.$image->name) }}" />
                     </li>
                     @endforeach
                  </ul>
               </div>
            </div>
         </div>
      </div>
    </div>


@stop

@section('footerscript2')
<script src="{{ asset('js/lightslider.js') }}"></script>
<script src="{{ asset('js/lightgallery/picturefill.min.js') }}"></script>
<script src="{{ asset('js/lightgallery/lightgallery.js') }}"></script>
<script src="{{ asset('js/lightgallery/lg-fullscreen.js') }}"></script>
<script src="{{ asset('js/lightgallery/lg-thumbnail.js') }}"></script>
<script src="{{ asset('js/lightgallery/lg-video.js') }}"></script>
<script src="{{ asset('js/lightgallery/lg-autoplay.js') }}"></script>
<script src="{{ asset('js/lightgallery/lg-zoom.js') }}"></script>
<script src="{{ asset('js/lightgallery/lg-hash.js') }}"></script>
<script src="{{ asset('js/lightgallery/lg-pager.js') }}"></script>
<script src="{{ asset('jslightgallery/jquery.mousewheel.min.js') }}"></script>
<script type="text/javascript">
   $(document).ready(function() {
   $('#imageGallery').lightSlider({
     gallery:true,
     item:1 ,
     loop:true,
     thumbItem:8,
     slideMargin:0,
     enableDrag: true,
     currentPagerPosition:'right',
     onSliderLoad: function(el) {
         el.lightGallery({
             selector: '#imageGallery .lslide'
         });
     }   
   });  
   });
</script>
@stop