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
<script src="{{ asset('js/bootstrap.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/bootstrap-select.js') }}" type="text/javascript"></script>

<!--  Checkbox, Radio & Switch Plugins -->
<script src="{{ asset('js/admin/bootstrap-checkbox-radio-switch.js') }}"></script>

<!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
<script src="{{ asset('js/admin/light-bootstrap-dashboard.js') }}"></script>

<script>
    $(document).ready(function () {
        $(function () {
            var url = window.location;
            $('.sidebar a[href="' + url + '"]').parent('li').addClass('active');
            $('.sidebar a').filter(function () {
                return this.href == url;
            }).parent('li').addClass('active');
        });
    });
</script>

@yield('footer')

</body>
</html>