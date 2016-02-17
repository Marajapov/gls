@extends('Front::channel.birinchi.default')
@section('title',  $project->getNameOne())
@section('styles')
@endsection
@section('content')
<div class="birinchiradio">
   @include('Front::channel.birinchi.nav')
   <div class="container">
      <div class="row">
         <div class="col-md-12">
            <div class="row onenews">
               <div class="col-md-9">
                  <div class="row">
                     <div class="col-md-12">
                        <h3 class="title">{{ $project->getNameOne() }}</h3>
                     </div>
                     <div class="panel-show ">
                        <div class="col-md-12 show-block">
                           <div class="media ">
                              <div class="media-left media-top">
                                 <a>
                                 <img class="media-object" src="@if(!($project->getFile())) {{ asset('images/project_default.png') }} @else {{ asset($project->getFile()) }} @endif" alt="{{ $project->getNameOne() }}">
                                 </a>
                              </div>
                              <div class="media-body">
                                 <h4 class="show-title media-heading">{{ $project->getNameOne() }}</h4>
                                 <p class="show-desc">
                                    {{ $project->description }}
                                 </p>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="show-block">
                        <div class="col-md-12">
                           <h3 class="title">{{ trans('radiopages.Peredachi') }}</h3>
                        </div>
                        <div class="col-md-12 panel-body">
                           @if($relatedNews)
                           @foreach($relatedNews as $post)
                           <div class="media blockallnews">
                              <div class="media-left">
                                 <a href="{{ route('birinchi.broadcast', $post) }}">
                                 <img class="media-object thumb" src="@if(!($post->getFile()))images/live_bg.png @else {{ asset($post->getFile()) }} @endif" alt="image">
                                 </a>
                              </div>
                              <div class="media-body">
                                 <div class="extra">
                                    <span class="datetime">{{ $post->getDay() }} , {{ $post->getMonthRu() }}, {{ $post->getTime()}}</span>
                                    <span class="views"><i class="fa fa-eye"></i>{{ $post->getViewed() }}</span>
                                 </div>
                                 <a class="media-heading" href="{{ route('birinchi.broadcast', $post) }}">{{ $post->getTitleRuOrKg() }}</a>
                                 <span class="mb_substr">
                                    {!! mb_substr($post->getContent(), 0, 290, "UTF-8") !!}
                                 </span>
                              </div>
                           </div>
                           @endforeach
                           @endif
                           <footer>
                              <a href="{{ route('birinchi.allbroadcasts') }}">{{ trans('radiopages.Morenews') }}</a>
                           </footer>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-md-3">
                  <div class="row">
                     <div class="col-md-12">
                        <h3 class="title">{{ trans('radiopages.Peredachi') }}</h3>
                     </div>
                     <div class="col-md-12 ctg-panel">
                        <ul class="list-group">
                           @if($birinchiProjects) 
                           @foreach($birinchiProjects as $project_one)
                           <li class="list-group-item">
                              <a href="{{ route('birinchi.broadcasts', $project_one) }}">{{ $project_one->getName() }}</a>
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