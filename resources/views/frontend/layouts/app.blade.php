<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('frontend.layouts.head')
</head>
<body>
    @include('frontend.layouts.header')

    @yield('content')

    @include('frontend.layouts.footer')
</body>
</html>
