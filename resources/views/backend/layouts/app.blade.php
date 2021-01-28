<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('backend.layouts.head')
    @yield('custom-css')
</head>
<body>
    <!-- page-wrapper Start-->
    <div class="page-wrapper">

    @include('backend.layouts.header')
<!-- Page Body Start-->
    <div class="page-body-wrapper">
    @include('backend.layouts.sidebar')

    @yield('content')

    @include('backend.layouts.footer')

    </div>
    </div>


    @include('backend.layouts.js')
    @yield('custom-js')
</body>
</html>
