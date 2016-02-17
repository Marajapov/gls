@extends('Front::channel.birinchi.default')
@section('title', "Биринчи Радио")
@section('styles')
@endsection
@section('content')
    <div class="birinchiradio">
        @include('Front::channel.birinchi.nav')
        <div class="container homepage">
            <div class="row">
                <div class="col-md-8">
                    <div class="row">
                        <div class="hometreble">
                            <div class="col-md-12">
                                <h3 class="title">{{ trans('radiopages.Mainnews') }}</h3>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 hoverslider">
                                    <div class="slider-for col-xs-9">
                                        @if($generalPosts)
                                            @foreach($generalPosts as $post)
                                                <div>
                                                    <div class="slide-info">
                                                        <a href="{{ route('birinchi.news', $post) }}" title="">
                                                        <img class="img" src="@if(!($post->getFileBig()))images/live_bg.png @else {{ asset($post->getFileBig()) }} @endif" alt=""/>
                                                        </a>
                                                         <!-- <span class="slide-category"></span> -->
                                                        <span class="slide-date">{{ $post->getDay() }} , {{ $post->getMonthRu() }}, {{ $post->getTime()}}</span>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endif
                                    </div>
                                    <div class="slider-nav col-xs-3">
                                        @if($generalPosts)
                                            @foreach($generalPosts as $post)
                                                <div>
                                                    <div class="switcher">
                                                        <h3 class="name">
                                                            <a href="{{ route('birinchi.news', $post) }}" title="">
                                                                {{ $post->getTitleRuOrKg() }}
                                                            </a>
                                                        </h3>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="row">
                        <div class="homeleftcategory">
                            <div class="col-md-12">
                                <h3 class="title">{{ trans('radiopages.Newslenta') }}
                                  <div class="pull-right">
                                    <i class="fa fa-arrow-up" id="newsticker-prev"></i>
                                    <i class="fa fa-arrow-down" id="newsticker-next"></i>
                                </div>
                                </h3>                          
                            </div>
                            <div class="col-md-12">
                                <div class="lenta">
                                    @if($lentaNews)
                                    <div id="newsticker-container">                        

                                        <ul id="newsticker">
                                            @foreach($lentaNews as $lenta)
                                            <li class="lentanews">                                    
                                                <span class="xdate">{{$lenta->getDay() }} 
                                                    <p>{{ $lenta->getMonthRu() }}</p>
                                                    <p>{{ $lenta->getTime()}}</p>        

                                                </span>
                                                <span class="xtitle"><a href="{{ route('birinchi.news', $lenta) }}">{{ $lenta->getTitleRuOrKg() }}</a></span>

                                            </li>
                                            @endforeach
                                        </ul>


                                    </div>
                                    @endif
                                </div>
                                <footer>
                                   <a href="{{ route('birinchi.allnews') }}">{{ trans('radiopages.Morenews') }}<i class="fa fa-arrow-right"></i></a>
                                </footer>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">

                @foreach($topCategories as $topCategory)
                    <div class="col-md-6 homenews">
                        <div class="row">
                            <div class="col-md-12">
                            <a class="cat-link" href="{{ route('birinchi.category', $topCategory) }}">
                                    <h3 class="title">{{ $topCategory->getTitle() }}</h3>
                                </a>
                            </div>
                            @if($posts)
                                @foreach($posts as $post)
                                    @if($post->category_id == $topCategory->id)
                                        <div class="blocknews col-md-4 col-sm-4 col-xs-12">
                                            <article>
                                                <a href="{{ route('birinchi.news', $post) }}" class="image-link">
                                                    <img src="@if(!($post->getFile()))images/live_bg.png @else {{ asset($post->getFile()) }} @endif">
                                                    <div class="card-info">
                                                        <span class="date ">{{ $post->getDay() }} , {{ $post->getMonthRu() }}, {{ $post->getTime()}}</span>
                                                        <span class="view"><i class="fa fa-eye"></i>{{ $post->getViewed() }}</span>
                                                    </div>
                                                </a>
                                                <h3 class="name headline">
                                                    <a href="{{ route('birinchi.news', $post) }}" title="">
                                                        {{ $post->getTitleRuOrKg() }}
                                                    </a>
                                                </h3>
                                            </article>
                                        </div>
                                    @endif
                                @endforeach
                            @endif
                        </div>
                    </div>
                @endforeach

                <div class="col-md-12 shows">
                    <div class="row">
                        <div class="col-md-12">
                            <h3 class="titleshows">{{ trans('radiopages.Peredachi') }}<span class="label label-primary">АНОНС!</span></h3>
                            <!-- <h3 class="titleshowsright"><a href="{{ route('birinchi.allbroadcasts') }}">{{ trans('radiopages.AllPereadachi') }}<i class="fa fa-arrow-right"></i></a></h3> -->
                        </div>

                        @if($birinchiProjects)
                            @foreach($birinchiProjects as $project)
                                                   
                                    <div class="blocknews2 col-md-4 col-sm-4 col-xs-12">
                                        <article>                                                             
                                            <div class="hovertext">
                                                <img class="blockimg" src="@if(!($project->getFile())) {{ asset('images/project_default.png') }} @else {{ asset($project->getFile()) }} @endif" alt="{{ $project->getNameOne() }}">
                                                <div class="desc"><span>{{ $project->getDescription() }}</span></div>
                                            </div>
                                            <h3 class="name headline">                                               
                                               {{ $project->getName() }}                                             
                                           </h3>
                                        </article>
                                    </div>                
                             
                            @endforeach
                        @endif
                    </div>
                </div>

                @foreach($bottomCategories as $bottomCategory)
                    <div class="col-md-6 homenews">
                        <div class="row">
                            <div class="col-md-12">
                                <a class="cat-link" href="{{ route('birinchi.category', $topCategory) }}">
                                    <h3 class="title">{{ $bottomCategory->getTitle() }}</h3>
                                </a>
                            </div>
                            @if($posts)
                                @foreach($posts as $post)
                                    @if($post->category_id == $bottomCategory->id)
                                        <div class="blocknews col-md-4 col-sm-4 col-xs-12">
                                            <article>
                                                <a href="{{ route('birinchi.news', $post) }}" class="image-link">
                                                    <img src="@if(!($post->getFile()))images/live_bg.png @else {{ asset($post->getFile()) }} @endif">
                                                    <div class="card-info">
                                                        <span class="date ">{{ $post->getDay() }} , {{ $post->getMonthRu() }}, {{ $post->getTime()}}</span>
                                                        <span class="view"><i class="fa fa-eye"></i>{{ $post->getViewed() }}</span>
                                                    </div>
                                                </a>
                                                <h3 class="name headline">
                                                    <a href="{{ route('birinchi.news', $post) }}" title="">
                                                        {{ $post->getTitleRuOrKg() }}
                                                    </a>
                                                </h3>
                                            </article>
                                        </div>
                                    @endif
                                @endforeach
                            @endif
                        </div>
                    </div>
                @endforeach

            </div>
            <div class="row">
                <div class="col-md-12 birinchigallery">
                    <div class="row">
                        <div class="col-md-12">
                            <h3 class="title">{{ trans('radiopages.Photos') }}</h3>
                            <h3 class="titleshowsright"><a href="{{ route('birinchi.allphotos') }}">{{ trans('radiopages.Allphotos') }}<i class="fa fa-arrow-right"></i></a></h3>
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

@section('footerscript2')
    <script>
        $('.slider-for').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: false,
            infinite: true,
            speed: 500,
            fade: true,
            cssEase: 'linear',
            asNavFor: '.slider-nav'
        });
        $('.slider-nav').slick({
            slidesToShow: 3,
            slidesToScroll: 1,
            asNavFor: '.slider-for',
            dots: true,
            focusOnSelect: true,
            vertical:true,
            arrows:false
        });
    </script>
    <script src="{{ asset('js/audio/jquery.newsTicker.js')}}"></script> 
    <script>
        var nt_example1 = $('#newsticker').newsTicker({
            row_height: 50,
            max_rows:6,
            duration: 2500,
            pauseOnHover: 1,
            autostart: 1,
            prevButton: $('#newsticker-prev'),
            nextButton: $('#newsticker-next')
        });
    </script>

    <script>
        $('.slider-nav').on('mouseenter', '.slick-slide', function (e) {
            var $currTarget = $(e.currentTarget),
                index = $currTarget.data('slick-index'),
                slickObj = $('.slider-for').slick('getSlick');
            slickObj.slickGoTo(index);
        });
    </script>

@endsection