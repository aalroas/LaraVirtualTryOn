    <meta charset="utf-8">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="{{ GeneralSiteSettings("site_meta_descriptions")}}">
    <meta name="keywords" content="{{ GeneralSiteSettings("site_meta_keywords")}}">
    <meta name="author" content="{{ GeneralSiteSettings("site_title")}}">
    <link rel="icon" href="{{asset(URL::to('uploads/settings', GeneralSiteSettings("site_icon")))}}" type="image/x-icon">
    <link rel="shortcut icon" href="{{asset(URL::to('uploads/settings',GeneralSiteSettings("site_icon")))}}" type="image/x-icon">
    <title>{{ GeneralSiteSettings("site_title")}}</title>

    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Work+Sans:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Font Awesome-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/fontawesome.css')}}">

    <!-- Flag icon-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/flag-icon.css')}}">

    <!-- ico-font-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/icofont.css')}}">

    <!-- Prism css-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/prism.css')}}">

    <!-- Chartist css -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/chartist.css')}}">

    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/bootstrap.css')}}">

    <!-- App css-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/admin.css')}}">
