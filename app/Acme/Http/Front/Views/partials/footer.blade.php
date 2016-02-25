<footer class="footer-demo section-light-blue">
    <div class="container">
        <nav class="pull-left">
            <ul>

                <li>
                    <a href="#">
                        О проекте
                    </a>
                </li>
                <li>
                    <a href="#">
                        Как это работает?
                    </a>
                </li>
                <li>
                    <a href="#">
                        Помощь
                    </a>
                </li>
            </ul>
        </nav>
        <div class="copyright pull-right">
            &copy; 2016, GLS
        </div>
    </div>
</footer>

</body>

<script src="{{ asset('js/jquery-1.11.2.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/jquery-ui-1.10.4.custom.min.js') }}" type="text/javascript"></script>

<script src="{{ asset('js/bootstrap.js') }}" type="text/javascript"></script>

<script src="{{ asset('js/ct-paper.js') }}"></script>

@yield('scripts')

</html>