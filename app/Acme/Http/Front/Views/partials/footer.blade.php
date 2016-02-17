<footer class="footer hidden">
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <ul>
                                <li><a href="#">{{ trans('site.Homepage') }}</a></li>
                                <li><a href="#">КТРК</a></li>
                                <li><a href="#">Видеопортал</a></li>
                                <li><a href="#">Программа передач</a></li>
                                <li><a href="#">{{ trans('site.BaikoochuKenesh') }}</a></li>
                                <li><a href="#">{{ trans('site.RedKenesh') }}</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

@include('Front::partials.prefooter')

</div>

</div>

<script type="text/javascript" src="{{ asset('js/bootstrap.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/bootstrap-hover-dropdown.js') }}"></script>

<script>
    $(document).ready(function(){
        $(".search-toggle").click(function(){
            $(".logo-block").addClass("search-show");
            $(".form-search").addClass("visible");
        });
        $(".close-search").click(function(){
            $(".logo-block").removeClass("search-show");
            $(".form-search").removeClass("visible");
        });

      var header = $('#videoTitle span');
      $('.slider-nav .slick-slide').each(function(){
        var videoTitle = $(this).children('.videoTitle').text();
        $(this).click(function () {
          header.text(videoTitle);
        });
      });
    });
</script>

<script type="text/javascript" src="{{ asset('filter/js/jquery.easing.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('filter/js/jquery.mixitup.min.js') }}"></script>

<script type="text/javascript" src="{{ asset('js/jquery-migrate-1.2.1.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('slick/slick.min.js') }}"></script>

<!--Carousel-->
<script>
    $('.carousel-post').slick({
        infinite: true,
        speed: 500,
        fade: true,
        cssEase: 'linear'
    });
    $('.carousel-reporter').slick({
        infinite: true,
        slidesToShow: 3,
        slidesToScroll: 1
    });
    $('.carousel-slick').slick({
        infinite: true,
        slidesToShow: 3,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 2500
    });
    $('.carousel-director').slick({
        arrows: false,
        infinite: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 3000
    });
</script>

<script src="{{ asset('jwplayer/jwplayer.js') }}"></script>
<script>jwplayer.key="tmEO2SU8NzqLBoHr2Vq6nV13XCyfo8xbdiCb/Q==";</script>

<script type="text/javascript">

    var playerInstance = jwplayer("player");

//    $('#playerPlay').click(function(){
//        playerInstance.play();
//    });
    $('#playerStop').click(function(){
        playerInstance.stop();
    });

    playerInstance.setup({
        autostart: true,
        playlist: [{
            image: "{{-- asset('images/live_bg.png') --}}",
            sources: [{
                file: "rtmp://212.112.96.233:1936/live/ktrk.stream"
            }]
        }],
        width: "640",
        height: "360",
        aspectratio: "",
        primary: "flash",
        skin: {
            name: "five"
        },
        stretching: "exactfit"
    });
</script>

<script>
    var toggleSlide = function(){
        $(".main-nav ul.active").removeClass('active')
                .next().add(".main-nav ul:first").last().addClass("active");
    }
    setInterval(toggleSlide, 5000);
</script>

<script>
    $(document).ready(function () {
        var trigger = $('.hamburger'),
            overlay = $('.overlay'),
            isClosed = false;

        trigger.click(function () {
            hamburger_cross();
        });

        function hamburger_cross() {

            if (isClosed == true) {
                overlay.hide();
                trigger.removeClass('is-open');
                trigger.addClass('is-closed');
                isClosed = false;
            } else {
                overlay.show();
                trigger.removeClass('is-closed');
                trigger.addClass('is-open');
                isClosed = true;
            }
        }

        $('[data-toggle="offcanvas"]').click(function () {
            $('#wrapper').toggleClass('toggled');
        });
    });
</script>

@yield('footerScript')

@yield('footerscript2')


<!-- Google Analytics -->
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-71814746-1', 'auto');
  ga('send', 'pageview');

</script>
<!-- end Google Analytics -->

</body>
</html>