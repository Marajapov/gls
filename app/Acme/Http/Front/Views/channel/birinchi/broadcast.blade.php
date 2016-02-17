@extends('Front::channel.birinchi.default')
@section('title', $post->getTitleRuOrKg())
@section('styles')
@endsection
@section('content')
<div class="birinchiradio">
   @include('Front::channel.birinchi.nav')
   <div class="container">
      @if($birinchiProjects) 
      @foreach($birinchiProjects as $birinchiProject)
      @endforeach
      @endif
      <div class="row broadcastpost">
         <div class="col-md-12">
            <div class="row">
               <div class="col-md-9">
                  <div class="row">
                     <div class="col-md-12">
                        <h3 class="title">{{ $birinchiProject->getName() }}</h3>
                     </div>
                     <div class="col-md-12">
                        <div class="news-info">
                           <span class="date"><i class="fa fa-calendar"></i>{{ $post->getDay() }} , {{ $post->getMonthRu() }}, {{ $post->getTime()}}</span>
                           <span class="view"><i class="fa fa-eye"></i>{{ $post->getViewed() }}</span>
                        </div>
                        <h2 class="btitle">{{ $post->getTitleRuOrKg() }}</h2>

                        <div class="oneimg">
                           <img src="@if(empty($post->getFile()))images/2.jpg @else {{  asset($post->getFile()) }} @endif" alt="" data-toggle="tooltip" data-placement="top" title="Бул жөн гана сүрөт эмес">
                        </div>
                        <article>
                           {!! $post->getContent() !!}
                        </article>
                     </div>
                  </div>
               </div>
               <div class="col-md-3 ">
                  <div class="row">
                     <div class="col-md-12">
                        <h3 class="title">{{ trans('radiopages.Categories') }}</h3>
                     </div>
                     <div class="col-md-12 ctg-panel">
                        <ul class="list-group">
                           @if($birinchiProjects) 
                           @foreach($birinchiProjects as $project)
                           <li class="list-group-item">
                              <a href="{{ route('birinchi.broadcasts', $project) }}">{{ $project->getName() }}</a>
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