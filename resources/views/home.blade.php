@extends('layouts.app')

@section('title')
    <title>Marketplace Fotografer | Home</title>
@endsection

@section('content')
        <div class="slider-area">
            <div class="slider-active owl-carousel">
                <div class="single-slider-4 slider-height-6 bg-img" style="background-image: url(assets/img/slider/wedding1.jpg)">
                    <div class="container">
                        <div class="row">
                            <div class="ml-auto col-lg-12">
                                <div class="furniture-content fadeinup-animated">
                                    <h2 class="animated">Wedding  <br>Photographer.</h2>
                                    <p class="animated">Find A Photographer For Your Budget.</p>
                                    {{-- <a class="furniture-slider-btn btn-hover animated" href="product-details.html">Shop Now</a> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="single-slider-4 slider-height-6 bg-img" style="background-image: url(assets/img/slider/commercial1.jpg)">
                    <div class="container">
                        <div class="row">
                            <div class="ml-auto col-lg-5">
                                <div class="furniture-content fadeinup-animated">
                                    <h2 class="animated">Commercial  <br>Photographer.</h2>
                                    <p class="animated">Flexible Photography Solutions.</p>
                                    {{-- <a class="furniture-slider-btn btn-hover animated" href="product-details.html">Shop Now</a> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="single-slider-4 slider-height-6 bg-img" style="background-image: url(assets/img/slider/fashion2.jpg)">
                    <div class="container">
                        <div class="row">
                            <div class="ml-auto col-lg-12">
                                <div class="furniture-content fadeinup-animated">
                                    <h2 class="animated">Fashion  <br>Photographer.</h2>
                                    <p class="animated">Wide Selection of Photographers.</p>
                                    {{-- <a class="furniture-slider-btn btn-hover animated" href="product-details.html">Shop Now</a> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="bestchoice" class="popular-product-area wrapper-padding-3 pt-100">
            <div class="container-fluid">
                <div class="section-title-6 text-center mb-50">
                    <h2>Best Choice</h2>
                    <p>We have selected the best photographer according to our qualifications for you.</p>
                </div>
                <div class="product-style">
                    <div class="popular-product-active owl-carousel">
                        @foreach ($allProducts as $product)

                            <div class="product-wrapper">
                                <div class="product-img">
                                    <a href="{{route("products.show", $product)}}">
                                        <img src="/storage/{{$product->cover_img}}" alt="">
                                    </a>
                                    <div class="product-action">
                                        <a class="animate-top" title="Check Date" href="{{ route('cart.add', $product->id ) }}">
                                            <i class="pe-7s-date"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="jasa-content text-center">
                                    <h4 class="mt-3"><a href="{{route("products.show", $product)}}">{{$product->nama_jasa}}</a></h4>
                                    <span><h6>{{$product->shop->location}}</h6></span>
                                    <span><h6>★ {{$product->getStarRating()}}</h6></span>
                                    <h5>@currency($product->harga)</h5>
                                </div>
                            </div>

                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <!-- categories -->
        <div id="categories" class="product-style-area pt-120">
            <div class="coustom-container-fluid">
                <div class="section-title-7 text-center">
                    <h2>Categories</h2>
                </div>
                <div class="product-tab-list text-center mb-65 nav" role="tablist">
                    <a class="active" href="#furniture1" data-toggle="tab" role="tab">
                        <h4>Photography </h4>
                    </a>
                    <a href="#furniture2" data-toggle="tab" role="tab">
                        <h4>Videography </h4>
                    </a>
                </div>
                <div class="tab-content">
                    <div class="tab-pane active show fade" id="furniture1" role="tabpanel">
                        <div class="about-banner-area pb-65">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="banner-wrapper-5 mb-30">
                                            <a href="{{route('products.index', ['category_id' => 5])}}"><img src="/assets/img/banner/fashion.jpg" alt=""></a>
                                            <div class="banner-content4-style3">
                                                <h3>Fashion / Modeling</h3>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="banner-wrapper-5 mb-30">
                                            <a href="{{route('products.index', ['category_id' => 6])}}"><img src="assets/img/banner/wedding.jpg" alt=""></a>
                                            <div class="banner-content4-style3">
                                                <h3>Weddings</h3>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="banner-wrapper-5 mb-30">
                                            <a href="{{route('products.index', ['category_id' => 7])}}"><img src="/assets/img/banner/food.jpg" alt=""></a>
                                            <div class="banner-content4-style3">
                                                <h3>Food</h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="collapse" id="collapseExample">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="banner-wrapper-5 mb-30">
                                                <a href="{{route('products.index', ['category_id' => 8])}}"><img src="/assets/img/banner/portrait.jpg" alt=""></a>
                                                <div class="banner-content4-style3">
                                                    <h3>Portraits</h3>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="banner-wrapper-5 mb-30">
                                                <a href="{{route('products.index', ['category_id' => 9])}}"><img src="/assets/img/banner/children.jpg" alt=""></a>
                                                <div class="banner-content4-style3">
                                                    <h3>Children</h3>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="banner-wrapper-5 mb-30">
                                                <a href="{{route('products.index', ['category_id' => 10])}}"><img src="/assets/img/banner/family.jpg" alt=""></a>
                                                <div class="banner-content4-style3">
                                                    <h3>Family</h3>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="banner-wrapper-5 mb-30">
                                                <a href="{{route('products.index', ['category_id' => 11])}}"><img src="/assets/img/banner/commercial.jpg" alt=""></a>
                                                <div class="banner-content4-style3">
                                                    <h3>Commercial</h3>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="banner-wrapper-5 mb-30">
                                                <a href="{{route('products.index', ['category_id' => 12])}}"><img src="/assets/img/banner/event.jpg" alt=""></a>
                                                <div class="banner-content4-style3">
                                                    <h3>Event</h3>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="banner-wrapper-5 mb-30">
                                                <a href="{{route('products.index', ['category_id' => 13])}}"><img src="/assets/img/banner/architecture.jpg" alt=""></a>
                                                <div class="banner-content4-style3">
                                                    <h3>Architecture</h3>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="banner-wrapper-5 mb-30">
                                                <a href="{{route('products.index', ['category_id' => 14])}}"><img src="/assets/img/banner/vacation.jpg" alt=""></a>
                                                <div class="banner-content4-style3">
                                                    <h3>Vacation</h3>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="banner-wrapper-5 mb-30">
                                                <a href="{{route('products.index', ['category_id' => 15])}}"><img src="/assets/img/banner/sports.jpg" alt=""></a>
                                                <div class="banner-content4-style3">
                                                    <h3>Sports</h3>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="banner-wrapper-5 mb-30">
                                                <a href="{{route('products.index', ['category_id' => 16])}}"><img src="/assets/img/banner/landscape.jpg" alt=""></a>
                                                <div class="banner-content4-style3">
                                                    <h3>Landscape</h3>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="banner-wrapper-5 mb-30">
                                                <a href="{{route('products.index', ['category_id' => 17])}}"><img src="/assets/img/banner/drone.jpg" alt=""></a>
                                                <div class="banner-content4-style3">
                                                    <h3>Drone</h3>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="banner-wrapper-5 mb-30">
                                                <a href="{{route('products.index', ['category_id' => 18])}}"><img src="/assets/img/banner/courses.jpg" alt=""></a>
                                                <div class="banner-content4-style3">
                                                    <h3>Courses</h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="view-all-product text-center">
                            <a data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">All Categories</a>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="furniture2" role="tabpanel">
                        <div class="about-banner-area pb-65">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="banner-wrapper-5 mb-30">
                                            <a href="{{route('products.index', ['category_id' => 19])}}"><img src="/assets/img/banner/ads.jpg" alt=""></a>
                                            <div class="banner-content4-style3">
                                                <h3>Avertising</h3>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="banner-wrapper-5 mb-30">
                                            <a href="{{route('products.index', ['category_id' => 20])}}"><img src="/assets/img/banner/animated.jpg" alt=""></a>
                                            <div class="banner-content4-style3">
                                                <h3>Animated</h3>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="banner-wrapper-5 mb-30">
                                            <a href="{{route('products.index', ['category_id' => 21])}}"><img src="/assets/img/banner/corporate.jpg" alt=""></a>
                                            <div class="banner-content4-style3">
                                                <h3>Corporate</h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="collapse" id="collapseExample2">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="banner-wrapper-5 mb-30">
                                                <a href="{{route('products.index', ['category_id' => 22])}}"><img src="/assets/img/banner/documentary.jpg" alt=""></a>
                                                <div class="banner-content4-style3">
                                                    <h3>Documentary</h3>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="banner-wrapper-5 mb-30">
                                                <a href="{{route('products.index', ['category_id' => 23])}}"><img src="/assets/img/banner/dronevideo.jpg" alt=""></a>
                                                <div class="banner-content4-style3">
                                                    <h3>Drone Videography</h3>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="banner-wrapper-5 mb-30">
                                                <a href="{{route('products.index', ['category_id' => 24])}}"><img src="/assets/img/banner/eventvideo.jpg" alt=""></a>
                                                <div class="banner-content4-style3">
                                                    <h3>Event Videography</h3>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="banner-wrapper-5 mb-30">
                                                <a href="{{route('products.index', ['category_id' => 25])}}"><img src="/assets/img/banner/music.jpg" alt=""></a>
                                                <div class="banner-content4-style3">
                                                    <h3>Music</h3>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="banner-wrapper-5 mb-30">
                                                <a href="{{route('products.index', ['category_id' => 26])}}"><img src="/assets/img/banner/travel.jpg" alt=""></a>
                                                <div class="banner-content4-style3">
                                                    <h3>Travel</h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="view-all-product text-center">
                            <a data-toggle="collapse" href="#collapseExample2" role="button" aria-expanded="false" aria-controls="collapseExample">All Categories</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- categories -->
        <!-- premium area start -->
        <div class="premium-banner-area pt-100">
            <div class="container">
                <div class="discount-wrapper">
                    <img src="/assets/img/banner/exposure.jpg" alt="">
                    <div class="discount-content">
                        <h2>Are You A Photographer<br>or Videographer Wanting More Exposure?</h2>
                        <a href="{{ route('register') }}">Sign Up And List Your Service Now!</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- premium area end -->
        <!-- product area start -->
        <div id="alllist" class="product-style-area pt-100">
            <div class="coustom-container-fluid">
                <div class="section-title-7 text-center">
                    <h2>All List</h2>
                    <p>We want to make it easy for you to find the best local photographers in your city. An assortment of the most talented photographers, their specialisms and their availability.</p>
                </div>
                <div class="tab-content">
                    <div class="tab-pane active show fade" id="furniture1" role="tabpanel">
                        <div class="coustom-row-5">
                            @foreach ($allProducts as $product)
                            <div class="custom-col-three-5 custom-col-style-5 mb-65">
                                <div class="product-wrapper">
                                    <div class="product-img">
                                        <a href="{{route("products.show", $product)}}">
                                            <img src="/storage/{{$product->cover_img}}" alt="">
                                        </a>
                                        <div class="product-action">
                                            <a class="animate-top" title="Check Date" href="{{ route('cart.add', $product->id ) }}">
                                                <i class="pe-7s-date"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="funiture-product-content text-center">
                                        <h4><a href="{{route("products.show", $product)}}">{{$product->nama_jasa}}</a></h4>
                                        <span><h6>{{$product->shop->location}}</h6></span>
                                        <span><h6>★ {{$product->getStarRating()}}</h6></span>
                                        <h5>@currency($product->harga)</h5>
                                    </div>
                                </div>
                            </div>

                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="view-all-product text-center">
                    <a href="{{route('products.search')}}">View All List of Services</a>
                </div>
            </div>
        </div>
        <!-- product area end -->
        <!-- testimonials area start -->
        <div class="testimonials-area pt-120 pb-115">
            <div class="container">
                <div class="testimonials-active owl-carousel">
                    <div class="single-testimonial-2 text-center">
                        <img src="/assets/img/team/testi1.jpg" alt="">
                        <p>Easy to use, great chat function to discuss with photographers prior to booking and over all brilliant idea. Finally an easy way to browse and find the right photographer for what I need...</p>
                        <h4>Josh Extra</h4>
                        <span>Wedding Photographer</span>
                    </div>
                    <div class="single-testimonial-2 text-center">
                        <img src="/assets/img/team/testi2.jpg" alt="">
                        <p>Great Platform and love how it's free to sign up and list. Easy to use and navigate, reasonable platform commission if a booking is made and the PayPal integration makes it easy...</p>
                        <h4>Nadia Florencia</h4>
                        <span>Mahasiswa</span>
                    </div>
                    <div class="single-testimonial-2 text-center">
                        <img src="/assets/img/team/testi3.jpg" alt="">
                        <p>Spent hours looking for a photographer to take shots of our new restaurant menu. Thankfully I was introduced to Snapsquad which made finding the right service for us easy...</p>
                        <h4>Asep Asbor</h4>
                        <span>Restaurant Owner</span>
                    </div>
                </div>
            </div>
        </div>
        <!-- testimonials area end -->
        <!-- services area start -->
        <div id="service" class="services-area wrapper-padding-4 gray-bg pt-120 pb-80">
            <div class="container-fluid">
                <div class="services-wrapper">
                    <div class="single-services mb-40">
                        <div class="services-img">
                            <img width="100px" src="/assets/img/icon-img/community.png" alt="">
                        </div>
                        <div class="services-content">
                            <h4>Community</h4>
                            <p>Global community of photographers and videographers, giving you choice and keeping things personal. </p>
                        </div>
                    </div>
                    <div class="single-services mb-40">
                        <div class="services-img">
                            <img width="100px" src="/assets/img/icon-img/paypal.png" alt="">
                        </div>
                        <div class="services-content">
                            <h4>Payment Security</h4>
                            <p>Secured payment integration to safeguard our users. Stay covered, secure and convenient payment. </p>
                        </div>
                    </div>
                    <div class="single-services mb-40">
                        <div class="services-img">
                            <img width="100px" src="/assets/img/icon-img/transparancy.png" alt="">
                        </div>
                        <div class="services-content">
                            <h4>Transparency</h4>
                            <p>Price and quality transparency. Browse for the best photographers or videographers for your requirement. </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- services area end -->

@endsection
