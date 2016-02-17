@extends('Front::channel.birinchi.default')
@section('title', $gallery->getName())
@section('styles')
<link rel="stylesheet" type="text/css" href="{{ asset('css/lightslider.css') }}">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/1.2.6/css/lightgallery.min.css">
@endsection
@section('content')
<div class="birinchiradio">
   @include('Front::channel.birinchi.nav')
   <div class="container">
      <div class="row">
         <div class="col-md-12">
            <div class="row">
               <div class="col-md-12">
                  <h3 class="title">{{ $gallery->getName() }}</h3>
               </div>
               <div class="col-md-12">   
                  <div class="panel-body">
                     <div class="row">
                        <p>{!! $gallery->getDescription() !!}</p>
                        <ul id="imageGallery">
                           @if($images != null)
                           @foreach($images as $image)
                           <li data-thumb="{{ asset('froala/uploads/'.$image->name) }}" data-src="{{ asset('froala/uploads/'.$image->name) }}">
                              <img class="resizegallery" src="{{ asset('froala/uploads/'.$image->name) }}" />
                           </li>
                           @endforeach
                           @endif
                        </ul>
                     </div>
                  </div>      
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
@stop
@section('footerscript2')
<script src="{{ asset('js/jquery-1.11.2.min.js') }}"></script>  
<script src="{{ asset('js/jquery-migrate-1.2.1.min.js') }}"></script>
<script src="{{ asset('slick/slick.min.js') }}"></script>
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