@extends('layouts.app')

@section('title')
    <title>Marketplace Fotografer | Checkout</title>
@endsection


@section('content')

<!-- checkout-area start -->
<div class="checkout-area ptb-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-12 col-12">
                <form action="{{route('orders.store')}}" method="post">
                    @csrf
                    <div class="checkbox-form">
                        <h3>Booking Infromation</h3>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="checkout-form-list">
                                    <label>Select Date <span class="required">*</span></label>
                                    <input class="textbox-n" type="text" onfocus="(this.type='date')" name="booking_date" >
                                    @if ($errors->has('booking_date'))
                                        <p style="font-size:12px; color:red;">{{ $errors->first('booking_date') }}</p>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="checkout-form-list">
                                    <label>First Name <span class="required">*</span></label>
                                    <input type="text" name="booking_firstname" placeholder="" />
                                    @if ($errors->has('booking_firstname'))
                                        <p style="font-size:12px; color:red;">{{ $errors->first('booking_firstname') }}</p>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="checkout-form-list">
                                    <label>Last Name <span class="required">*</span></label>
                                    <input type="text" name="booking_lastname" placeholder="" />
                                    @if ($errors->has('booking_lastname'))
                                        <p style="font-size:12px; color:red;">{{ $errors->first('booking_lastname') }}</p>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="checkout-form-list">
                                    <label>Address <span class="required">*</span></label>
                                    <input type="text" name="booking_address" placeholder="Street address" />
                                    @if ($errors->has('booking_address'))
                                        <p style="font-size:12px; color:red;">{{ $errors->first('booking_address') }}</p>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="checkout-form-list">
                                    <label>Town / City <span class="required">*</span></label>
                                    <input type="text" name="booking_city" />
                                    @if ($errors->has('booking_city'))
                                        <p style="font-size:12px; color:red;">{{ $errors->first('booking_city') }}</p>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="checkout-form-list">
                                    <label>State / County <span class="required">*</span></label>
                                    <input type="text" name="booking_state" placeholder="" />
                                    @if ($errors->has('booking_state'))
                                        <p style="font-size:12px; color:red;">{{ $errors->first('booking_state') }}</p>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="checkout-form-list">
                                    <label>Postcode / Zip <span class="required">*</span></label>
                                    <input type="text" name="booking_zipcode"/>
                                    @if ($errors->has('booking_zipcode'))
                                        <p style="font-size:12px; color:red;">{{ $errors->first('booking_zipcode') }}</p>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="checkout-form-list">
                                    <label>Email Address <span class="required">*</span></label>
                                    <input type="email" name="booking_email" value="{{Auth::user()->email}}"/>
                                    @if ($errors->has('booking_email'))
                                        <p style="font-size:12px; color:red;">{{ $errors->first('booking_email') }}</p>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="checkout-form-list">
                                    <label>Phone  <span class="required">*</span></label>
                                    <input type="text" name="booking_phone"/>
                                    @if ($errors->has('booking_phone'))
                                        <p style="font-size:12px; color:red;">{{ $errors->first('booking_phone') }}</p>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="checkout-form-list ">
                                    <label>Select Payment <span class="required">*</span></label>
                                        <div class="btn-group" data-toggle="buttons">
                                            <label class="btn btn-primary active mr-2">
                                                <input type="radio" name="payment_method" id="" value="cash_on_delivery" autocomplete="off" checked>Cash on Delivery
                                            </label>

                                            <label class="btn btn-primary mr-2">
                                                <input type="radio" name="payment_method" id="" value="paypal" autocomplete="off" >PayPal
                                            </label>

                                            <label class="btn btn-primary">
                                                <input type="radio" name="payment_method" id="" value="banktransfer" autocomplete="off" >Bank Transfer
                                            </label>
                                        </div>
                                </div>
                            </div>
                        </div>
                        <div class="different-address">
                            <div class="order-notes">
                                <div class="checkout-form-list mrg-nn">
                                    <label>Order Notes (optional)</label>
                                    <textarea name="notes" id="checkout-mess" cols="30" rows="10" placeholder="Notes about your order, e.g. special notes for photographer." ></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="order-button-payment">
                        <input type="submit" value="Place order" />
                    </div>
                </form>
            </div>
            <div class="col-lg-6 col-md-12 col-12">
                <div class="your-order">
                    <h3>Your booking</h3>
                    <div class="your-order-table table-responsive">
                        <table>
                            <thead>
                                <tr>
                                    <th class="product-name">Product</th>
                                    <th class="product-total">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($cartItems as $item)
                                <tr class="cart_item">
                                    <td class="product-name">{{$item->name}} <strong class="product-quantity">{{$item->quantity}} day(s)</strong>
                                    </td>
                                    <td class="product-total">
                                        <span class="amount">@currency(Cart::session(auth()->id())->get($item->id)->getPriceSum())</span>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr class="cart-subtotal">
                                    <th>Subtotal</th>
                                    <td><strong><span class="amount">@currency(\Cart::session(auth()->id())->getSubTotal())</span></strong></td>
                                </tr>
                                <tr class="cart-subtotal">
                                    @foreach($cartConditions as $condition)
                                        <th class="text-success">{{$condition->getName()}} ({{$condition->getValue()}})</th>
                                        <td><strong><span class="amount text-success">@currency($condition->getCalculatedValue(\Cart::session(auth()->id())->getSubTotal()))</span></strong></td>
                                    @endforeach
                                </tr>
                                <tr class="order-total">
                                    <th>Order Total</th>
                                    <td><strong><span class="amount">@currency(\Cart::session(auth()->id())->getTotal())</span></strong></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- checkout-area end -->

@endsection
