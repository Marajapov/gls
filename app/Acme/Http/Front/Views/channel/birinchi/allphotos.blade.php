@extends('Front::channel.birinchi.default')
@section('title', trans('radiopages.Photos'))
@section('styles')
@endsection
@section('content')
<div class="birinchiradio">
   @include('Front::channel.birinchi.nav')
   <div class="container">
      <div class="row">
          <div class="col-md-12 allgallery">
              <div class="row">
                  <div class="col-md-12">
                      <h3 class="title">{{ trans('radiopages.Photos') }}</h3>
                  </div>
                  @if($photoGalleries)
                      @foreach($photoGalleries as $photoGallery)
                          <div class="col-md-4">
                              <a href="{{ route('birinchi.photos', $photoGallery) }}" class="photo-img">
                                  <img src="{{ asset($photoGallery->thumbnail_big) }}" alt="" />
                                  <span class="photo-overlay"></span>
                              </a>
                              <div class="photo-info">
                                  <div class="media">
                                      <div class="media-left media-middle">
                                          <div class="extraone">
                                              <span class="e-datetime"><i class="fa  fa-calendar"></i>  {{ $photoGallery->getDay() }} {{ $photoGallery->getMonthRu() }}, {{ $photoGallery->getTime() }}</span>
                                          </div>
                                          <a href="{{ route('birinchi.photos', $photoGallery) }}">
                                              <i class="fa fa-camera photo-icon"></i>
                                          </a>
                                      </div>
                                      <div class="media-body media-middle">
                                          <h4 class="media-heading photo-name"><a href="{{route('birinchi.photos', $photoGallery)}}">{{ $photoGallery->getName() }}</a></h4>
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
</div>
@stop