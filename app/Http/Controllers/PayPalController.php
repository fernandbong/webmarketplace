<?php

namespace App\Http\Controllers;

use App\Order;
use App\Mail\NewOrder;
use App\Mail\OrderPaid;
use Illuminate\Http\Request;
use NunoMaduro\Collision\Provider;
use Illuminate\Support\Facades\Mail;
use Srmklive\PayPal\Services\ExpressCheckout;

class PayPalController extends Controller
{

    public function getExpressCheckout($orderId)
    {
        $checkoutData = $this->checkoutData($orderId);

        $provider = new ExpressCheckout();

        $response = $provider->setExpressCheckout($checkoutData);

        return redirect($response['paypal_link']);
    }

    public function checkoutData($orderId){
        $cart = \Cart::session(auth()->id());

        $cartItems = array_map( function($item){
            return [
                'name' => $item['name'],
                'price' => $item['price'],
                'qty' => $item['quantity']
            ];
        }, $cart->getContent()->toarray());


        $checkoutData = [
            'items' => $cartItems,
            'return_url' => route('paypal.success', $orderId),
            'cancel_url' => route('paypal.cancel'),
            'invoice_id' => uniqid(),
            'invoice_description' => " Order description ",
            'total' => $cart->getTotal()
        ];

        return $checkoutData;
    }

    public function cancelPage()
    {
        dd('payment failed');
    }

    public function getExpressCheckoutSuccess(Request $request, $orderId)
    {
        $token = $request->get('token');
        $payerId = $request->get('PayerID');
        $provider = new ExpressCheckout();
        $checkoutData = $this->checkoutData($orderId);

        $response = $provider->getExpressCheckoutDetails($token);

        if (in_array(strtoupper($response['ACK']), ['SUCCESS', 'SUCCESS WITHWARNING'])){

            // Perform transaction on PayPal
            $payment_status = $provider->doExpressCheckoutPayment($checkoutData, $token, $payerId);
            $status = $payment_status['PAYMENTINFO_0_PAYMENTSTATUS'];

            if(in_array($status, ['Completed', 'Processed'])){
                $order = Order::find($orderId);
                $order->is_paid = 1;
                $order->save();

                //send mail to cust
                Mail::to($order->user->email)->send(new OrderPaid($order));

                //send mail to photographer
                $seller = Order::select('*')
                                ->leftJoin('order_items', 'orders.id', '=', 'order_items.order_id')
                                ->leftJoin('products', 'products.id', '=', 'order_items.product_id')
                                ->leftJoin('shops', 'shops.id', '=', 'products.shop_id')
                                ->where('orders.id', $orderId)->first();

                Mail::to($seller->email)->send(new NewOrder($order));

                //empty cart
                \Cart::session(auth()->id())->clear();

                return redirect()->route('home')->withMessage('Payment successful! Booking has been placed. Please wait Photographer response.');
            }


        }

        return redirect()->route('home')->withError('Payment unsuccessful! Something went wrong!');
    }

}
