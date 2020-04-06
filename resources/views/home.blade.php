<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Transferista</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!--Style Sheets-->
        <link rel="apple-touch-icon" href="apple-touch-icon.png">
        <link href="https://fonts.googleapis.com/css?family=Lato|Montserrat" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('front/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('front/css/normalize.css') }}">
        <link rel="stylesheet" href="{{ asset('front/css/owl.carousel.css') }}">
        <link rel="stylesheet" href="{{ asset('front/css/owl.theme.css') }}">
        <link rel="stylesheet" href="{{ asset('front/css/font-awesome.min.css') }}">
         <link rel="stylesheet" href="{{ asset('front/fonts/flaticon.css') }}">
        <link rel="stylesheet" href="{{ asset('front/css/style.css') }}">
        <link rel="stylesheet" href="{{ asset('front/css/main.css') }}">
        <link rel="stylesheet" href="{{ asset('front/css/responsive.css') }}">
        <link rel="stylesheet" href="{{ asset('front/css/color.css') }}">
        <script src="{{ asset('front/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js') }}"></script>
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>
    <body>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        <div id="app" class="v-content__wrap">
            <div id="xp-wrapper" >
                <app-home></app-home>
            </div>
        </div>
        <script src="{{asset('front/js/vendor/jquery.js') }}"></script>
        <script src="{{asset('front/js/vendor/jquery-ui.min.js') }}"></script>
        <script src="{{asset('front/js/vendor/owl.carousel.min.js') }}"></script>
        <script src="{{asset('front/js/vendor/bootstrap.min.js') }}"></script>
        <script src="{{asset('front/js/vendor/isotope.pkgd.js') }}"></script>
        <script src="{{asset('front/js/vendor/scrollreveal.min.js') }}"></script>
        <script src="{{asset('front/js/vendor/jquery.appear.js') }}"></script>
        <script src="{{asset('front/js/vendor/custom.js') }}"></script>
        <script src="{{asset('front/js/vendor/parallax.min.js') }}"></script>
        <script src="{{asset('front/js/vendor/masonry-horizontal.js') }}"></script>
        <script src="{{asset('front/js/vendor/classie.js') }}"></script>
        <script src="{{asset('front/js/main.js') }}"></script>
        <script src="{{ asset('js/app.js') }}" defer></script>
    </body>
</html>
