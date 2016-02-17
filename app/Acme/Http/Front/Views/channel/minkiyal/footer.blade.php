<div class="container prefooter clearfix">

    <div class="footer-info clearfix">
        <div class="col-md-12 footer-menu">

            <h4 class="copyright"><i class="fa fa-copyright"></i><?php echo date("Y"); ?> {{ trans('site.TradeMark') }}</h4>
            <p class="text-center minkiyal_footer">{{ trans('site.Developed') }} <a style="color: #E7EFF2;" href="http://ulut.kg/" target="_blank">Улут Софт</a></p>

        </div>
    </div>

</div>


<script type="text/javascript" src="{{ asset('js/bootstrap.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/bootstrap-hover-dropdown.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/jquery-migrate-1.2.1.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('slick/slick.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/mousescroll.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/smoothscroll.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/main.js') }}"></script>

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