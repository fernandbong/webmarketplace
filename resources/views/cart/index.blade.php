@extends('layouts.app')

@section('title')
    <title>Marketplace Fotografer | Cart</title>
@endsection

@section('content')

    <div class="cart-main-area pt-95 pb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <h1 class="cart-heading">Check Date</h1>
                        <div class="table-content table-responsive">
                            <table>
                                <thead>
                                    <tr>
                                        <th>remove</th>
                                        <th>Product</th>
                                        <th>Price</th>
                                        <th>Days</th>
                                        <th>Check Date</th>
                                        <th>Sub Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($cartItems as $item)

                                    <tr>
                                        <td class="product-remove"><a href="{{ route('cart.destroy', $item->id)}}"><i class="pe-7s-close"></i></a></td>
                                        <td class="product-name"><a href="#">{{ $item->name}}</a></td>
                                        <td class="product-price-cart"><span class="amount">@currency($item->price)</span></td>
                                        <td class="product-quantity">
                                            <form action="{{route('cart.update', $item->id)}}">
                                                <input placeholder="days" name="quantity" type="number" value = {{$item->quantity}}>

                                                <input class="button" value="save" type="submit">
                                            </form>
                                        </td>
                                        <td class="product-name">
                                            <form action="{{route('cart.check', $item->id)}}" method="get">
                                                <input placeholder="Pick Date" class="textbox-n" type="text" onfocus="(this.type='date')" name="date_check">

                                                <input class="button" value="check" type="submit">
                                            </form>
                                        </td>
                                        <td class="product-subtotal">@currency(\Cart::session(auth()->id())->get($item->id)->getPriceSum())</td>
                                    </tr>

                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="coupon-all">
                                    <div class="coupon">
                                        <form action="{{route('cart.coupon')}}" method='get'>
                                            <input id="coupon_code" class="input-text" name="coupon_code" value="" placeholder="Coupon code" type="text">
                                            <input class="button" name="apply_coupon" value="Apply coupon" type="submit">
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-5 ml-auto">
                                <div class="cart-page-total">
                                    <h2>Totals</h2>
                                    <ul>
                                        <li>Subtotal<span>@currency($subTotal)</span></li>

                                        @foreach($cartConditions as $condition)
                                            <li class='text-uppercase text-success'>{{$condition->getName()}} ({{$condition->getValue()}})<span>@currency($condition->getCalculatedValue(\Cart::session(auth()->id())->getSubTotal()))</span></li>
                                        @endforeach

                                        <li>Total<span>@currency(\Cart::session(auth()->id())->getTotal())</span></li>
                                    </ul>
                                    <a href="{{ route('cart.checkout')}}">CHECKOUT BOOKING</a>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
@endsection
