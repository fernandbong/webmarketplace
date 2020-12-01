@extends('layouts.app')

@section('title')
    <title>Marketplace Fotografer | Your Project</title>
@endsection


@section('content')

<div class="cart-main-area pt-95 pb-100 wishlist">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <h1 class="cart-heading">Your Project</h1>
                <div class="product-tab-list text-center mb-65 nav" role="tablist">
                    <a class="active" href="#project1" data-toggle="tab" role="tab">
                        <h4>Need Response </h4>
                    </a>
                    <a href="#project2" data-toggle="tab" role="tab">
                        <h4>On Going </h4>
                    </a>
                    <a href="#project3" data-toggle="tab" role="tab">
                        <h4>Withdraw Available </h4>
                    </a>
                    <a href="#project4" data-toggle="tab" role="tab">
                        <h4>Completed </h4>
                    </a>
                    <a href="#project5" data-toggle="tab" role="tab">
                        <h4>Declined </h4>
                    </a>
                </div>
                <div class="tab-content">
                    <div class="tab-pane active show fade" id="project1" role="tabpanel">
                        <div class="about-banner-area pb-65">
                            <div class="container">
                                @if ($projectpending->total() == 0)
                                <p style="text-align:center;">No data available.</p>
                                @else
                                    <form action="#">
                                        <div class="table-content table-responsive">
                                            <table>
                                                <thead>
                                                    <tr>
                                                        <th>status</th>
                                                        <th>Order Number</th>
                                                        <th>Booking date</th>
                                                        <th>Total</th>
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($projectpending as $item)
                                                    <form action="{{route("orders.accept")}}" method="POST">
                                                        {!! csrf_field() !!}
                                                    </form>
                                                    <tr>
                                                        @if ($item->status == 'pending')
                                                            <td class="product-remove text-warning">Need your response</td>
                                                        @elseif($item->status == 'processing')
                                                            <td class="product-remove text-primary">On Going</td>
                                                        @elseif($item->status == 'completed')
                                                            <td class="product-remove text-info">Withdraw Available</td>
                                                        @elseif($item->status == 'clear')
                                                            <td class="product-remove text-success">Clear</td>
                                                        @else
                                                            <td class="product-remove text-danger">Decline</td>
                                                        @endif
                                                        <td class="product-name">{{$item->order_number}}</td>
                                                        <td class="product-quantity">{{$item->booking_date}}</td>
                                                        <td class="product-subtotal">@currency($item->grand_total)</td>
                                                        <td class="product-name"><a data-toggle="modal" data-target="#orderModal{{$item->order_number}}" href="#">See details</a></td>
                                                    </tr>

                                                    <!-- modal -->
                                                    <div class="modal fade" id="orderModal{{$item->order_number}}" tabindex="-1" role="dialog" aria-hidden="true">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span class="pe-7s-close" aria-hidden="true"></span>
                                                        </button>
                                                        <div class="modal-dialog modal-quickview-width" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-body">
                                                                    <div class="qwick-view-left">
                                                                        <div class="quick-view-learg-img">
                                                                            <div class="quick-view-tab-content tab-content">
                                                                                <div class="tab-pane active show fade" id="modal1" role="tabpanel">
                                                                                    <img src="/storage/{{$item->cover_img}}" alt="">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="qwick-view-right">
                                                                        <div class="qwick-view-content">
                                                                            <h3>{{$item->order_number}} ({{$item->created_at}})</h3>
                                                                            <div class="price">
                                                                                <span class="new">Total Payment :</span>
                                                                                <span>@currency($item->grand_total)</span>
                                                                                @if ($item->payment_method == 'cash_on_delivery')
                                                                                    <span>(Cash on Delivery)</span>
                                                                                @elseif ($item->payment_method == 'paypal')
                                                                                    <span>(PayPal)</span>
                                                                                @endif
                                                                            </div>
                                                                            <div class="price">
                                                                                <span class="new">Booking Item :</span>
                                                                                <span>{{$item->nama_jasa}}</span>
                                                                            </div>
                                                                            <div class="price">
                                                                                <span class="new">For Date :</span>
                                                                                <span>{{$item->booking_date}}</span>
                                                                            </div>
                                                                            <div class="price">
                                                                                <span class="new">Booking Name :</span>
                                                                                <li class="old">{{$item->booking_firstname}} {{$item->booking_lastname}}</li>
                                                                            </div>
                                                                            <div class="price">
                                                                                <span class="new">Booking Phone :</span>
                                                                                <li class="old">{{$item->booking_phone}}</li>
                                                                            </div>
                                                                            <div class="price">
                                                                                <span class="new">Booking E-mail :</span>
                                                                                <li class="old">{{$item->booking_email}}</li>
                                                                            </div>
                                                                            <div class="price">
                                                                                <span class="new">Booking Address :</span>
                                                                                <li class="old">{{$item->booking_address}}, {{$item->booking_city}}, {{$item->booking_state}}, {{$item->booking_zipcode}}</li>
                                                                            </div>
                                                                            <div class="price">
                                                                                <span class="new">Notes* :</span>
                                                                                <li class="old">{{$item->notes}}</li>
                                                                            </div>
                                                                        </div>
                                                                        @if ($item->status == 'pending')
                                                                        <div class="quickview-plus-minus">
                                                                            <form action="{{route("orders.accept")}}" method="POST">
                                                                                {!! csrf_field() !!}

                                                                                <input type="hidden" name="order_number" value="{{$item->order_number }}">
                                                                                <input type="hidden" name="booking_email" value="{{$item->booking_email }}">
                                                                                <input type="hidden" name="status" value="processing">
                                                                                <div class="quickview-btn-cart-accept">
                                                                                    <button class="btn-hover-black" type="submit">Accept</button>
                                                                                </div>
                                                                            </form>
                                                                            <form action="{{route("orders.reject")}}" method="POST">
                                                                                {!! csrf_field() !!}

                                                                                <input type="hidden" name="order_number" value="{{$item->order_number }}">
                                                                                <input type="hidden" name="booking_email" value="{{$item->booking_email }}">
                                                                                <input type="hidden" name="status" value="decline">
                                                                                <div class="quickview-btn-cart-reject">
                                                                                    <button class="btn-hover-black" type="submit">Reject</button>
                                                                                </div>
                                                                            </form>
                                                                        </div>
                                                                        @elseif($item->status == 'completed' && $item->payment_method == 'paypal')
                                                                        <div class="quickview-plus-minus">
                                                                                <div class="quickview-btn-cart">
                                                                                    <a class="btn-hover-black" href="{{route('withdraw.funds', $item->order_number)}}">Withdrawal Request</a>
                                                                                </div>
                                                                        </div>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- modal -->
                                                    @endforeach
                                                </tbody>
                                            </table>
                                            <div class="pagination-style mt-50 text-center">
                                                <ul>
                                                    <li>{{$projectpending->links()}}</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </form>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="project2" role="tabpanel">
                        <div class="about-banner-area pb-65">
                            <div class="container">
                                @if ($projectprocessing->total() == 0)
                                <p style="text-align:center;">No data available.</p>
                                @else
                                <form action="#">
                                    <div class="table-content table-responsive">
                                        <table>
                                            <thead>
                                                <tr>
                                                    <th>status</th>
                                                    <th>Order Number</th>
                                                    <th>Booking date</th>
                                                    <th>Total</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($projectprocessing as $item)
                                                <form action="{{route("orders.accept")}}" method="POST">
                                                    {!! csrf_field() !!}
                                                </form>
                                                <tr>
                                                    @if ($item->status == 'pending')
                                                        <td class="product-remove text-warning">Need your response</td>
                                                    @elseif($item->status == 'processing')
                                                        <td class="product-remove text-primary">On Going</td>
                                                    @elseif($item->status == 'completed')
                                                        <td class="product-remove text-info">Withdraw Available</td>
                                                    @elseif($item->status == 'clear')
                                                        <td class="product-remove text-success">Clear</td>
                                                    @else
                                                        <td class="product-remove text-danger">Decline</td>
                                                    @endif
                                                    <td class="product-name">{{$item->order_number}}</td>
                                                    <td class="product-quantity">{{$item->booking_date}}</td>
                                                    <td class="product-subtotal">@currency($item->grand_total)</td>
                                                    <td class="product-name"><a data-toggle="modal" data-target="#orderModal{{$item->order_number}}" href="#">See details</a></td>
                                                </tr>

                                                <!-- modal -->
                                                <div class="modal fade" id="orderModal{{$item->order_number}}" tabindex="-1" role="dialog" aria-hidden="true">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span class="pe-7s-close" aria-hidden="true"></span>
                                                    </button>
                                                    <div class="modal-dialog modal-quickview-width" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-body">
                                                                <div class="qwick-view-left">
                                                                    <div class="quick-view-learg-img">
                                                                        <div class="quick-view-tab-content tab-content">
                                                                            <div class="tab-pane active show fade" id="modal1" role="tabpanel">
                                                                                <img src="/storage/{{$item->cover_img}}" alt="">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="qwick-view-right">
                                                                    <div class="qwick-view-content">
                                                                        <h3>{{$item->order_number}} ({{$item->created_at}})</h3>
                                                                        <div class="price">
                                                                            <span class="new">Total Payment :</span>
                                                                            <span>@currency($item->grand_total)</span>
                                                                            @if ($item->payment_method == 'cash_on_delivery')
                                                                                <span>(Cash on Delivery)</span>
                                                                            @elseif ($item->payment_method == 'paypal')
                                                                                <span>(PayPal)</span>
                                                                            @endif
                                                                        </div>
                                                                        <div class="price">
                                                                            <span class="new">Booking Item :</span>
                                                                            <span>{{$item->nama_jasa}}</span>
                                                                        </div>
                                                                        <div class="price">
                                                                            <span class="new">For Date :</span>
                                                                            <span>{{$item->booking_date}}</span>
                                                                        </div>
                                                                        <div class="price">
                                                                            <span class="new">Booking Name :</span>
                                                                            <li class="old">{{$item->booking_firstname}} {{$item->booking_lastname}}</li>
                                                                        </div>
                                                                        <div class="price">
                                                                            <span class="new">Booking Phone :</span>
                                                                            <li class="old">{{$item->booking_phone}}</li>
                                                                        </div>
                                                                        <div class="price">
                                                                            <span class="new">Booking E-mail :</span>
                                                                            <li class="old">{{$item->booking_email}}</li>
                                                                        </div>
                                                                        <div class="price">
                                                                            <span class="new">Booking Address :</span>
                                                                            <li class="old">{{$item->booking_address}}, {{$item->booking_city}}, {{$item->booking_state}}, {{$item->booking_zipcode}}</li>
                                                                        </div>
                                                                        <div class="price">
                                                                            <span class="new">Notes* :</span>
                                                                            <li class="old">{{$item->notes}}</li>
                                                                        </div>
                                                                    </div>
                                                                    @if ($item->status == 'pending')
                                                                    <div class="quickview-plus-minus">
                                                                        <form action="{{route("orders.accept")}}" method="POST">
                                                                            {!! csrf_field() !!}

                                                                            <input type="hidden" name="order_number" value="{{$item->order_number }}">
                                                                            <input type="hidden" name="booking_email" value="{{$item->booking_email }}">
                                                                            <input type="hidden" name="status" value="processing">
                                                                            <div class="quickview-btn-cart-accept">
                                                                                <button class="btn-hover-black" type="submit">Accept</button>
                                                                            </div>
                                                                        </form>
                                                                        <form action="{{route("orders.reject")}}" method="POST">
                                                                            {!! csrf_field() !!}

                                                                            <input type="hidden" name="order_number" value="{{$item->order_number }}">
                                                                            <input type="hidden" name="booking_email" value="{{$item->booking_email }}">
                                                                            <input type="hidden" name="status" value="decline">
                                                                            <div class="quickview-btn-cart-reject">
                                                                                <button class="btn-hover-black" type="submit">Reject</button>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                    @elseif($item->status == 'completed' && $item->payment_method == 'paypal')
                                                                    <div class="quickview-plus-minus">
                                                                            <div class="quickview-btn-cart">
                                                                                <a class="btn-hover-black" href="{{route('withdraw.funds', $item->order_number)}}">Withdrawal Request</a>
                                                                            </div>
                                                                    </div>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- modal -->
                                                @endforeach
                                            </tbody>
                                        </table>
                                        <div class="pagination-style mt-50 text-center">
                                            <ul>
                                                <li>{{$projectprocessing->links()}}</li>
                                            </ul>
                                        </div>
                                    </div>
                                </form>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="project3" role="tabpanel">
                        <div class="about-banner-area pb-65">
                            <div class="container">
                                @if ($projectwithdraw->total() == 0)
                                <p style="text-align:center;">No data available.</p>
                                @else
                                <form action="#">
                                    <div class="table-content table-responsive">
                                        <table>
                                            <thead>
                                                <tr>
                                                    <th>status</th>
                                                    <th>Order Number</th>
                                                    <th>Booking date</th>
                                                    <th>Total</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($projectwithdraw as $item)
                                                <form action="{{route("orders.accept")}}" method="POST">
                                                    {!! csrf_field() !!}
                                                </form>
                                                <tr>
                                                    @if ($item->status == 'pending')
                                                        <td class="product-remove text-warning">Need your response</td>
                                                    @elseif($item->status == 'processing')
                                                        <td class="product-remove text-primary">On Going</td>
                                                    @elseif($item->status == 'completed')
                                                        <td class="product-remove text-info">Withdraw Available</td>
                                                    @elseif($item->status == 'clear')
                                                        <td class="product-remove text-success">Clear</td>
                                                    @else
                                                        <td class="product-remove text-danger">Decline</td>
                                                    @endif
                                                    <td class="product-name">{{$item->order_number}}</td>
                                                    <td class="product-quantity">{{$item->booking_date}}</td>
                                                    <td class="product-subtotal">@currency($item->grand_total)</td>
                                                    <td class="product-name"><a data-toggle="modal" data-target="#orderModal{{$item->order_number}}" href="#">See details</a></td>
                                                </tr>

                                                <!-- modal -->
                                                <div class="modal fade" id="orderModal{{$item->order_number}}" tabindex="-1" role="dialog" aria-hidden="true">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span class="pe-7s-close" aria-hidden="true"></span>
                                                    </button>
                                                    <div class="modal-dialog modal-quickview-width" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-body">
                                                                <div class="qwick-view-left">
                                                                    <div class="quick-view-learg-img">
                                                                        <div class="quick-view-tab-content tab-content">
                                                                            <div class="tab-pane active show fade" id="modal1" role="tabpanel">
                                                                                <img src="/storage/{{$item->cover_img}}" alt="">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="qwick-view-right">
                                                                    <div class="qwick-view-content">
                                                                        <h3>{{$item->order_number}} ({{$item->created_at}})</h3>
                                                                        <div class="price">
                                                                            <span class="new">Total Payment :</span>
                                                                            <span>@currency($item->grand_total)</span>
                                                                            @if ($item->payment_method == 'cash_on_delivery')
                                                                                <span>(Cash on Delivery)</span>
                                                                            @elseif ($item->payment_method == 'paypal')
                                                                                <span>(PayPal)</span>
                                                                            @endif
                                                                        </div>
                                                                        <div class="price">
                                                                            <span class="new">Booking Item :</span>
                                                                            <span>{{$item->nama_jasa}}</span>
                                                                        </div>
                                                                        <div class="price">
                                                                            <span class="new">For Date :</span>
                                                                            <span>{{$item->booking_date}}</span>
                                                                        </div>
                                                                        <div class="price">
                                                                            <span class="new">Booking Name :</span>
                                                                            <li class="old">{{$item->booking_firstname}} {{$item->booking_lastname}}</li>
                                                                        </div>
                                                                        <div class="price">
                                                                            <span class="new">Booking Phone :</span>
                                                                            <li class="old">{{$item->booking_phone}}</li>
                                                                        </div>
                                                                        <div class="price">
                                                                            <span class="new">Booking E-mail :</span>
                                                                            <li class="old">{{$item->booking_email}}</li>
                                                                        </div>
                                                                        <div class="price">
                                                                            <span class="new">Booking Address :</span>
                                                                            <li class="old">{{$item->booking_address}}, {{$item->booking_city}}, {{$item->booking_state}}, {{$item->booking_zipcode}}</li>
                                                                        </div>
                                                                        <div class="price">
                                                                            <span class="new">Notes* :</span>
                                                                            <li class="old">{{$item->notes}}</li>
                                                                        </div>
                                                                    </div>
                                                                    @if ($item->status == 'pending')
                                                                    <div class="quickview-plus-minus">
                                                                        <form action="{{route("orders.accept")}}" method="POST">
                                                                            {!! csrf_field() !!}

                                                                            <input type="hidden" name="order_number" value="{{$item->order_number }}">
                                                                            <input type="hidden" name="booking_email" value="{{$item->booking_email }}">
                                                                            <input type="hidden" name="status" value="processing">
                                                                            <div class="quickview-btn-cart-accept">
                                                                                <button class="btn-hover-black" type="submit">Accept</button>
                                                                            </div>
                                                                        </form>
                                                                        <form action="{{route("orders.reject")}}" method="POST">
                                                                            {!! csrf_field() !!}

                                                                            <input type="hidden" name="order_number" value="{{$item->order_number }}">
                                                                            <input type="hidden" name="booking_email" value="{{$item->booking_email }}">
                                                                            <input type="hidden" name="status" value="decline">
                                                                            <div class="quickview-btn-cart-reject">
                                                                                <button class="btn-hover-black" type="submit">Reject</button>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                    @elseif($item->status == 'completed' && $item->payment_method == 'paypal')
                                                                    <div class="quickview-plus-minus">
                                                                            <div class="quickview-btn-cart">
                                                                                <a class="btn-hover-black" href="{{route('withdraw.funds', $item->order_number)}}">Withdrawal Request</a>
                                                                            </div>
                                                                    </div>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- modal -->
                                                @endforeach
                                            </tbody>
                                        </table>
                                        <div class="pagination-style mt-50 text-center">
                                            <ul>
                                                <li>{{$projectwithdraw->links()}}</li>
                                            </ul>
                                        </div>
                                    </div>
                                </form>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="project4" role="tabpanel">
                        <div class="about-banner-area pb-65">
                            <div class="container">
                                @if ($projectcompleted->total() == 0)
                                <p style="text-align:center;">No data available.</p>
                                @else
                                <form action="#">
                                    <div class="table-content table-responsive">
                                        <table>
                                            <thead>
                                                <tr>
                                                    <th>status</th>
                                                    <th>Order Number</th>
                                                    <th>Booking date</th>
                                                    <th>Total</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($projectcompleted as $item)
                                                <form action="{{route("orders.accept")}}" method="POST">
                                                    {!! csrf_field() !!}
                                                </form>
                                                <tr>
                                                    @if ($item->status == 'pending')
                                                        <td class="product-remove text-warning">Need your response</td>
                                                    @elseif($item->status == 'processing')
                                                        <td class="product-remove text-primary">On Going</td>
                                                    @elseif($item->status == 'completed')
                                                        <td class="product-remove text-info">Withdraw Available</td>
                                                    @elseif($item->status == 'clear')
                                                        <td class="product-remove text-success">Clear</td>
                                                    @else
                                                        <td class="product-remove text-danger">Decline</td>
                                                    @endif
                                                    <td class="product-name">{{$item->order_number}}</td>
                                                    <td class="product-quantity">{{$item->booking_date}}</td>
                                                    <td class="product-subtotal">@currency($item->grand_total)</td>
                                                    <td class="product-name"><a data-toggle="modal" data-target="#orderModal{{$item->order_number}}" href="#">See details</a></td>
                                                </tr>

                                                <!-- modal -->
                                                <div class="modal fade" id="orderModal{{$item->order_number}}" tabindex="-1" role="dialog" aria-hidden="true">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span class="pe-7s-close" aria-hidden="true"></span>
                                                    </button>
                                                    <div class="modal-dialog modal-quickview-width" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-body">
                                                                <div class="qwick-view-left">
                                                                    <div class="quick-view-learg-img">
                                                                        <div class="quick-view-tab-content tab-content">
                                                                            <div class="tab-pane active show fade" id="modal1" role="tabpanel">
                                                                                <img src="/storage/{{$item->cover_img}}" alt="">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="qwick-view-right">
                                                                    <div class="qwick-view-content">
                                                                        <h3>{{$item->order_number}} ({{$item->created_at}})</h3>
                                                                        <div class="price">
                                                                            <span class="new">Total Payment :</span>
                                                                            <span>@currency($item->grand_total)</span>
                                                                            @if ($item->payment_method == 'cash_on_delivery')
                                                                                <span>(Cash on Delivery)</span>
                                                                            @elseif ($item->payment_method == 'paypal')
                                                                                <span>(PayPal)</span>
                                                                            @endif
                                                                        </div>
                                                                        <div class="price">
                                                                            <span class="new">Booking Item :</span>
                                                                            <span>{{$item->nama_jasa}}</span>
                                                                        </div>
                                                                        <div class="price">
                                                                            <span class="new">For Date :</span>
                                                                            <span>{{$item->booking_date}}</span>
                                                                        </div>
                                                                        <div class="price">
                                                                            <span class="new">Booking Name :</span>
                                                                            <li class="old">{{$item->booking_firstname}} {{$item->booking_lastname}}</li>
                                                                        </div>
                                                                        <div class="price">
                                                                            <span class="new">Booking Phone :</span>
                                                                            <li class="old">{{$item->booking_phone}}</li>
                                                                        </div>
                                                                        <div class="price">
                                                                            <span class="new">Booking E-mail :</span>
                                                                            <li class="old">{{$item->booking_email}}</li>
                                                                        </div>
                                                                        <div class="price">
                                                                            <span class="new">Booking Address :</span>
                                                                            <li class="old">{{$item->booking_address}}, {{$item->booking_city}}, {{$item->booking_state}}, {{$item->booking_zipcode}}</li>
                                                                        </div>
                                                                        <div class="price">
                                                                            <span class="new">Notes* :</span>
                                                                            <li class="old">{{$item->notes}}</li>
                                                                        </div>
                                                                    </div>
                                                                    @if ($item->status == 'pending')
                                                                    <div class="quickview-plus-minus">
                                                                        <form action="{{route("orders.accept")}}" method="POST">
                                                                            {!! csrf_field() !!}

                                                                            <input type="hidden" name="order_number" value="{{$item->order_number }}">
                                                                            <input type="hidden" name="booking_email" value="{{$item->booking_email }}">
                                                                            <input type="hidden" name="status" value="processing">
                                                                            <div class="quickview-btn-cart-accept">
                                                                                <button class="btn-hover-black" type="submit">Accept</button>
                                                                            </div>
                                                                        </form>
                                                                        <form action="{{route("orders.reject")}}" method="POST">
                                                                            {!! csrf_field() !!}

                                                                            <input type="hidden" name="order_number" value="{{$item->order_number }}">
                                                                            <input type="hidden" name="booking_email" value="{{$item->booking_email }}">
                                                                            <input type="hidden" name="status" value="decline">
                                                                            <div class="quickview-btn-cart-reject">
                                                                                <button class="btn-hover-black" type="submit">Reject</button>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                    @elseif($item->status == 'completed' && $item->payment_method == 'paypal')
                                                                    <div class="quickview-plus-minus">
                                                                            <div class="quickview-btn-cart">
                                                                                <a class="btn-hover-black" href="{{route('withdraw.funds', $item->order_number)}}">Withdrawal Request</a>
                                                                            </div>
                                                                    </div>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- modal -->
                                                @endforeach
                                            </tbody>
                                        </table>
                                        <div class="pagination-style mt-50 text-center">
                                            <ul>
                                                <li>{{$projectcompleted->links()}}</li>
                                            </ul>
                                        </div>
                                    </div>
                                </form>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="project5" role="tabpanel">
                        <div class="about-banner-area pb-65">
                            <div class="container">
                                @if ($projectdecline->total() == 0)
                                <p style="text-align:center;">No data available.</p>
                                @else
                                <form action="#">
                                    <div class="table-content table-responsive">
                                        <table>
                                            <thead>
                                                <tr>
                                                    <th>status</th>
                                                    <th>Order Number</th>
                                                    <th>Booking date</th>
                                                    <th>Total</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($projectdecline as $item)
                                                <form action="{{route("orders.accept")}}" method="POST">
                                                    {!! csrf_field() !!}
                                                </form>
                                                <tr>
                                                    @if ($item->status == 'pending')
                                                        <td class="product-remove text-warning">Need your response</td>
                                                    @elseif($item->status == 'processing')
                                                        <td class="product-remove text-primary">On Going</td>
                                                    @elseif($item->status == 'completed')
                                                        <td class="product-remove text-info">Withdraw Available</td>
                                                    @elseif($item->status == 'clear')
                                                        <td class="product-remove text-success">Clear</td>
                                                    @else
                                                        <td class="product-remove text-danger">Decline</td>
                                                    @endif
                                                    <td class="product-name">{{$item->order_number}}</td>
                                                    <td class="product-quantity">{{$item->booking_date}}</td>
                                                    <td class="product-subtotal">@currency($item->grand_total)</td>
                                                    <td class="product-name"><a data-toggle="modal" data-target="#orderModal{{$item->order_number}}" href="#">See details</a></td>
                                                </tr>

                                                <!-- modal -->
                                                <div class="modal fade" id="orderModal{{$item->order_number}}" tabindex="-1" role="dialog" aria-hidden="true">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span class="pe-7s-close" aria-hidden="true"></span>
                                                    </button>
                                                    <div class="modal-dialog modal-quickview-width" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-body">
                                                                <div class="qwick-view-left">
                                                                    <div class="quick-view-learg-img">
                                                                        <div class="quick-view-tab-content tab-content">
                                                                            <div class="tab-pane active show fade" id="modal1" role="tabpanel">
                                                                                <img src="/storage/{{$item->cover_img}}" alt="">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="qwick-view-right">
                                                                    <div class="qwick-view-content">
                                                                        <h3>{{$item->order_number}} ({{$item->created_at}})</h3>
                                                                        <div class="price">
                                                                            <span class="new">Total Payment :</span>
                                                                            <span>@currency($item->grand_total)</span>
                                                                            @if ($item->payment_method == 'cash_on_delivery')
                                                                                <span>(Cash on Delivery)</span>
                                                                            @elseif ($item->payment_method == 'paypal')
                                                                                <span>(PayPal)</span>
                                                                            @endif
                                                                        </div>
                                                                        <div class="price">
                                                                            <span class="new">Booking Item :</span>
                                                                            <span>{{$item->nama_jasa}}</span>
                                                                        </div>
                                                                        <div class="price">
                                                                            <span class="new">For Date :</span>
                                                                            <span>{{$item->booking_date}}</span>
                                                                        </div>
                                                                        <div class="price">
                                                                            <span class="new">Booking Name :</span>
                                                                            <li class="old">{{$item->booking_firstname}} {{$item->booking_lastname}}</li>
                                                                        </div>
                                                                        <div class="price">
                                                                            <span class="new">Booking Phone :</span>
                                                                            <li class="old">{{$item->booking_phone}}</li>
                                                                        </div>
                                                                        <div class="price">
                                                                            <span class="new">Booking E-mail :</span>
                                                                            <li class="old">{{$item->booking_email}}</li>
                                                                        </div>
                                                                        <div class="price">
                                                                            <span class="new">Booking Address :</span>
                                                                            <li class="old">{{$item->booking_address}}, {{$item->booking_city}}, {{$item->booking_state}}, {{$item->booking_zipcode}}</li>
                                                                        </div>
                                                                        <div class="price">
                                                                            <span class="new">Notes* :</span>
                                                                            <li class="old">{{$item->notes}}</li>
                                                                        </div>
                                                                    </div>
                                                                    @if ($item->status == 'pending')
                                                                    <div class="quickview-plus-minus">
                                                                        <form action="{{route("orders.accept")}}" method="POST">
                                                                            {!! csrf_field() !!}

                                                                            <input type="hidden" name="order_number" value="{{$item->order_number }}">
                                                                            <input type="hidden" name="booking_email" value="{{$item->booking_email }}">
                                                                            <input type="hidden" name="status" value="processing">
                                                                            <div class="quickview-btn-cart-accept">
                                                                                <button class="btn-hover-black" type="submit">Accept</button>
                                                                            </div>
                                                                        </form>
                                                                        <form action="{{route("orders.reject")}}" method="POST">
                                                                            {!! csrf_field() !!}

                                                                            <input type="hidden" name="order_number" value="{{$item->order_number }}">
                                                                            <input type="hidden" name="booking_email" value="{{$item->booking_email }}">
                                                                            <input type="hidden" name="status" value="decline">
                                                                            <div class="quickview-btn-cart-reject">
                                                                                <button class="btn-hover-black" type="submit">Reject</button>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                    @elseif($item->status == 'completed' && $item->payment_method == 'paypal')
                                                                    <div class="quickview-plus-minus">
                                                                            <div class="quickview-btn-cart">
                                                                                <a class="btn-hover-black" href="{{route('withdraw.funds', $item->order_number)}}">Withdrawal Request</a>
                                                                            </div>
                                                                    </div>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- modal -->
                                                @endforeach
                                            </tbody>
                                        </table>
                                        <div class="pagination-style mt-50 text-center">
                                            <ul>
                                                <li>{{$projectdecline->links()}}</li>
                                            </ul>
                                        </div>
                                    </div>
                                </form>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>


@endsection
