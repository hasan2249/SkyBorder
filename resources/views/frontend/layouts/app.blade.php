<!DOCTYPE html>
@langrtl
    <!-- <html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="rtl"> -->
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}" >
@else
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@endlangrtl
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>@yield('title', app_name())</title>
        <meta name="description" content="@yield('meta_description', 'skyBorder')">
        <meta name="author" content="@yield('meta_author', 'top tech')">

        <!-- Favicon -->
        <link href="images/main-logo.png" rel="icon">
        <!-- Bundle -->
        <link href="css/bundle.min.css" rel="stylesheet">
        <!-- Plugin Css -->
        <link rel="stylesheet" href="{{asset('css/revolution-settings.min.css')}}">
        <link rel="stylesheet" href="{{asset('css/owl.carousel.min.css')}}">
        <link rel="stylesheet" href="{{asset('css/swiper.min.css')}}">
        <link rel="stylesheet" href="{{asset('css/LineIcons.min.css')}}">
        <!-- Style Sheet -->
        <link href="{{asset('css/jquery.pagepiling.css')}}" rel="stylesheet">
        <link rel="stylesheet" href="{{asset('css/pagepiling.css')}}">
        <link href="{{asset('css/style.css')}}" rel="stylesheet">
        <link href="{{asset('css/custome.css')}}" rel="stylesheet">
    </head>
    <body data-spy="scroll" data-target=".navbar" data-offset="90">

                @yield('content')

        <!-- Scripts -->

        <!-- JavaScript -->
        <script src="{{asset('js/bundle.min.js')}}" defer ></script>

        <!-- Plugin Js -->
        <script src="{{asset('js/owl.carousel.min.js')}}" defer ></script>
        <script src="{{asset('js/swiper.min.js')}}" defer ></script>
        <script src="{{asset('js/jquery.appear.js')}}" defer ></script>
        <script src="{{asset('js/TweenMax.min.js')}}" defer ></script>
        <script src="{{asset('js/parallaxie.min.js')}}" defer ></script>
        <!-- REVOLUTION JS FILES -->
        <script src="{{asset('js/jquery.themepunch.tools.min.js')}}" defer ></script>
        <script src="{{asset('js/jquery.themepunch.revolution.min.js')}}" defer ></script>
        <!-- SLIDER REVOLUTION EXTENSIONS -->
        <script src="{{asset('js/extensions/revolution.extension.actions.min.js')}}" defer ></script>
        <script src="{{asset('js/extensions/revolution.extension.carousel.min.js')}}" defer ></script>
        <script src="{{asset('js/extensions/revolution.extension.kenburn.min.js')}}" defer ></script>
        <script src="{{asset('js/extensions/revolution.extension.layeranimation.min.js')}}" defer ></script>
        <script src="{{asset('js/extensions/revolution.extension.migration.min.js')}}" defer ></script>
        <script src="{{asset('js/extensions/revolution.extension.navigation.min.js')}}" defer ></script>
        <script src="{{asset('js/extensions/revolution.extension.parallax.min.js')}}" defer ></script>
        <script src="{{asset('js/extensions/revolution.extension.slideanims.min.js')}}" defer ></script>
        <script src="{{asset('js/extensions/revolution.extension.video.min.js')}}" defer ></script>
        <script src="{{asset('js/extensions/revolution.extension.beforeafter.min.js')}}" defer ></script>

        <script src="{{asset('js/jquery.pagepiling.min.js')}}" defer ></script>
        <script src="{{asset('js/swiper-thumbnail.js')}}" defer ></script>
        <script src="{{asset('js/contact_us.js')}}" defer ></script>
        <script src="{{asset('js/script.js')}}" defer ></script>


        @include('includes.partials.ga')
    </body>
</html>
