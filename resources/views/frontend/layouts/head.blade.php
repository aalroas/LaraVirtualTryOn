    <meta charset="utf-8">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
   <meta name="description" content="{{ GeneralSiteSettings("site_meta_descriptions")}}">
    <meta name="keywords" content="{{ GeneralSiteSettings("site_meta_keywords")}}">
    <meta name="author" content="{{ GeneralSiteSettings("site_title")}}">
    <link rel="icon" href="{{asset(URL::to('uploads/settings', GeneralSiteSettings("site_icon")))}}" type="image/x-icon">
    <link rel="shortcut icon" href="{{asset(URL::to('uploads/settings',GeneralSiteSettings("site_icon")))}}" type="image/x-icon">
    <title>{{ GeneralSiteSettings("site_title")}}</title>
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/fontawesome.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/slick.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/slick-theme.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/animate.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/themify-icons.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/bootstrap.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/color8.css')}}" media="screen" id="color">
