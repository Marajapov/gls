@extends('Front::channel.birinchi.default')
@section('title', trans('radiopages.Peredachi'))
@section('styles')
@endsection
@section('content')
<div class="birinchiradio">
@include('Front::channel.birinchi.nav')
<div class="container">
<div class="row">
   <div class="col-md-12">
      <div class="row">
         <div class="col-md-12">
            <h3 class="title">{{ trans('radiopages.Peredachi') }}</h3>
         </div>
         @if($birinchiProjects)
             @foreach($birinchiProjects as $project)
                                    
                     <div class="blocknews3 col-md-12">
                         <div class="row">
                              <div class="col-sm-4 hovertext">
                                 <img class="blockimg" src="@if(!($project->getFile())) {{ asset('images/project_default.png') }} @else {{ asset($project->getFile()) }} @endif" alt="{{ $project->getNameOne() }}">
                              </div>                          
                              <div class="col-sm-8">
                               <h3 class="name headline">                                               
                                  {{ $project->getName() }}                                             
                               </h3>
                               <div class="desc"><span>{{ $project->getDescription() }}</span></div>
                            </div>                                                          
                         </div>
                     </div>                
              
             @endforeach
         @endif
      </div>
   </div> 
</div>
@stop
