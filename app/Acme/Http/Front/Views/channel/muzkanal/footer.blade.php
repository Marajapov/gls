<script type="text/javascript" src="{{ asset('js/bootstrap.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/bootstrap-hover-dropdown.js') }}"></script>

<script type="text/javascript" src="{{ asset('js/jquery-migrate-1.2.1.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('slick/slick.min.js') }}"></script>

<script src="{{ asset('jwplayer/jwplayer.js') }}"></script>
<script>jwplayer.key="tmEO2SU8NzqLBoHr2Vq6nV13XCyfo8xbdiCb/Q==";</script>

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