@extends('Front::channel.birinchi.default')
@section('title', trans('radiopages.About'))
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
                <h3 class="title">{{ trans('radiopages.About') }}</h3>
              </div>
              <div class="col-md-12">
                    <p>{{ trans('radiopages.AboutText1') }} </p>
                    <p>{{ trans('radiopages.AboutText2') }}</p>    
                    <p>{{ trans('radiopages.AboutText3') }}</p>    
                    <p>{{ trans('radiopages.AboutText4') }}</p>     
              </div>
              <div class="col-md-12">
                <h3 class="title">{{ trans('radiopages.AboutText5') }}</h3>
                    <p>{{ trans('radiopages.AboutText6') }}</p>
                    <p>{{ trans('radiopages.AboutText7') }}</p>
                    <p>{{ trans('radiopages.AboutText8') }}</p> 
              </div>
            </div>    
         </div>
      </div>
   </div>
</div>

@stop