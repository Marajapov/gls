<footer class="footer">
    <div class="container-fluid">
        <p class="copyright pull-right">
            &copy; 2016 <a href="#">Ulut.kg</a>, made with love for a better web
        </p>
    </div>
</footer>
</div>
</div>

<!--   Core JS Files   -->
<script src="{{ asset('js/jquery-1.11.2.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/bootstrap.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/bootstrap-select.js') }}" type="text/javascript"></script>

<!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
<script src="{{ asset('js/admin/light-bootstrap-dashboard.js') }}"></script>

<script>
    $(document).ready(function () {
        $(function () {
            var url = window.location;
            var pathArray = window.location.pathname.split( '/' );
            $('.sidebar a').each(function () {
                var href = $(this).attr('href');
                var hrefArray = href.split( '/' );
                if(hrefArray[4] == pathArray[2]){
                    $(this).parent('li').addClass('active');
                }

//                if()
            });
//            $('.sidebar a[href="' + url + '"]').parent('li').addClass('active');
        });
    });
</script>

@yield('scripts')

</body>
</html>