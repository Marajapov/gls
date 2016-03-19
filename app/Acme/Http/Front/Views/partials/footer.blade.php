</div>
<footer class="footer-demo section-light-blue">
    <div class="container">
        <nav class="pull-left">
            <ul>
                <li>
                    <a href="{{route('front.verification')}}">
                        Как стать исполнителем?
                    </a>
                </li>
                <li>
                    <a href="#">
                        Контакты
                    </a>
                </li>
            </ul>
        </nav>
        <div class="copyright pull-right">
            &copy; 2016, TezTap
        </div>
    </div>
</footer>

</body>

<script src="{{ asset('js/jquery-1.11.2.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/jquery-ui-1.10.4.custom.min.js') }}" type="text/javascript"></script>

<script src="{{ asset('js/bootstrap.js') }}" type="text/javascript"></script>

<script src="{{ asset('js/ct-paper.js') }}"></script>

<script>
    $(window).load(function () {
        if($('body').height() == $('#wrapper').height()){
            $('#wrapper').css("margin-bottom",-$('.footer-demo').height());
        }
//
    });
</script>

@yield('scripts')

</html>