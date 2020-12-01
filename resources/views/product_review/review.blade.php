@extends('layouts.app')

@section('title')
    <title>Marketplace Fotografer | Review</title>
@endsection


@section('content')

<div class="cart-main-area pt-95 pb-100 wishlist">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mb-50">
                <h1 class="cart-heading">Give a review for <strong>{{$orders->order_number}}</strong></h1>
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="qwick-view-right">
                                <div class="qwick-view-content">
                                    <h3>{{$orders->order_number}} ({{$orders->created_at}})</h3>
                                    <div class="price">
                                        <span class="new">Total Payment :</span>
                                        <span>@currency($orders->grand_total)</span>
                                        @if ($orders->payment_method == 'cash_on_delivery')
                                            <span>(Cash on Delivery)</span>
                                        @elseif ($orders->payment_method == 'paypal')
                                            <span>(PayPal)</span>
                                        @endif
                                    </div>
                                    <div class="price">
                                        <span class="new">Booking Item :</span>
                                        <span>{{$orders->nama_jasa}}</span>
                                    </div>
                                    <div class="price">
                                        <span class="new">Photographer :</span>
                                        <span>{{$orders->name}}</span>
                                    </div>
                                    <div class="price">
                                        <span class="new">For Date :</span>
                                        <span>{{$orders->booking_date}}</span>
                                    </div>
                                    <div class="price">
                                        <span class="new">Booking Name :</span>
                                        <li class="old">{{$orders->booking_firstname}} {{$orders->booking_lastname}}</li>
                                    </div>
                                    <div class="price">
                                        <span class="new">Booking Phone :</span>
                                        <li class="old">{{$orders->booking_phone}}</li>
                                    </div>
                                    <div class="price">
                                        <span class="new">Booking E-mail :</span>
                                        <li class="old">{{$orders->booking_email}}</li>
                                    </div>
                                    <div class="price">
                                        <span class="new">Booking Address :</span>
                                        <li class="old">{{$orders->booking_address}}, {{$orders->booking_city}}, {{$orders->booking_state}}, {{$orders->booking_zipcode}}</li>
                                    </div>
                                    <div class="price">
                                        <span class="new">Notes* :</span>
                                        <li class="old">{{$orders->notes}}</li>
                                    </div>
                                </div>
                            </div>
                            <div class="qwick-view-left">
                                <div class="qwick-view-content">
                                    <form action="{{route('review.store')}}" method="POST" role="form">
                                        {{ csrf_field() }}

                                    <input type="hidden" value="{{$orders->product_id}}" name="product_id">
                                    <input type="hidden" value="{{$orders->order_id}}" name="order_id">
                                    <input type="hidden" name="email" value="{{$orders->email}}">
                                    @if ($orders->payment_method == 'paypal')
                                        <input type="hidden" name="status" value="completed">
                                    @elseif ($orders->payment_method == 'cash_on_delivery')
                                        <input type="hidden" name="status" value="clear">
                                    @endif


                                    <div class="quick-view-select">
                                        <div class="select-option-part">
                                            <label>Rating</label>
                                            <select name="rating" id="inputID" class="form-control quick-view-rating">
                                                <option value="5">★★★★★</option>
                                                <option value="4">★★★★</option>
                                                <option value="3">★★★</option>
                                                <option value="2">★★</option>
                                                <option value="1">★</option>
                                            </select>
                                        </div>
                                        <div class="select-option-part">
                                            <label>Review</label>
                                            <input type="text" value="" class="form-control" name="description" id="" aria-describedby="helpId">
                                        </div>
                                    </div>
                                    <div class="login-form">
                                        <div class="button-box">
                                            <button class="default-btn floatright" type="submit">Submit</button>
                                        </div>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</div>


@endsection
