@extends('Front::channel.kyrgyzradio.default')
@section('title', 'Баардык сүрөттөр')
@section('styles')
@endsection
@section('content')
@include('Front::channel.kyrgyzradio.nav')
<div id="allphotos">
   <div class="container">
      <div class="row">
         <div class="section-header2">
            <h2 class="section-title text-center wow fadeInDown">Сүрөттөр</h2>
         </div>
         <div class="row">
            <div class="col-md-12">
               @if($photoGalleries != null)
               @foreach($photoGalleries as $photoGallery)
               <div class="col-md-4 col-sm-6 col-xs-12">
                  <div class="gallery-item">
                     <a href="{{ route('kyrgyzradio.photos', $photoGallery) }}" class="thumb">
                        <img src="{{ asset($photoGallery->status) }}" alt="{{ $photoGallery->getName() }}<">
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
            </div>
         </div>
      </div>
   </div>
</div>
@stop