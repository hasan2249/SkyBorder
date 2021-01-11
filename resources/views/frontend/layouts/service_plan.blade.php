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
        <meta name="description" content="@yield('meta_description', 'Laravel Starter')">
        <meta name="author" content="@yield('meta_author', 'top tech')">

        <!-- Favicon -->
        <link href="https://megaone.acrothemes.com/creative-piling/images/favicon.ico" rel="icon">
        <link href="{{asset('css/custome.css')}}" rel="stylesheet">
    </head>
    <body>

                @yield('content')

        <!-- Scripts -->
        <script src="{{asset('js/gallery.js')}}"></script>
    </body>
</html>
