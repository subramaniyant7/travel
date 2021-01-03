<!DOCTYPE html>
<html lang="en">
    <body>
        <head>
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width,initial-scale=1">
            <meta name="keywords" content="#">
            <meta name="description" content="#">
            <meta name="csrf-token" content="{{ csrf_token() }}" />
            <title>Toor - Travel Booking HTML5 Template | Homepage</title>
            <!-- Fav and touch icons -->
            <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{ URL:: asset('images/favicon.ico') }}">
            <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{ URL:: asset('images/favicon.ico') }}">
            <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{ URL:: asset('images/favicon.ico') }}">
            <link rel="apple-touch-icon-precomposed" href="{{ URL:: asset('images/favicon.ico') }}">
            <link rel="shortcut icon" href="{{ URL:: asset('images/favicon.ico') }}">
            <!-- Bootstrap -->
            <link href="{{ URL:: asset('css/bootstrap.min.css') }}" rel="stylesheet">
            <!-- Fontawesome -->
            <link href="{{ URL:: asset('css/font-awesome.css') }}" rel="stylesheet">
            <!-- Flaticons -->
            <link href="{{ URL:: asset('css/font/flaticon.css') }}" rel="stylesheet">
            <!-- Slick Slider -->
            <link href="{{ URL:: asset('css/slick.css') }}" rel="stylesheet">
            <!-- Range Slider -->
            <link href="{{ URL:: asset('css/ion.rangeSlider.min.css') }}" rel="stylesheet">
            <!-- Datepicker -->
            <link href="{{ URL:: asset('css/datepicker.css') }}" rel="stylesheet">
            <!-- magnific popup -->
            <link href="{{ URL:: asset('css/magnific-popup.css') }}" rel="stylesheet">
            <!-- Nice Select -->
            <link href="{{ URL:: asset('css/nice-select.css') }}" rel="stylesheet">
            <!-- Custom Stylesheet -->
            <link href="{{ URL:: asset('css/style.css') }}" rel="stylesheet">
            <!-- Custom Responsive -->
            <link href="{{ URL:: asset('css/responsive.css') }}" rel="stylesheet">
            <link rel="stylesheet" href="{{ URL:: asset('admin/plugins/jquery-toast/dist/jquery.toast.min.css') }}">
            <!-- Google Fonts -->
            <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700&amp;display=swap" rel="stylesheet">
            <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&amp;display=swap" rel="stylesheet">

        </head>
        <!-- Start Header -->
        <header class="header">
            <!-- Topbar -->
            <div class="topbar bg-custom-blue">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="left-side">
                                <ul class="custom-flex">
                                    <li>
                                        <a href="#" class="text-custom-white">
                                            <i class="fab fa-facebook-f"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="text-custom-white">
                                            <i class="fab fa-twitter"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="text-custom-white">
                                            <i class="fab fa-instagram"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="text-custom-white">
                                            <i class="fab fa-linkedin"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="right-side">
                                <ul class="custom-flex">
                                @if(Session::has('travel_uid'))
                                    @php
                                        $userInfo = getUserInfo(Session::get('travel_uid'))
                                    @endphp
                                    <li>
                                        <a href="#" class="text-custom-white"> Welcome {{ $userInfo[0]->user_fname.' '.$userInfo[0]->user_lname }}</a>
                                    </li>
                                    <li>
                                        <a href="{{ url('/myaccount') }}" class="text-custom-white">My Account</a>
                                    </li>
                                    <li>
                                        <a href="{{ url('/logout') }}" class="text-custom-white">Logout</a>
                                    </li>
                                @else
                                    <li>
                                        <a href="{{ url('/login') }}" class="text-custom-white">Login</a>
                                    </li>
                                    <li>
                                        <a href="{{ url('/registration') }}" class="text-custom-white">Register</a>
                                    </li>
                                @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Topbar -->

             <!-- Navigation -->
            <div class="navigation">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="main-navigation">
                                <div class="logo">
                                    <a href="{{ url('/') }}">
                                        <img src="{{ URL:: asset('images/toor-logo.png') }}" class="img-fluid image-fit" alt="img">
                                    </a>
                                </div>
                                <div class="main-menu">
                                    <div class="logo">
                                        <a href="{{ url('/') }}">
                                        <img src="{{ URL:: asset('images/toor-logo.png') }}" class="img-fluid image-fit" alt="img">
                                        </a>
                                    </div>
                                    <nav>
                                        <ul class="custom-flex">
                                            <li class="menu-item  active">
                                                <a href="{{ url('/') }}" class="text-light-dark">Home</a>
                                            </li>
                                            <li class="menu-item">
                                                <a href="{{ url('/trips') }}" class="text-light-dark">Trips</a>
                                            </li>
                                            <li class="menu-item ">
                                                <a href="{{ url('/flights') }}" class="text-light-dark">Flights</a>
                                            </li>
                                        </ul>
                                    </nav>
                                </div>
                                <div class="hamburger-menu">
                                    <div class="menu-btn">
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Navigation -->
        </header>
        <!-- End Header -->
