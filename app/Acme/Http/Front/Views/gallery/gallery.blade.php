@extends('Front::layouts.default')
@section('title', $gallery->getName())
@section('styles')

    <meta property="og:url"                content="{{ Request::url()}}" />
    <meta property="og:site_name"          content="{{ trans('site.TradeMark') }}" />
    <meta property="og:type"               content="article" />
    <meta property="og:title"              content="{{ $gallery->getName() }}" />
    <meta property="og:description"        content="" />
    <meta property="og:image"              content="{{ asset($gallery->thumbnail_big) }}" />

    <link rel="stylesheet" href="{{ asset('css/articles.css') }}"/>
    <link rel="stylesheet" href="{{ asset('css/pages.css') }}"/>
    <link rel="stylesheet" href="{{ asset('css/goodshare.css') }}"/>
    <link href="{{ asset('froala/css/froala_style.min.css') }}" rel="stylesheet" type="text/css" />
@stop

@section('content')
    <div class="container main-wrapper">
        <div class="row">
            <section class="content clearfix">
                <div class="clearfix">
                    <div class="top-left-block col-xs-12 col-sm-12 col-md-12">
                        <div class="panel panel-default panel-kenesh panel-gallery">
                            <div class="panel-heading">
                                <h3 class="panel-title">
                                    <a href="{{ route('front.gallery.galleries') }}">ФОТОГАЛЕРЕЯ</a>
                                    <span class="divider"><i class="fa fa-circle"></i></span>
                                    <span>{{ $gallery->getName() }}</span>
                                </h3>
                            </div>
                            <div class="panel-body">

                                <h4 style="margin: 20px 0 10px;" class="gallery-title text-uppercase">
                                    {{ $gallery->getName() }}
                                </h4>

                                <div style="margin: 20px 0;">{!! $gallery->getDescription() !!}</div>

                                <div class="col-md-12" style="margin-bottom: 15px;">

                                    <div class="row">
                                        <div class="slider-for">
                                            @if($images)
                                                @foreach($images as $image)
                                                    <div>
                                                        <img class="img" src="{{ asset('froala/uploads/'.$image->name) }}" alt=""/>
                                                        <span class="slide-caption hidden">
                                                          {{ $gallery->getName() }}
                                                        </span>
                                                    </div>
                                                @endforeach
                                            @endif
                                        </div>

                                        <div class="slider-nav col-md-12">
                                            @if($images)
                                                @foreach($images as $image)
                                                    <div>
                                                        <img class="img" src="{{ asset('froala/uploads/'.$image->name) }}" alt=""/>
                                                    </div>
                                                @endforeach
                                            @endif
                                        </div>

                                    </div>
                                </div>

                                <footer class="with-share">

                                    @if(auth()->user())
                                        <a class="post-edit" href="{{ route('admin.photoParent.edit', $gallery) }}" target="_blank">
                                            <i class="fa fa-pencil"></i>
                                            {{ trans('site.AdminPostEdit') }}
                                        </a>
                                    @endif

                                    <div class="pluso share-buttons">
                                        <button class="goodshare btn-fb" data-type="fb">
                                            <i class="fa fa-facebook"></i>
                                            <span data-counter="fb"></span>
                                        </button>
                                        <!-- Button with share to Facebook & share counter -->
                                        <button class="goodshare btn-vk" data-type="vk">
                                            <i class="fa fa-vk"></i>
                                            <span data-counter="vk"></span>
                                        </button>
                                        <button class="goodshare btn-ok" data-type="ok">
                                            <i class="fa fa-odnoklassniki"></i>
                                            <span data-counter="ok"></span>
                                        </button>
                                        <button class="goodshare btn-gp" data-type="gp">
                                            <i class="fa fa-google-plus"></i>
                                            <span data-counter="gp"></span>
                                        </button>
                                        <button class="goodshare btn-tw" data-type="tw">
                                            <i class="fa fa-twitter"></i>
                                            {{--<span data-counter="tw"></span>--}}
                                        </button>
                                    </div>

                                    <a href="{{ route('front.gallery.galleries') }}">
                                        <span>{{ trans('site.FrontGalleryAll') }}<i class="fa fa-arrow-circle-right"></i></span>
                                    </a>
                                </footer>

                            </div>
                        </div>

                    </div>
                </div>
            </section>
        </div><!-- end row-->
    </div><!-- end container main-wrapper -->

@stop

@section('footerScript')

    {{--SHARE BUTTONS--}}
    <script src="{{ asset('js/goodshare.js') }}"></script>
    <script>
        $(window).load(function(){
            $('.goodshare').each(function(){
                var span = $(this).children('span');
                var counter = span.text();
                if((counter==0) || (counter=='')){
                    $(this).addClass('empty');
                }
            });
        });
    </script>

    <script>
        function getVote(int) {
            if (window.XMLHttpRequest) {
                // code for IE7+, Firefox, Chrome, Opera, Safari
                xmlhttp=new XMLHttpRequest();
            } else {  // code for IE6, IE5
                xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.onreadystatechange=function() {
                if (xmlhttp.readyState==4 && xmlhttp.status==200) {
                    document.getElementById("poll").innerHTML=xmlhttp.responseText;
                }
            }
            xmlhttp.open("GET","{{ asset('poll_vote.php') }}?vote="+int,true);
            xmlhttp.send();
        }
    </script>

    <!--Carousel-->
    <script>
        $('.slider-for').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            fade: true,
            asNavFor: '.slider-nav'
        });
        $('.slider-nav').slick({
            slidesToShow: 4,
            slidesToScroll: 1,
            asNavFor: '.slider-for',
            centerMode: true,
            focusOnSelect: true,
            variableWidth: true
        });
    </script>

@endsection
