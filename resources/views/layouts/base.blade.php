<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home</title>
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,400italic,700,700italic,900,900italic&amp;subset=latin,latin-ext" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open%20Sans:300,400,400italic,600,600italic,700,700italic&amp;subset=latin,latin-ext" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('bower_components/bower_ec/assets/css/animate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('bower_components/bower_ec/assets/css/font-awesome.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('bower_components/bower_ec/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('bower_components/bower_ec/assets/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('bower_components/bower_ec/assets/css/chosen.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('bower_components/bower_ec/assets/css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('bower_components/bower_ec/assets/css/color-01.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('bower_components/bower_ec/assets/css/flexslider.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('bower_components/bower_ec/assets/css/custom.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/toggle-button.css') }}">
    @livewireStyles
</head>
<body class="home-page home-01 ">

<!-- mobile menu -->
<div class="mercado-clone-wrap">
    <div class="mercado-panels-actions-wrap">
        <a class="mercado-close-btn mercado-close-panels" href="#">x</a>
    </div>
    <div class="mercado-panels"></div>
</div>

<!--header-->
<header id="header" class="header header-style-1">
    <div class="container-fluid">
        <div class="row">
            <div class="topbar-menu-area">
                <div class="container">
                    <div class="topbar-menu right-menu">
                        <ul>
                            @if (Route::has('login'))
                                @auth
                                    @if (Auth::user()->role === 'ADM')
                                        <li class="menu-item menu-item-has-children parent" >
                                            <a title="My account" href="#">My Account ({{ Auth::user()->name }})<i class="fa fa-angle-down" aria-hidden="true"></i></a>
                                            <ul class="submenu curency" >
                                                <li class="menu-item" >
                                                    <a title="Dashboard" href="{{ route('admin.dashboard') }}">Dashboard</a>
                                                </li>
                                                <form method="POST" action="{{ route('logout') }}">
                                                    @csrf
                                                    <li class="menu-item logout-btn">
                                                        <a href="{{ route('logout') }}">Logout</a>
                                                    </li>
                                                </form>
                                            </ul>
                                        </li>
                                    @else
                                        <li class="menu-item menu-item-has-children parent" >
                                            <a title="My account" href="#">My Account ({{ Auth::user()->name }})<i class="fa fa-angle-down" aria-hidden="true"></i></a>
                                            <ul class="submenu curency" >
                                                <li class="menu-item" >
                                                    <a title="Dashboard" href="{{ route('user.dashboard') }}">Dashboard</a>
                                                </li>
                                                <form method="POST" action="{{ route('logout') }}">
                                                    @csrf
                                                    <li class="menu-item logout-btn">
                                                        <a href="{{ route('logout') }}">Logout</a>
                                                    </li>
                                                </form>
                                            </ul>
                                        </li>
                                    @endif
                                @else
                                    <li class="menu-item" ><a title="Register or Login" href="{{ route('login') }}">Login</a></li>
                                    <li class="menu-item" ><a title="Register or Login" href="{{ route('register') }}">Register</a></li>
                                @endif
                            @endif
                        </ul>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="mid-section main-info-area">

                    <div class="wrap-logo-top left-section">
                        <a href="/" class="link-to-home">
                            <img src="{{ asset('bower_components/bower_ec/assets/images/logo.png') }}"
                                 class="img-logo"
                                 alt="mercado"
                            >
                        </a>
                    </div>

                    @livewire('header-search')

                    <div class="wrap-icon right-section">
                        <div class="wrap-icon-section minicart">
                            <a href="{{ route('cart') }}" class="link-direction">
                                <i class="fa fa-shopping-basket" aria-hidden="true"></i>
                                <div class="left-info">
                                    <span class="index">{{ Cart::count() }} items</span>
                                    <span class="title">CART</span>
                                </div>
                            </a>
                        </div>
                        <div class="wrap-icon-section show-up-after-1024">
                            <a href="#" class="mobile-navigation">
                                <span></span>
                                <span></span>
                                <span></span>
                            </a>
                        </div>
                    </div>

                </div>
            </div>

            <div class="nav-section header-sticky">
                <div class="primary-nav-section">
                    <div class="container">
                        <ul class="nav primary clone-main-menu" id="mercado_main" data-menuname="Main menu" >
                            <li class="menu-item home-icon">
                                <a href="/" class="link-term mercado-item-title"><i class="fa fa-home" aria-hidden="true"></i></a>
                            </li>
                            <li class="menu-item">
                                <a href="{{ route('shop') }}" class="link-term mercado-item-title">Shop</a>
                            </li>
                            <li class="menu-item">
                                <a href="{{ route('cart') }}" class="link-term mercado-item-title">Cart</a>
                            </li>
                            <li class="menu-item">
                                <a href="{{ route('checkout') }}" class="link-term mercado-item-title">Checkout</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

{{$slot}}

<footer id="footer">
    <div class="wrap-footer-content footer-style-1">

        <div class="wrap-function-info">
            <div class="container">
                <ul>
                    <li class="fc-info-item">
                        <i class="fa fa-truck" aria-hidden="true"></i>
                        <div class="wrap-left-info">
                            <h4 class="fc-name">Free Shipping</h4>
                            <p class="fc-desc">Free On Order Over $99</p>
                        </div>

                    </li>
                    <li class="fc-info-item">
                        <i class="fa fa-recycle" aria-hidden="true"></i>
                        <div class="wrap-left-info">
                            <h4 class="fc-name">Guarantee</h4>
                            <p class="fc-desc">30 Days Money Back</p>
                        </div>

                    </li>
                    <li class="fc-info-item">
                        <i class="fa fa-credit-card-alt" aria-hidden="true"></i>
                        <div class="wrap-left-info">
                            <h4 class="fc-name">Safe Payment</h4>
                            <p class="fc-desc">Safe your online payment</p>
                        </div>

                    </li>
                    <li class="fc-info-item">
                        <i class="fa fa-life-ring" aria-hidden="true"></i>
                        <div class="wrap-left-info">
                            <h4 class="fc-name">Online Support</h4>
                            <p class="fc-desc">We have support 24/7</p>
                        </div>

                    </li>
                </ul>
            </div>
        </div>
    </div>
</footer>

<script src="{{ asset('bower_components/bower_ec/assets/js/jquery-1.12.4.minb8ff.js?ver=1.12.4') }}"></script>
<script src="{{ asset('bower_components/bower_ec/assets/js/jquery-ui-1.12.4.minb8ff.js?ver=1.12.4') }}"></script>
<script src="{{ asset('bower_components/bower_ec/assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('bower_components/bower_ec/assets/js/jquery.flexslider.js') }}"></script>
<script src="{{ asset('bower_components/bower_ec/assets/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('bower_components/bower_ec/assets/js/jquery.countdown.min.js') }}"></script>
<script src="{{ asset('bower_components/bower_ec/assets/js/jquery.sticky.js') }}"></script>
<script src="{{ asset('bower_components/bower_ec/assets/js/functions.js') }}"></script>
<script src="{{ asset('js/index.js') }}"></script>
@livewireScripts
</body>
</html>
