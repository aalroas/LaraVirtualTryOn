<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('backend.layouts.head');
</head>
<body>
    @include('backend.layouts.header');

    @yield('content')

    @include('backend.layouts.footer');
</body>
</html>
