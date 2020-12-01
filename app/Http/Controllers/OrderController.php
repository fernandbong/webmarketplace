<?php

namespace App\Http\Controllers;

use App\Shop;
use App\Order;
use App\Product;
use Midtrans\Snap;
use App\Mail\OrderCOD;
use Illuminate\Http\Request;
use App\Mail\BookingAccepted;
use App\Mail\BookingRejected;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\App;
use App\Mail\NewOrderCashOnDelivery;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\Console\Input\Input;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function history()
    {
        // $order = Shop::select('*')
        //                 ->leftJoin('products', 'shops.id', '=', 'products.shop_id')
        //                 ->leftJoin('order_items', 'order_items.product_id', '=', 'products.id')
        //                 ->leftJoin('orders', 'orders.id', '=', 'order_items.order_id')
        //                 ->where('orders.user_id', auth()->id())
        //                 ->paginate(5);

        $orderpending = Shop::select('*')
                        ->leftJoin('products', 'shops.id', '=', 'products.shop_id')
                        ->leftJoin('order_items', 'order_items.product_id', '=', 'products.id')
                        ->leftJoin('orders', 'orders.id', '=', 'order_items.order_id')
                        ->where('orders.user_id', auth()->id())
                        ->where('orders.status', 'pending')
                        ->paginate(5, ['*'], 'orderpending');

        $orderprocessing = Shop::select('*')
                        ->leftJoin('products', 'shops.id', '=', 'products.shop_id')
                        ->leftJoin('order_items', 'order_items.product_id', '=', 'products.id')
                        ->leftJoin('orders', 'orders.id', '=', 'order_items.order_id')
                        ->where('orders.user_id', auth()->id())
                        ->where('orders.status', 'processing')
                        ->paginate(5, ['*'], 'orderprocessing');

        $ordercompleted = Shop::select('*')
                        ->leftJoin('products', 'shops.id', '=', 'products.shop_id')
                        ->leftJoin('order_items', 'order_items.product_id', '=', 'products.id')
                        ->leftJoin('orders', 'orders.id', '=', 'order_items.order_id')
                        ->where('orders.user_id', auth()->id())
                        ->where(function($q){
                            $q->where('orders.status', 'completed')
                            ->orWhere('orders.status', 'clear');
                        })
                        ->paginate(5, ['*'], 'ordercompleted');

        $orderdecline = Shop::select('*')
                        ->leftJoin('products', 'shops.id', '=', 'products.shop_id')
                        ->leftJoin('order_items', 'order_items.product_id', '=', 'products.id')
                        ->leftJoin('orders', 'orders.id', '=', 'order_items.order_id')
                        ->where('orders.user_id', auth()->id())
                        ->where('orders.status', 'decline')
                        ->paginate(5, ['*'], 'orderdecline');


        return view('order.history', ['orderpending'=>$orderpending, 'orderprocessing'=>$orderprocessing, 'ordercompleted'=>$ordercompleted, 'orderdecline'=>$orderdecline] );
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function project()
    {

        $projectpending = Order::select('*')
                            ->leftJoin('order_items', 'orders.id', '=', 'order_items.order_id')
                            ->leftJoin('products', 'order_items.product_id', '=', 'products.id')
                            ->leftJoin('shops', 'shops.id', '=', 'products.shop_id')
                            ->where('shops.user_id', auth()->id())
                            ->where('orders.status', 'pending')
                            ->paginate(5, ['*'], 'projectpending');

        $projectprocessing = Order::select('*')
                            ->leftJoin('order_items', 'orders.id', '=', 'order_items.order_id')
                            ->leftJoin('products', 'order_items.product_id', '=', 'products.id')
                            ->leftJoin('shops', 'shops.id', '=', 'products.shop_id')
                            ->where('shops.user_id', auth()->id())
                            ->where('orders.status', 'processing')
                            ->paginate(5, ['*'], 'projectprocessing');

        $projectwithdraw= Order::select('*')
                            ->leftJoin('order_items', 'orders.id', '=', 'order_items.order_id')
                            ->leftJoin('products', 'order_items.product_id', '=', 'products.id')
                            ->leftJoin('shops', 'shops.id', '=', 'products.shop_id')
                            ->where('shops.user_id', auth()->id())
                            ->where('orders.status', 'completed')
                            ->paginate(5, ['*'], 'projectwithdraw');

        $projectcompleted= Order::select('*')
                            ->leftJoin('order_items', 'orders.id', '=', 'order_items.order_id')
                            ->leftJoin('products', 'order_items.product_id', '=', 'products.id')
                            ->leftJoin('shops', 'shops.id', '=', 'products.shop_id')
                            ->where('shops.user_id', auth()->id())
                            ->where('orders.status', 'clear')
                            ->paginate(5, ['*'], 'projectcompleted');

        $projectdecline= Order::select('*')
                            ->leftJoin('order_items', 'orders.id', '=', 'order_items.order_id')
                            ->leftJoin('products', 'order_items.product_id', '=', 'products.id')
                            ->leftJoin('shops', 'shops.id', '=', 'products.shop_id')
                            ->where('shops.user_id', auth()->id())
                            ->where('orders.status', 'decline')
                            ->paginate(5, ['*'], 'projectdecline');

        return view('order.project', compact('projectpending', 'projectprocessing', 'projectwithdraw', 'projectcompleted', 'projectdecline'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'booking_date' => 'required',
            'booking_firstname' => 'required',
            'booking_lastname' => 'required',
            'booking_state' => 'required',
            'booking_city' => 'required',
            'booking_address' => 'required',
            'booking_phone' => 'required',
            'booking_email' => 'required',
            'booking_zipcode' => 'required',
            'payment_method' => 'required'
        ]);

        $cartItems =\Cart::session(auth()->id())->getContent();

            foreach ($cartItems as $item) {
                $fotgraf = Product::with('shop')->where('id', $item->id)->first();
                $checkdate = request('booking_date');
                $ordercheck = Order::select('*')
                            ->leftJoin('order_items', 'orders.id', '=', 'order_items.order_id')
                            ->leftJoin('products', 'products.id', '=', 'order_items.product_id')
                            ->leftJoin('shops', 'shops.id', '=', 'products.shop_id')
                            ->where('shops.id', $fotgraf->shop->id)
                            ->where('orders.booking_date', $checkdate)
                            ->first();
            }

        if($ordercheck){
            return back()->withError('Sorry! On that date someone already booked at the same photographer');
        }else{
            $order = new Order();

            $order->order_number = uniqid('BN-');
            $order->booking_date = $request->input('booking_date');
            $order->booking_firstname = $request->input('booking_firstname');
            $order->booking_lastname = $request->input('booking_lastname');
            $order->booking_state = $request->input('booking_state');
            $order->booking_city = $request->input('booking_city');
            $order->booking_address = $request->input('booking_address');
            $order->booking_phone = $request->input('booking_phone');
            $order->booking_email = $request->input('booking_email');
            $order->booking_zipcode = $request->input('booking_zipcode');
            $order->notes = $request->input('notes');

            $order->grand_total = \Cart::session(auth()->id())->getTotal();
            $order->item_count = \Cart::session(auth()->id())->getContent()->count();

            $order->user_id = auth()->id();

            if(request('payment_method') == 'paypal'){
                $order->payment_method = 'paypal';
            }elseif(request('payment_method') == 'banktransfer'){
                $order->payment_method = 'banktransfer';
            }

            $order->save();

            //save order items

                $cartItems =\Cart::session(auth()->id())->getContent();

                foreach ($cartItems as $item) {
                    $order->items()->attach($item->id, ['price'=>$item->price, 'quantity'=> $item->quantity]);
                }

            //payment
            if(request('payment_method') == 'paypal'){
                    //redirect to paypal
                    return redirect()->route('paypal.checkout', $order->id);
            }elseif(request('payment_method') == 'banktransfer'){
                    //go to midtrans
                    return redirect()->route('midtrans.checkout', $order->id);
            }

            //empty cart
                \Cart::session(auth()->id())->clear();

            //send email to customer
            Mail::to($order->user->email)->send(new OrderCOD($order));

            //send mail to photographer
            $seller = Order::select('*')
                                    ->leftJoin('order_items', 'orders.id', '=', 'order_items.order_id')
                                    ->leftJoin('products', 'products.id', '=', 'order_items.product_id')
                                    ->leftJoin('shops', 'shops.id', '=', 'products.shop_id')
                                    ->where('orders.id', $order->id)->first();

            Mail::to($seller->email)->send(new NewOrderCashOnDelivery($order));

            //take user to thankyou

        return redirect()->route('home')->withMessage('Booking has been placed. Please wait Photographer response.');
        }


    }



    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function accept(Request $request)
    {
        Order::where('order_number','=',$request->order_number)->update([
            'status' => $request->status
        ]);

        $order = Order::select('*')
                    ->leftJoin('order_items', 'orders.id', '=', 'order_items.order_id')
                    ->leftJoin('products', 'order_items.product_id', '=', 'products.id')
                    ->leftJoin('shops', 'shops.id', '=', 'products.shop_id')
                    ->where('orders.order_number', $request->order_number)
                    ->first();

        Mail::to($request->booking_email)->send(new BookingAccepted($order));

        return redirect()->route('orders.project')->withMessage('Booking accepted!');

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function reject(Request $request)
    {
        Order::where('order_number','=',$request->order_number)->update([
            'status' => $request->status,
        ]);

        $order = Order::select('*')
                ->leftJoin('order_items', 'orders.id', '=', 'order_items.order_id')
                ->leftJoin('products', 'order_items.product_id', '=', 'products.id')
                ->leftJoin('shops', 'shops.id', '=', 'products.shop_id')
                ->where('orders.order_number', $request->order_number)
                ->first();

        Mail::to($request->booking_email)->send(new BookingRejected($order));

        return redirect()->route('orders.project')->withError('Booking Rejected!');
    }

        /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function complete(Request $request)
    {
        Order::where('order_number','=',$request->order_number)->update([
            'is_paid' => $request->paid,
        ]);

        $seller = Order::select('*')
                        ->leftJoin('order_items', 'orders.id', '=', 'order_items.order_id')
                        ->leftJoin('products', 'products.id', '=', 'order_items.product_id')
                        ->leftJoin('shops', 'shops.id', '=', 'products.shop_id')
                        ->where('orders.order_number', $request->order_number)->first();


        return redirect()->route('review.product', $request->order_number)->withMessage('Review your booking.');
    }

    /**zzz
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }

}
