@extends('Front::layouts.default')
@section('title', 'TezTap' )

@section('styles')
    <meta name="_token" content="{!! csrf_token() !!}"/>

    <link rel="stylesheet" type="text/css" href="{{ asset('css/jasny-bootstrap.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap-select.css') }}"/>
@stop

@section('content')
    <div class="wrapper">

        <div class="main">


            <div class="section landing-section section-with-space section-gray-gradient section-form">

                <div class="container">
                    <div class="row">
                        <div class="row">
                            <div class="container">
                                <div class="row">

                                    

                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>


        </div>
    </div>
@stop

@section('scripts')
    <script type="text/javascript" src="{{ asset('js/jasny-bootstrap.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/bootstrap-select.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/jquery.validate.min.js') }}"></script>

    <script>

        $(document).ready(function()
        {

            $("#taskType.no-ajax .btn").click(function () {
                $("#tooltipCategory").addClass("in");
                setTimeout(function() {
                    $('#tooltipCategory').removeClass('in');
                }, 3000);
            });

            $.ajaxSetup({
                headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
            });

            $("#category").change(function()
            {
                var id=$(this).val();
                var dataString = 'id='+ id;
                var url = "new";

                $("#taskType.no-ajax .btn").click(function () {
                    $("#tooltipCategory").removeClass("in");
                    setTimeout(function() {
                        $('#tooltipCategory').removeClass('in');
                    }, 2000);
                });

                $.ajax
                ({
                    type: "POST",
                    url: 'new',
                    data: dataString,
                    cache: false,
                    success: function(data)
                    {
                        $("#type").html(data).parent().addClass('no-ajax');
                    }
                });

            });

            $("#newTask").validate({
                submitHandler: function(form) {
                    $(form).ajaxSubmit();
                }
            });

        });

    </script>
@stop