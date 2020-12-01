@extends('layouts.app')

@section('title')
    <title>Marketplace Fotografer | {{$fotografer->name}}</title>
@endsection

@section('content')
        <div class="about-story pt-95 pb-100">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-lg-7 col-12">
                        <div class="product-details-img-content">
                            <div class="product-details-tab mr-70">
                                <div class="product-details-large tab-content">
                                    <div class="tab-pane active show fade" id="pro-details1" role="tabpanel">
                                        <div class="easyzoom easyzoom--overlay">
                                            <a href="/storage/{{$fotografer->portofolio1}}">
                                                <img src="/storage/{{$fotografer->portofolio1}}" alt="">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="pro-details2" role="tabpanel">
                                        <div class="easyzoom easyzoom--overlay">
                                            <a href="/storage/{{$fotografer->portofolio2}}">
                                                <img src="/storage/{{$fotografer->portofolio2}}" alt="">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="pro-details3" role="tabpanel">
                                        <div class="easyzoom easyzoom--overlay">
                                            <a href="/storage/{{$fotografer->portofolio3}}">
                                                <img src="/storage/{{$fotografer->portofolio3}}" alt="">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="pro-details4" role="tabpanel">
                                        <div class="easyzoom easyzoom--overlay">
                                            <a href="/storage/{{$fotografer->portofolio4}}">
                                                <img src="/storage/{{$fotografer->portofolio4}}" alt="">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-details-small nav mt-12" role=tablist>
                                    <a class="active mr-12" href="#pro-details1" data-toggle="tab" role="tab" aria-selected="true">
                                        <img width="141px" height="135px" src="/storage/{{$fotografer->portofolio1}}" alt="">
                                    </a>
                                    <a class="mr-12" href="#pro-details2" data-toggle="tab" role="tab" aria-selected="true">
                                        <img width="141px" height="135px" src="/storage/{{$fotografer->portofolio2}}" alt="">
                                    </a>
                                    <a class="mr-12" href="#pro-details3" data-toggle="tab" role="tab" aria-selected="true">
                                        <img width="141px" height="135px" src="/storage/{{$fotografer->portofolio3}}" alt="">
                                    </a>
                                    <a class="mr-12" href="#pro-details4" data-toggle="tab" role="tab" aria-selected="true">
                                        <img width="141px" height="135px" src="/storage/{{$fotografer->portofolio4}}" alt="">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-5 col-12">
                        <div class="sidebar-active product-details-content">
                            <div class="col-lg-12">
                                <div class="banner-wrapper-4 mb-30">
                                    <img width="200px" height="200px" src="/storage/{{$fotografer->owner->avatar}}" alt=""></a>
                                </div>
                            </div>
                            <h3>{{$fotografer->name}}</h3>
                            <div class="rating-number">
                                <div class="quick-view-rating">
                                    <i class="icofont icofont-ui-rating"></i>
                                </div>
                                <div class="quick-view-number">
                                    <span>{{number_format($average,2)}} / 5 Ratting (S)</span>
                                </div>
                            </div>
                            <div class="rating-number">
                                <div class="quick-view-rating">
                                    <i class="icofont icofont-location-pin"></i>
                                </div>
                                <div class="quick-view-number">
                                    <h6> {{$fotografer->location}}</h6>
                                </div>
                            </div>
                            <div class="rating-number">
                                <div class="quick-view-rating">
                                    <i class="icofont icofont-ui-touch-phone"></i>
                                </div>
                                <div class="quick-view-number">
                                    <h6> {{$fotografer->contact}}</h6>
                                </div>
                            </div>
                            <div class="rating-number">
                                <div class="quick-view-rating">
                                    <i class="icofont icofont-ui-email"> </i>
                                </div>
                                <div class="quick-view-number">
                                    <h6> {{$fotografer->owner->email}}</h6>
                                </div>
                            </div>
                            <h5>{{$fotografer->description}}</h5>
                            <div class="quickview-plus-minus">
                                <div class="quickview-btn-cart">
                                    <a class="btn-hover-black" href="#" data-toggle="modal" data-target="#orderModal{{$fotografer->owner->id}}">Chat Photographer</a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('shops/modal')
        <!-- product area start -->
        <div class="product-area pb-95">
            <div class="container">
                <div class="section-title-3 text-center mb-50">
                    <h2>Service from {{$fotografer->name}}</h2>
                </div>
                <div class="product-style">
                    <div class="related-product-active owl-carousel">
                        @forelse ($fotografer->products as $item)
                        <div class="product-wrapper">
                            <div class="product-img">
                                <a href="{{route("products.show", $item)}}">
                                    <img src="/storage/{{$item->cover_img}}" alt="">
                                </a>
                                <div class="product-action">
                                    <a class="animate-top" title="Add To Cart" href="#">
                                        <i class="pe-7s-cart"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="product-content">
                                <h4><a href="{{route("products.show", $item)}}">{{$item->nama_jasa}}</a></h4>
                                <span>@currency($item->harga)</span>
                            </div>
                        </div>
                        @empty

                        @endforelse
                    </div>
                </div>
            </div>
        </div>
        <!-- product area end -->

@endsection
