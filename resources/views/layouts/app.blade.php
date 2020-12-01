<!doctype html>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        @yield('title')
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/img/favicon.png')}}">

        <!-- all css here -->
        <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{asset('assets/css/magnific-popup.css')}}">
        <link rel="stylesheet" href="{{asset('assets/css/animate.css')}}">
        <link rel="stylesheet" href="{{asset('assets/css/owl.carousel.min.css')}}">
        <link rel="stylesheet" href="{{asset('assets/css/themify-icons.css')}}">
        <link rel="stylesheet" href="{{asset('assets/css/pe-icon-7-stroke.css')}}">
        <link rel="stylesheet" href="{{asset('assets/css/icofont.css')}}">
        <link rel="stylesheet" href="{{asset('assets/css/easyzoom.css')}}">
        <link rel="stylesheet" href="{{asset('assets/css/meanmenu.min.css')}}">
        <link rel="stylesheet" href="{{asset('assets/css/bundle.css')}}">
        <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
        <link rel="stylesheet" href="{{asset('assets/css/responsive.css')}}">
        <script src="{{asset('assets/js/vendor/modernizr-2.8.3.min.js')}}"></script>
    </head>
    <body>
        <!-- header start -->
        <header>
            <div class="header-top-furniture wrapper-padding-2 res-header-sm">
                <div class="container-fluid">
                    <div class="header-bottom-wrapper">
                        <div class="logo-2 furniture-logo ptb-30">
                            <a href="{{route('home')}}">
                                <img width="110px"src="{{asset('assets/img/logo/logo-onwhite.png')}}" alt="">
                            </a>
                        </div>
                        <div class="menu-style-2 furniture-menu menu-hover">
                            <nav>
                                <ul>
                                    <li><a href="{{route('home')}}">home</a>
                                        <ul class="single-dropdown">
                                            <li><a href="{{route('home', '#bestchoice')}}">Best Choice</a></li>
                                            <li><a href="{{route('home', '#categories')}}">Categories</a></li>
                                            <li><a href="{{route('home', '#alllist')}}">All List</a></li>
                                            <li><a href="{{route('home', '#service')}}">Service</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="{{route('products.search')}}">Categories</a>
                                        <div class="category-menu-dropdown shop-menu">
                                            @foreach ($categories as $category)
                                            <div class="category-dropdown-style category-common2 mb-30">
                                                <h4 class="categories-subtitle"><a href="{{route('products.index', ['category_id' => $category->id])}}">{{$category->name}}</a></h4>
                                                    @php
                                                        $children = TCG\Voyager\Models\Category::where('parent_id', $category->id)->get();
                                                    @endphp
                                                @if ($children->isNotEmpty())
                                                <ul>
                                                    @foreach ($children as $child)
                                                    <li><a href="{{route('products.index', ['category_id' => $child->id])}}"><h6><strong>{{$child->name}}</strong></h6></a>
                                                        @php
                                                            $grandChild = TCG\Voyager\Models\Category::where('parent_id', $child->id)->get();
                                                        @endphp
                                                        @if ($grandChild->isNotEmpty())
                                                            <ul>
                                                                @foreach ($grandChild as $gc)
                                                                    <li><a href="{{route('products.index', ['category_id' => $gc->id])}}">- {{$gc->name}}</a></li>
                                                                @endforeach
                                                            </ul>
                                                        @endif
                                                    </li>
                                                    @endforeach
                                                </ul>
                                                @endif
                                            </div>
                                            @endforeach
                                        </div>
                                    </li>
                                    <li><a href="{{route('about')}}">About Us</a></li>
                                </ul>
                            </nav>
                        </div>
                        <div class="header-cart">
                            <a class="icon-cart-furniture" title="messages" href="{{ route('inbox') }}">
                                <i class="icofont icofont-ui-message mr-1"></i>
                                <span class="shop-count-furniture green">
                                    @include('messages.unread')
                                </span>
                            </a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="mobile-menu-area d-md-block col-md-12 col-lg-12 col-12 d-lg-none d-xl-none">
                            <div class="mobile-menu">
                                <nav id="mobile-menu-active">
                                    <ul class="menu-overflow">
                                        <li><a href="#">HOME</a>
                                            <ul>
                                                <li><a href="#bestchoice">Best Choice</a></li>
                                                <li><a href="#categories">Categories</a></li>
                                                <li><a href="#alllist">All List</a></li>
                                                <li><a href="#service">Service</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="{{route('products.search')}}">Categories</a>
                                            <ul>
                                                @foreach ($categories as $category)
                                                <li><a href="{{route('products.index', ['category_id' => $category->id])}}">{{$category->name}}</a></li>
                                                @endforeach
                                            </ul>
                                        </li>
                                        <li><a href="{{route('about')}}">About Us</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header-bottom-furniture wrapper-padding-2 border-top-3">
                <div class="container-fluid">
                    <div class="furniture-bottom-wrapper">
                        <div class="furniture-login">
                            <ul>
                                @guest
                                <li>
                                    <a href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                                @if (Route::has('register'))
                                    <li>
                                        <a href="{{ route('register') }}">{{ __('Register') }}</a>
                                    </li>
                                @endif
                                @else
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        <i class="ti-user"> </i>{{ Auth::user()->name }} <span class="caret"></span>
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        @if (Auth::check() && Auth::user()->role_id == '1')
                                            <a class="dropdown-item" href="{{url('/admin') }}" target="_blank">
                                                Admin Panel
                                            </a>
                                        @else
                                            <a class="dropdown-item" href="{{ route('orders.history') }}" >
                                                Booking History
                                            </a>
                                        @endif
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                                @endguest
                            </ul>
                        </div>
                        <div class="furniture-search">
                            <form action="{{route('products.search')}}" method="GET">
                                <input name="cari" placeholder="I am Searching for . . ." type="text">
                                <button type="submit">
                                    <i class="ti-search"></i>
                                </button>
                            </form>
                        </div>
                        <div class="furniture-login">
                            <ul>
                                @if (Auth::check() && Auth::user()->role_id == '3')
                                <li class="nav-item dropdown">
                                    <a href="{{url('/admin/shops') }}" id="navbarDropdown" class="nav-link dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        <i class="ti-layout-media-left-alt"> </i>Your Photographer side<span class="caret"></span>
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                            <a class="dropdown-item" href="{{ route('orders.project')}}" >
                                                Your Project
                                            </a>
                                            <a class="dropdown-item" href="{{url('/admin/products/create') }}" target="_blank" >
                                                Add new list services
                                            </a>
                                            <a class="dropdown-item" href="{{url('/admin/photographers') }}" target="_blank">
                                                Edit your profile
                                            </a>
                                    </div>
                                </li>
                                @else
                                <li><a href="{{ route('shops.create') }}"><i class="ti-camera"> </i>Be a Photographer</a></li>
                                @endif
                            </ul>
                        </div>
                    </div>
                    {{-- display success message --}}
                    @if (session()->has('message'))
                        <div class="alert alert-success text-center" role="alert">
                            {{session('message')}}
                        </div>
                    @endif

                    {{-- display error message --}}
                    @if (session()->has('error'))
                        <div class="alert alert-danger text-center" role="alert">
                            {{session('error')}}
                        </div>
                    @endif
                </div>
            </div>

        </header>

        <!-- header end -->
        <!-- content area start -->
            @yield('content')
        <!-- content area end -->
        <!-- footer area start -->
        <footer class="footer-area fruits-footer">
            <div class="food-footer-bottom pt-80 pb-70 black-bg-5">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 col-lg-5">
                            <div class="footer-widget">
                                <div class="food-about">
                                    <a href="#"><img width="170px" src="{{asset('assets/img/logo/logo-onblack.png')}}" alt=""></a>
                                    <div class="food-about-info">
                                        <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form.</p>
                                         <div class="food-info-wrapper">
                                            <div class="food-address">
                                                <div class="food-info-icon">
                                                    <i class="pe-7s-map-marker"></i>
                                                </div>
                                                <div class="food-info-content">
                                                    <p>Rosela, Wijaya Kusima, Grogol Petamburan, Jakarta Barat, Indonesia 11460</p>
                                                </div>
                                            </div>
                                            <div class="food-address">
                                                <div class="food-info-icon">
                                                    <i class="pe-7s-call"></i>
                                                </div>
                                                <div class="food-info-content">
                                                    <p>+62-819-9991784</p>
                                                </div>
                                            </div>
                                            <div class="food-address">
                                                <div class="food-info-icon">
                                                    <i class="pe-7s-chat"></i>
                                                </div>
                                                <div class="food-info-content">
                                                    <p><a href="#">fernandbong@gmail.com</a></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <div class="footer-widget mt-50">
                                <h3 class="footer-widget-title-6">Webmarketplace</h3>
                                <div class="food-widget-content">
                                    <ul>
                                        <li><a href="{{route('home')}}"><img src="/assets/img/icon-img/41.png" alt=""> Home</a></li>
                                        <li><a href="{{route('products.search')}}"><img src="/assets/img/icon-img/41.png" alt="">Categories</a></li>
                                        <li><a href="{{route('about')}}"><img src="/assets/img/icon-img/41.png" alt="">About Us</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <div class="footer-widget food-widget mt-50">
                                <h3 class="footer-widget-title-6">Payment</h3>
                                <div class="food-widget-content">
                                    <a href="product-details.html"><img src="/assets/img/banner/code.png" alt=""></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
		    <div class="food-copyright black-bg-6 ptb-30">
		        <div class="container text-center">
		            <p>Copyright © <a href="https://hastech.company/"> Fernando</a> 2020 . All Right Reserved.</p>
		        </div>
		    </div>
		</footer>










        <!-- all js here -->
        <script src="{{asset('assets/js/vendor/jquery-1.12.0.min.js')}}"></script>
        <script src="{{asset('assets/js/popper.js')}}"></script>
        <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
        <script src="{{asset('assets/js/jquery.magnific-popup.min.js')}}"></script>
        <script src="{{asset('assets/js/isotope.pkgd.min.js')}}"></script>
        <script src="{{asset('assets/js/imagesloaded.pkgd.min.js')}}"></script>
        <script src="{{asset('assets/js/jquery.counterup.min.js')}}"></script>
        <script src="{{asset('assets/js/waypoints.min.js')}}"></script>
        <script src="{{asset('assets/js/ajax-mail.js')}}"></script>
        <script src="{{asset('assets/js/owl.carousel.min.js')}}"></script>
        <script src="{{asset('assets/js/plugins.js')}}"></script>
        <script src="{{asset('assets/js/main.js')}}"></script>
    </body>
</html>
