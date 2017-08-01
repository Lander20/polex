<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en" class="no-js">
<!--<![endif]-->
<head>
    <meta charset="utf-8"/>
    <title>Prueba</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport"/>
    <meta content="" name="description"/>
    <meta content="" name="author"/>

    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <link href="/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <link href="/plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="/plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Morris Chart Css-->
    <link href="/plugins/morrisjs/morris.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="/css/style.css" rel="stylesheet">
    <link href="/css/style-2.css" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="/css/themes/all-themes.css" rel="stylesheet" />

    <link rel="stylesheet" href="/css/style.css" />

</head>
<body class="theme-red-login">
    <section style="top: 30%; left: 33%;width: auto; height: auto; position: absolute;">
        <div class="container-fluid">
            <div class="row clearfix">
                <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                    {{ csrf_field() }}

                    <div class="col-xs-11 col-md-10">
                        <div class="col-xs-12">
                            <div class="form-group form-float {{ $errors->has('email') ? ' has-error' : '' }}">

                                <div class="form-line">
                                    <input type="email" class="form-control" name="email" value="{{ old('email') }}">
                                    <label class="form-label" style="color:white">Email Address</label>
                                </div>
                            </div>
                        </div>

                        <div class="col-xs-12" style="margin-top: 20px">
                            <div class="form-group form-float {{ $errors->has('password') ? ' has-error' : '' }}">
                                <div class="form-line">
                                    <input id="password" type="password" class="form-control" name="password">
                                    <label class="form-label" style="color:white">Password Address</label>
                                </div>
                            </div>
                        </div>

                        <div class="col-xs-12" style="margin-top: 20px">
                            <div class="form-group">
                                <button type="submit" class="btn btn-danger col-xs-12 waves-red" style="margin-bottom: 10px">
                                    <i class="fa fa-btn fa-sign-in"></i> Login
                                </button>
                                <a class="btn-olvide"></a>
                                {{--<a class="btn-olvide" href="{{ url('/password/reset') }}">Olvide la contraseña?</a>--}}
                            </div>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </section>


    <script src="/plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="/plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Select Plugin Js -->
    <script src="/plugins/bootstrap-select/js/bootstrap-select.js"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="/plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="/plugins/node-waves/waves.js"></script>

    <!-- Jquery CountTo Plugin Js -->
    <script src="/plugins/jquery-countto/jquery.countTo.js"></script>

    <!-- Morris Plugin Js -->
    <script src="/plugins/raphael/raphael.min.js"></script>
    <script src="/plugins/morrisjs/morris.js"></script>

    <!-- ChartJs -->
    <script src="/plugins/chartjs/Chart.bundle.js"></script>

    <!-- Flot Charts Plugin Js -->
    <script src="/plugins/flot-charts/jquery.flot.js"></script>
    <script src="/plugins/flot-charts/jquery.flot.resize.js"></script>
    <script src="/plugins/flot-charts/jquery.flot.pie.js"></script>
    <script src="/plugins/flot-charts/jquery.flot.categories.js"></script>
    <script src="/plugins/flot-charts/jquery.flot.time.js"></script>

    <!-- Sparkline Chart Plugin Js -->
    <script src="/plugins/jquery-sparkline/jquery.sparkline.js"></script>

    <!-- Custom Js -->
    <script src="/js/admin.js"></script>
    <script src="/js/function.js"></script>
    <script src="/js/pages/index.js"></script>

    <!-- Demo Js -->
    <script src="/js/demo.js"></script>

</body>
</html>
