@extends('Front::channel.birinchi.default')
@section('title', $category->getTitle())
@section('styles')
@endsection
@section('content')
<div class="birinchiradio">
   @include('Front::channel.birinchi.nav')
   <div class="container">
      <div class="row">
         <div class="col-md-9">
            <div class="row onenews">
               <div class="col-md-12">
                  <div class="row">
                     <div class="col-md-12">
                        <h3 class="title"> {{ $category->getTitle()}}</h3>
                     </div>
                    
                     @foreach($posts as $post)       
                
                     <div class="blocknews col-md-4 col-sm-6 col-xs-12">
                          <article>
                              <a href="{{ route('birinchi.news', $post) }}" class="image-link">
                                  <img src="@if(!($post->getFile()))images/live_bg.png @else {{ asset($post->getFile()) }} @endif">
                                  <div class="card-info">
                                      <span class="date ">{{ $post->getDay() }} , {{ $post->getMonthRu() }}, {{ $post->getTime()}}</span>
                                  </div>
                              </a>
                              <h3 class="name headline">
                                  <a href="{{ route('birinchi.news', $post) }}" title="">
                                      {{ $post->getTitleRuOrKg() }}
                                  </a>
                              </h3>
                          </article>
                     </div>  
           
                     @endforeach
                          
                  </div>
                  <footer class="allnewsfooter">
         			<nav>
                        <ul class="pagination">

                            <li>
                                <a href="{{ route('birinchi.category', ['category' => $category, 'page' => 1]) }}" class="btn btn-default @if($posts->currentPage() == 1) disabled @endif">{{ trans('site.Start') }}</a>
                            </li>
                            <li>
                                <a href="{{ $posts->previousPageUrl() }}" class="btn btn-default"><span class="glyphicon glyphicon-chevron-left"></span></a>
                            </li>

                            @for($i = 0, $j = 1; $i < $posts->total(); $i+=$perPage)
                                <li class="@if(($j > $posts->currentPage()+3) || ($j < $posts->currentPage()-3)) hidden @endif">
                                    <a href="{{ route('birinchi.category', ['category' => $category, 'page' => $j]) }}" class="btn btn-default @if($posts->currentPage() == $j) active @endif">
                                        {{ $j++ }}
                                    </a>
                                </li>
                            @endfor

                            <li>
                                <a href="{{ $posts->nextPageUrl() }}" class="btn btn-default"><span class="glyphicon glyphicon-chevron-right"></span></a>
                            </li>

                            <li>
                                <a href="{{ route('birinchi.category', ['category' => $category, 'page' => ceil($posts->total()/$perPage)]) }}" class="btn btn-default @if($posts->currentPage() == ceil($posts->total()/$perPage)) disabled @endif">{{ trans('site.End') }}</a>
                            </li>

                        </ul>
                    </nav>
                  </footer>

               </div>

            </div>
         </div>
         <div class="col-md-3">
            <div class="row onenews">
               <div class="col-md-12">
                  <div class="row">
                     <div class="col-md-12">
                        <h3 class="title">{{ trans('radiopages.Categories') }}</h3>
                     </div>                     
                     <div class="col-md-12 ctg-panel">                          
                        <ul class="list-group">
                           @foreach($categories as $category)
                           <li class="list-group-item">
                              <a href="{{ route('birinchi.category', $category) }}">{{ $category->getTitle() }}</a>
                           </li>
                           @endforeach
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