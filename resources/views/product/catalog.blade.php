@extends('layouts.app')

@section('title')
    <title>Marketplace Fotografer | Product</title>
@endsection

@section('content')

<div class="shop-page-wrapper shop-page-padding ptb-100">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="shop-product-wrapper res-xl">
                    <div class="shop-bar-area">
                        <div class="shop-bar pb-60">
                            <div class="shop-found-selector">
                                <div class="shop-found">
                                    <p><span>{{$products->count()}}</span> Product Found of <span>{{$products->total()}}</span></p>
                                </div>
                            </div>
                            <div class="shop-filter-tab">
                                <div class="shop-tab nav" role=tablist>
                                    <a class="active" href="#grid-sidebar3" data-toggle="tab" role="tab" aria-selected="false">
                                        <i class="ti-layout-grid3-alt"></i>
                                    </a>
                                    <a href="#grid-sidebar4" data-toggle="tab" role="tab" aria-selected="true">
                                        <i class="ti-menu-alt"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="shop-product-content tab-content">
                            <div id="grid-sidebar3" class="tab-pane fade active show">
                                <div class="row">
                                    @foreach ($products as $product)

                                    <div class="col-md-6 col-xl-4">
                                        <div class="product-wrapper mb-30">
                                            <div class="product-img">
                                                <a href="{{route("products.show", $product)}}">
                                                    <img src="/storage/{{$product->cover_img}}" alt="">
                                                </a>
                                                {{--<span>hot</span>--}}
                                                <div class="product-action">
                                                    <a class="animate-top" title="Check Date" href="{{ route('cart.add', $product->id ) }}">
                                                        <i class="pe-7s-date"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="product-content">
                                                <h4><a href="{{route("products.show", $product)}}">{{$product->nama_jasa}}</a></h4>
                                                <span>@currency($product->harga)</span>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            <div id="grid-sidebar4" class="tab-pane fade">
                                <div class="row">
                                    @foreach ($products as $product)
                                    <div class="col-lg-12">
                                        <div class="product-wrapper mb-30 single-product-list product-list-right-pr mb-60">
                                            <div class="product-img list-img-width">
                                                <a href="{{route("products.show", $product)}}">
                                                    <img src="/storage/{{$product->cover_img}}" alt="">
                                                </a>
                                            </div>
                                            <div class="product-content-list">
                                                <div class="product-list-info">
                                                    <h4><a href="{{route("products.show", $product)}}">{{$product->nama_jasa}}</a></h4>
                                                    <span>@currency($product->harga)</span>
                                                    <p>{!!$product->deskripsi!!}</p>
                                                </div>
                                                <div class="product-list-cart-wishlist">
                                                    <div class="product-list-cart">
                                                        <a class="btn-hover list-btn-style" href="{{ route('cart.add', $product->id ) }}">Check Date</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="pagination-style mt-50 text-center">
                    <ul>
                        <li>{{$products->appends(['cari'=>request('cari')])->render()}}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
