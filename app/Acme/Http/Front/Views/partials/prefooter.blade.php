<div class="container prefooter clearfix">

    <div class="footer-channels">
        <ul>
            <li>
                <a href="{{ route('front.home') }}">
                    <img src="{{ asset('images/channels/small/1.png') }}" alt=""/>
                </a>
            </li>
            <li>
                <a href="{{ route('muzkanal.home') }}">
                    <img src="{{ asset('images/channels/small/2.png') }}" alt=""/>
                </a>
            </li>
            <li>
                <a href="{{ route('balastan.home') }}">
                    <img src="{{ asset('images/channels/small/3.png') }}" alt=""/>
                </a>
            </li>
            <li>
                <a href="{{ route('madaniyat.home') }}">
                    <img src="{{ asset('images/channels/small/4.png') }}" alt=""/>
                </a>
            </li>
            <li>
                <a href="{{ route('kyrgyzradio.home') }}">
                    <img src="{{ asset('images/channels/small/5.png') }}" alt=""/>
                </a>
            </li>
            <li>
                <a href="{{ route('birinchi.home') }}">
                    <img src="{{ asset('images/channels/small/6.png') }}" alt=""/>
                </a>
            </li>
            <li>
                <a href="{{ route('dostuk.home') }}">
                    <img src="{{ asset('images/channels/small/7.png') }}" alt=""/>
                </a>
            </li>
            <li>
                <a href="{{ route('minkiyal.home') }}">
                    <img src="{{ asset('images/channels/small/8.png') }}" alt=""/>
                </a>
            </li>
        </ul>
    </div>

    <div class="footer-info clearfix">
        <div class="col-md-4 apps-logo">
            <p>
                {{ trans('site.KtrkApp') }}
            </p>
            <ul>
                <li>
                    <a href="https://play.google.com/store/apps/details?id=ktrk.kg.app">
                        <img src="{{ asset('images/android.png') }}" alt="ktrk_adnroid"/>
                    </a>
                </li>
                <li>
                    <a href="https://itunes.apple.com/kg/app/ktrk-official/id1004194204">
                        <img src="{{ asset('images/ios.png') }}" alt="ktrk_ios"/>
                    </a>
                </li>
            </ul>
        </div>

        <div class="col-md-8 footer-menu">

            <ul>
                <li><a href="{{ route('front.home') }}">{{ trans('site.Homepage') }}</a></li>
                <li>/</li>
                <li><a href="{{ route('front.media.index') }}">Видеопортал</a></li><li>/</li>
                <li><a href="{{ route('front.pages.program') }}">Программа</a></li><li>/</li>
                {{--<li><a href="#">{{ trans('site.Ads') }}</a></li><li>/</li>--}}
                <li><a href="{{ route('front.pages.reklama') }}">{{ trans('site.Ads') }}</a></li><li>/</li>
                {{--<li><a href="#">{{ trans('site.Contacts') }}</a></li>--}}
                <li><a href="{{ route('front.pages.contacts') }}">{{ trans('site.Contacts') }}</a></li>
            </ul>

            <h4 class="copyright"><i class="fa fa-copyright"></i><?php echo date("Y"); ?> {{ trans('site.TradeMark') }}</h4>
            <p class="text-center" style="margin: 0; font-size: 13px;">{{ trans('site.Developed') }} <a href="http://ulut.kg/" target="_blank">Улут Софт</a></p>

        </div>
    </div>

</div>
