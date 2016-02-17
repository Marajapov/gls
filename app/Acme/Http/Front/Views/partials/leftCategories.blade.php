<div class="top-right-block col-md-3 @if($topArticles) with-top-articles @endif">

    @if($topArticles)

        <div class="panel panel-default panel-articles panel-top-articles">
            <div class="panel-heading hidden">
                <h3 class="panel-title"><span>{{ trans('site.PostAktualno') }}</span></h3>
            </div>
            <div class="panel-body">

                <div>

                    <div class="row">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="active"><a href="#main" aria-controls="home" role="tab" data-toggle="tab">{{ trans('site.PostMain') }}</a></li>
                            <li role="presentation"><a href="#popular" aria-controls="profile" role="tab" data-toggle="tab">{{ trans('site.PostPopular') }}</a></li>
                        </ul>
                    </div>

                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane fade in active" id="main">
                            @foreach($topArticles as $post)

                                <div class="media">

                                    <div class="media-body">
                                        <div class="extra">
                                            <span class="e-datetime">{{ $post->getDay() }} {{ $post->getMonthRu() }}</span>
                                            <a class="e-cat text-uppercase" href="{{ route('front.category', $post->category) }}"><span>{{ $post->category('category_id')->first()->getTitle() }}</span></a>
                                            <span class="e-views"><i class="fa fa-eye"></i>{{ $post->getViewed() }}</span>
                                        </div>
                                        <a class="media-heading" href="{{ route('front.post', $post) }}">
                                            {{ $post->getTitleRuOrKg() }}
                                            @if($post->getIsVideo() == 'yes')<i class="fa fa-video-camera"></i> @endif
                                            @if($post->getIsPhoto() == 'yes')<i class="fa fa-camera"></i> @endif
                                        </a>
                                    </div>

                                </div>

                            @endforeach
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="popular">
                            @foreach($popArticles as $post)

                                <div class="media">

                                    <div class="media-body">
                                        <div class="extra">
                                            <span class="e-datetime">{{ $post->getDay() }} {{ $post->getMonthRu() }}</span>
                                            <a class="e-cat text-uppercase" href="{{ route('front.category', $post->category) }}"><span>{{ $post->category('category_id')->first()->getTitle() }}</span></a>
                                            <span class="e-views"><i class="fa fa-eye"></i>{{ $post->getViewed() }}</span>
                                        </div>
                                        <a class="media-heading" href="{{ route('front.post', $post) }}">{{ $post->getTitleRuOrKg() }}</a>
                                    </div>

                                </div>

                            @endforeach
                        </div>
                    </div>

                </div>

                <footer>

                    <a href="{{ route('front.general') }}">
                        <span>{{ trans('site.PostAllNews') }}<i class="fa fa-arrow-circle-right"></i></span>
                    </a>
                </footer>

            </div>
        </div>

        <a target="_blank" href="#" class="text-center ads ads-300x250 middle-ad">
            <img src="{{ asset('images/banner_240x400.png') }}" alt="phot1"/>
        </a>

    @endif

    {{--<div class="panel panel-default ctg-panel" data-spy="affix" data-offset-top="170" data-offset-bottom="225">--}}
    <div class="panel panel-default ctg-panel">
        <div class="panel-heading">
            <h3 class="panel-title"><span>{{ trans('site.AdminCategories') }}</span></h3>
        </div>
        <div class="panel-body">
            <div class="col-md-12">
                <div class="row">
                    <ul class="list-group">
                        @foreach($categories as $category)
                        <li class="list-group-item">
                            <a href="{{ route('front.category', $category) }}">{{ $category->getTitle() }}</a>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>

        </div>
    </div>

    <a href="#" class="text-center ads ads-300x250 hidden">

        <img src="{{ asset('img/banner/2.jpg') }}" alt=""/>
    </a>

</div><!-- end of left categories -->