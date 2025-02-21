<!DOCTYPE html>
<html lang="en">

<head>
    <title>{{ config('app.name', 'Family Pool Service') }}</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Dosis:200,300,400,500,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Overpass:300,400,400i,600,700" rel="stylesheet">

    <meta name="description" content="Family Pool Service is the ">
    <meta name="keywords" content="Family">
    <meta name="keywords" content="Pool">
    <meta name="keywords" content="Service">
    <meta name="keywords" content="Swimming">
    <meta name="keywords" content="Cleaning">
    <meta name="keywords" content="MEMPHIS Pool">
    <meta name="keywords" content="TENNESSEE Pool">
    <meta name="keywords" content="Amani Joel">
    <meta name="keywords" content="3529 TALL OAKS CIRCLE">
    <meta name="keywords" content="Pool Closing">
    <meta name="keywords" content="Pool Opening">
    <meta name="keywords" content="Winterizing">
    <meta name="keywords" content="Pool Cleaning">


    <link rel="stylesheet" href="assets/css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/animate.css">

    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="assets/css/magnific-popup.css">

    <link rel="stylesheet" href="assets/css/aos.css">

    <link rel="stylesheet" href="assets/css/ionicons.min.css">

    <link rel="stylesheet" href="assets/css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="assets/css/jquery.timepicker.css">

    <link rel="stylesheet" href="assets/css/flaticon.css">
    <link rel="stylesheet" href="assets/css/icomoon.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/stylesheet.css">
    <link rel="stylesheet" href="assets/css/callouts.css">
    <link rel="icon" href="/storage/images/logo/logo.png">

    <style>
    /* Center the notification both horizontally and vertically */
    .notify {
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        z-index: 1000;
        /* Adjust the z-index as needed to ensure it's above other content */
        padding: 15px;
        /* Adjust padding to style the notification box */
        text-align: center;
        /* Center the text horizontally */
        width: 300px;
        /* Set a width for the notification box */
        background-color: #4CAF50;
        /* Background color for success */
        color: #fff;
        /* Text color */
        border-radius: 5px;
        /* Rounded corners for the box */
    }

    .success {
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        z-index: 1000;
        /* Adjust the z-index as needed to ensure it's above other content */
        padding: 15px;
        /* Adjust padding to style the notification box */
        text-align: center;
        /* Center the text horizontally */
        width: 300px;
        /* Set a width for the notification box */
        background-color: #4CAF50;
        /* Background color for success */
        color: #fff;
        /* Text color */
        border-radius: 5px;
        /* Rounded corners for the box */
    }

    .error {
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        z-index: 1000;
        /* Adjust the z-index as needed to ensure it's above other content */
        padding: 15px;
        /* Adjust padding to style the notification box */
        text-align: center;
        /* Center the text horizontally */
        width: 300px;
        /* Set a width for the notification box */
        background-color: #cf2424;
        /* Background color for success */
        color: #fff;
        /* Text color */
        border-radius: 5px;
        /* Rounded corners for the box */
    }

    .profile-image {
        width: 30px;
        height: 30px;
        background-size: contain;
        background-position: center;
        border-radius: 50%;
        outline: 1px solid white;
    }

    .profile-image :hover {
        outline: 2px solid white;
        transition: cubic-bezier(0.075, 0.82, 0.165, 1)
    }



    .user-profile li {
        list-style: none;
        padding-top: 4px;
    }

    .dropdown-menu {
        margin-left: -20px;
    }

    li a {
        color: blue
    }

    .user-icon .icon {
        font-size: 2em;
    }

    .navt {
        position: absolute;
        right: 1em;
        top: 1em;
    }

    .profile {
        position: absolute;
        left: 35%;
        top: 1em;
    }

    @media (max-width: 600px) {
        .profile {
            position: absolute;
            left: 10em;
            top: 1em;
        }
    }
    </style>


</head>

<body id="exit">

    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
        <div class="container">
            <a class="" href="{{'/'}}">
                <img src="/storage/images/logo/logo.png" style="width: 50px; height: auto" alt="logo" class="logo-img">
            </a>
            <div class="nav-area"></div>

            <button class="navbar-toggler navt" type="button" data-bs-toggle="collapse" data-bs-target="#ftco-nav"
                aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">MENU
                <span class="oi oi-menu"></span>
            </button>
            <!-- <div class="navigation-top"> -->
            <div class="collapse navbar-collapse" id="ftco-nav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item"><a href="{{'/'}}" class="nav-link">Home</a></li>
                    <li class="nav-item"><a href="{{'/service'}}" class="nav-link">Service</a></li>
                    <li class="nav-item"><a href="{{'/category'}}" class="nav-link">Categories</a>
                    </li>
                    <li class="nav-item"><a href="{{'gallery'}}" class="nav-link">Gallery</a></li>
                    <li class="nav-item"><a href="{{'/about'}}" class="nav-link">About</a></li>
                    <li class="nav-item"><a href="{{'/contact'}}" class="nav-link">Contact</a></li>
                </ul>
            </div>
            @if (Route::has('login'))
            <div class="dropdown profile">
                @auth
                <a class="dropdown-toggle" role="button" id="dropDown" data-bs-toggle="dropdown" arial-expanded="false">
                    <img src="{{Auth::user()->profile_photo_path ? '/storage/'.Auth::user()->profile_photo_path : '/storage/profile-photos/profile.jpg'}}"
                        class="profile-image">
                </a>
                <ul class="dropdown-menu">
                    <li>
                        <a class="dropdown-item" href="{{'/dashboard'}}"> Account</a>
                    </li>
                    <li>
                        <a href="{{ route('logout') }}" class="dropdown-item"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                </ul>
                @else
                <a class="dropdown-toggle" type="button" role="button" id="dropDown" data-bs-toggle="dropdown"
                    arial-expanded="false">
                    <span class="icon icon-user" style="font-size:2em; color:grey"></span>
                </a>
                <ul class="dropdown-menu">
                    <li>
                        <a class="dropdown-item" href="{{route('login')}}">Log In</a>
                    </li>
                    <div class="dropdown-divider"></div>
                    <!-- <li>
                        <a class="dropdown-item" href="{{ url('/register') }}">Sign Up</a>
                    </li> -->
                </ul>
                @endauth
            </div>
            @endif
            <!-- </div> -->
        </div>
    </nav>
    <!-- END nav -->

    <!-- @if (Route::has('login'))
    <div class="user-profile dropstart">

        @auth
        <a class="dropdown-toggle" type="button" role="button" id="dropDown" data-bs-toggle="dropdown" arial-expanded="false">
            <img src="{{Auth::user()->profile_photo_path ? '/storage/'.Auth::user()->profile_photo_path : '/storage/profile-photos/profile.jpg'}}" class="profile-image">
        </a>
        <button class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown" arial-expanded="false">Drop</button>
        <ul class="dropdown-menu">
            <li>
                <a class="dropdown-menu-item" href="{{'/dashboard'}}">My Account</a>
            </li>
            <div class="dropdown-divider"></div>
            <li>
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </li>
        </ul>

        @else
        <a class="dropdown-toggle user-icon" role="button" id="dropDown" data-toggle="dropdown">
            <span class="icon icon-user"></span>
        </a>
        <div class="dropdown-menu" arial-labelledby="dropDown">
            <ul>
                <li>
                    <a class="dropdown-menu-item" href="{{route('login')}}">Log In</a>
                </li>
                <div class="dropdown-divider"></div>
                <li>
                    <a class="dropdown-menu-item" href="{{ url('/register') }}">Sign Up</a>
                </li>
            </ul>
        </div>

        @endauth
    </div>
    @endif -->