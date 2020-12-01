@extends('layouts.app')

@section('title')
    <title>Marketplace Fotografer | Withdraw</title>
@endsection


@section('content')

<div class="cart-main-area pt-95 pb-100 wishlist">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mb-50">
                <h1 class="cart-heading">Withdraw Request for <strong>{{$orders->order_number}}</strong></h1>
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
                                        <span>Test</span>
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
                                    <form action="{{route('req.funds')}}" method="POST" role="form">
                                        {{ csrf_field() }}
                                    <input type="hidden" value="{{$orders->order_id}}" class="form-control" name="order_id" id="" aria-describedby="helpId">
                                    <input type="hidden" value="{{$orders->grand_total}}" class="form-control" name="dana" id="" aria-describedby="helpId">
                                    <input type="hidden" name="status" value="clear">

                                    <div class="quick-view-select">
                                        <div class="select-option-part">
                                            <label>Bank</label>
                                            <select name="bank" id="inputID" class="form-control quick-view-rating">
                                                <option value="BCA">BCA (PT Bank Central Asia, Tbk)</option>
                                                <option value="Mandiri">Mandiri (PT. Bank Mandiri Persero, Tbk)</option>
                                                <option value="BNI">BNI (PT. Bank Negara Indonesia Persero, Tbk)</option>
                                                <option value="BRI">BRI (PT Bank Rakyat Indonesia, Tbk)</option>
                                                <option value="OVO">OVO</option>
                                                <option value="GoPay">Go-Pay</option>
                                            </select>
                                        </div>
                                        <div class="select-option-part">
                                            <label>Atas Nama</label>
                                            <input type="text" value="" class="form-control" name="atas_nama" id="" aria-describedby="helpId">
                                            @if ($errors->has('atas_nama'))
                                                <p style="color:red;">{{ $errors->first('atas_nama') }}</p>
                                            @endif
                                        </div>
                                        <div class="select-option-part">
                                            <label>No. Rekening/Akun</label>
                                            <input type="text" value="" class="form-control" name="no_rek" id="" aria-describedby="helpId">
                                            @if ($errors->has('no_rek'))
                                                <p style="color:red;">{{ $errors->first('no_rek') }}</p>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="login-form">
                                        <div class="button-box">
                                            <button class="default-btn floatright" type="submit">Submit</button>
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
