<!-- Title -->
<title> @yield('title')</title>
@if(App::getLocale() =='ar')
    <!-- Favicon -->
    <link rel="icon" href="{{asset('assets/dashboard/img/brand/favicon.png')}}" type="image/x-icon"/>
    <!-- Icons css -->
    <link href="{{asset('assets/dashboard/css/icons.css')}}" rel="stylesheet">
    <!--  Custom Scroll bar-->
    <link href="{{asset('assets/dashboard/plugins/mscrollbar/jquery.mCustomScrollbar.css')}}" rel="stylesheet"/>
    <!--  Sidebar css -->
    <link href="{{asset('assets/dashboard/plugins/sidebar/sidebar.css')}}" rel="stylesheet">
    <!-- Sidemenu css -->
    <link rel="stylesheet" href="{{asset('assets/dashboard/css-rtl/sidemenu.css')}}">
    <!--- Style css -->
    <link href="{{asset('assets/dashboard/css-rtl/style.css')}}" rel="stylesheet">
    <!--- Dark-mode css -->
    <link href="{{asset('assets/dashboard/css-rtl/style-dark.css')}}" rel="stylesheet">
    <!---Skinmodes css-->
    <link href="{{asset('assets/dashboard/css-rtl/skin-modes.css')}}" rel="stylesheet">

@else

    <!-- Favicon -->
    <link rel="icon" href="{{asset('assets/dashboard/img/brand/favicon.png')}}" type="image/x-icon"/>
    <!-- Icons css -->
    <link href="{{asset('assets/dashboard/css/icons.css')}}" rel="stylesheet">
    <!--  Custom Scroll bar-->
    <link href="{{asset('assets/dashboard/plugins/mscrollbar/jquery.mCustomScrollbar.css')}}" rel="stylesheet"/>
    <!--  Right-sidemenu css -->
    <link href="{{asset('assets/dashboard/plugins/sidebar/sidebar.css')}}" rel="stylesheet">
    <!-- Sidemenu css -->
    <link rel="stylesheet" href="{{asset('assets/dashboard/css/sidemenu.css')}}">
    <!-- Maps css -->
    <link href="{{asset('assets/dashboard/plugins/jqvmap/jqvmap.min.css')}}" rel="stylesheet">
    <!-- style css -->
    <link href="{{asset('assets/dashboard/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('assets/dashboard/css/style-dark.css')}}" rel="stylesheet">
    <!---Skinmodes css-->
    <link href="{{asset('assets/dashboard/css/skin-modes.css')}}" rel="stylesheet"/>

@endif

@stack('css')
