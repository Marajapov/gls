<div class="container-fluid prefooter clearfix">
   <div class="row">
      <div class="container">
         <div class="media">
            <div class="media-left media-middle">
               <a href="{{ route('balastan.home') }}">
               <img class="media-object" src="{{ asset('images/channels/balastan_white_notext.png') }}" alt="...">
               </a>
            </div>
            <div class="media-body footer-menu media-middle">
               <ul>
                  <li><a href="{{ route('balastan.home') }}">{{ trans('site.Homepage') }}</a></li>
                  <li>|</li>
                  <li><a href="{{ route('balastan.about') }}">{{ trans('radiopages.BAbout') }}</a></li>
                  <li>|</li>
                  <li><a href="{{ route('balastan.world') }}">{{ trans('radiopages.Bworld') }}</a></li>
                  <li>|</li>
                  <li><a href="{{ route('balastan.videos') }}">Видео</a></li>
                  <li>|</li>
                  <li><a href="{{ route('balastan.allphotos') }}">{{ trans('radiopages.Photos') }}</a></li>
               </ul>
               <h4 class="copyright"><i class="fa fa-copyright"></i>2015 {{ trans('site.TradeMark') }}</h4>
            </div>
         </div>
      </div>
   </div>
</div>
</div>
</div>
<script type="text/javascript" src="{{ asset('js/bootstrap.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/jquery-migrate-1.2.1.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('slick/slick.min.js') }}"></script>
<!-- Search -->
<script>
   $(document).ready(function () {
       $(".search-toggle").click(function () {
           $(".logo-block").addClass("search-show");
           $(".form-search").addClass("visible");
       });
       $(".close-search").click(function () {
           $(".logo-block").removeClass("search-show");
           $(".form-search").removeClass("visible");
   
       });
   });
</script> 
<!--Carousel-->
<script>
   $('.carousel-slick').slick({
       infinite: true,
       slidesToShow: 3,
       slidesToScroll: 1,
       autoplay: true,
       autoplaySpeed: 2500
   });
</script>
@yield('footerScript')
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