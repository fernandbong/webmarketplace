@extends('layouts.app')

@section('title')
    <title>Marketplace Fotografer | {{$product->nama_jasa}}</title>
@endsection

@section('content')

<div class="product-details ptb-100 pb-90">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-7 col-12">
                <div class="product-details-6 pr-70 pro-stick">
                    <div class="easyzoom easyzoom--overlay mb-30">
                        <a href="/storage/{{$product->cover_img}}">
                            <img width="600" height="400" src="/storage/{{$product->cover_img}}" alt="">
                        </a>
                    </div>
                    <div class="easyzoom easyzoom--overlay mb-30">
                        <a href="/storage/{{$product->fotoproduk1}}">
                            <img width="600" height="400" src="/storage/{{$product->fotoproduk1}}" alt="">
                        </a>
                    </div>
                    <div class="easyzoom easyzoom--overlay mb-30">
                        <a href="/storage/{{$product->fotoproduk2}}">
                            <img width="600" height="400" src="/storage/{{$product->fotoproduk2}}" alt="">
                        </a>
                    </div>
                    <div class="easyzoom easyzoom--overlay mb-30">
                        <a href="/storage/{{$product->fotoproduk3}}">
                            <img width="600" height="400" src="/storage/{{$product->fotoproduk3}}" alt="">
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-lg-5 col-12">
                <div class="sidebar-active product-details-content">
                    <h3>{{$product->nama_jasa}}</h3>
                    <div class="rating-number">
                        <div class="quick-view-number">
                            <div id="app">
                                <star-rating :rtl="true" :read-only="true" :rating="{{$product->getStarRating()}}" :increment="0.01" :fixed-points="2" :star-size="25"></star-rating>
                            </div>
                        </div>
                        <div class="quick-view-number">
                            <span>Ratting (S)</span>
                        </div>
                    </div>
                    <div class="details-price">
                        <span>@currency($product->harga)</span>
                    </div>
                    <p>{!!$product->deskripsi!!}</p>

                    <div class="quickview-plus-minus">

                        <div class="quickview-btn-cart">
                            <a class="btn-hover-black" href="{{ route('cart.add', $product->id ) }}">Check Date</a>
                        </div>
                        <div class="quickview-btn-wishlist">
                            <a class="btn-hover" href="#" data-toggle="modal" data-target="#orderModal{{$product->shop->owner->id}}">Chat Photographer</a>
                        </div>
                    </div>
                    <div class="product-details-cati-tag mtb-10">
                        <ul>
                            <li class="categories-title">Photographer :</li>
                            <li><a href="{{route("shops.show", $product->shop->id)}}">{{$product->shop->name}}</a></li>
                        </ul>
                    </div>
                    <div class="product-details-cati-tag mtb-10">
                        <ul>
                            <li class="categories-title">Location :</li>
                            <li><a>{{$product->shop->location}}</a></li>
                        </ul>
                    </div>
                    {{-- <div class="product-share">
                        <ul>
                            <li class="categories-title">Share :</li>
                            <li>
                                <a href="#">
                                    <i class="icofont icofont-chat"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="icofont icofont-social-twitter"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="icofont icofont-social-pinterest"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="icofont icofont-social-flikr"></i>
                                </a>
                            </li>
                        </ul>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
</div>

@include('product/modal')

<div class="product-description-review-area pb-90">
    <div class="container">
        <div class="col-12">

            <div class="blog-replay-wrapper">
                <h4 class="blog-details-title2">HAVE {{$product->reviews->count()}} REVIEWS</h4>
                @forelse ($reviews as $review)

                <div class="single-blog-replay">
                    <div class="replay-img">
                        <img width="70" height="70" src="/storage/{{$review->user->avatar}}" alt="">
                    </div>
                    <div class="replay-info-wrapper">
                        <div class="replay-info">
                            <div class="replay-name-date">
                                <h5>{{$review->user->name}}</h5>
                                <span>{{$review->created_at}}</span>
                            </div>
                            <div>
                                <a>Rating : {{$review->rating}} / 5</a>
                            </div>
                        </div>
                        <p>{{$review->description}}</p>
                    </div>
                </div>
                @empty

                @endforelse
                <div class="pagination-style mt-50 text-center">
                    <ul>
                        <li>{{$reviews->links()}}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>


<script src="/js/app.js"></script>
@endsection

