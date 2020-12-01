<?php

namespace App\Http\Controllers;

use App\Order;
use App\Mail\NewOrder;
use App\Mail\OrderPaid;
use Midtrans\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MidtransController extends Controller
{
    public function _generatePaymentToken($orderId)
    {
        $this->initPaymentGateway();

        $order = Order::select('*')->where('id', $orderId)->first();

        $customerDetails = [
            'first_name' => $order->booking_firstname,
            'last_name' => $order->booking_lastname,
            'email' => $order->booking_email,
            'phone' => $order->booking_phone,
        ];

        $params = [
            'enabled_payments' => ['gopay', 'bca_klikbca', 'bca_va', 'bca_klikpay', 'indomaret'],
            'transaction_details' => [
                'order_id' => $order->order_number,
                'gross_amount' => $order->grand_total,
            ],
            'customer_details' => $customerDetails,
            'expiry' => [
                'start_time' => date('Y-m-d H:i:s T'),
				'unit' => 'minutes',
				'duration' => 30,
            ],
        ];

        $snap = \Midtrans\Snap::createTransaction($params);

        if ($snap->token){
            $order->payment_token = $snap->token;
            $order->save();

        }

        //empty cart
        \Cart::session(auth()->id())->clear();

        return redirect($snap->redirect_url);
    }

    public function notification(Request $request)
    {
        // Config Midtrans
        $this->initPaymentGateway();

        // Instance Midtrans Notification
        $notification = new Notification();

        // Assign to Variable
        $transaction = $notification->transaction_status;
        $type = $notification->paymet_type;
        $fraud = $notification->fraud_status;

        if($transaction == 'capture' && $fraud == 'challenge')
            {
                return response()->json([
                    'meta' => [
                        'code' => 200,
                        'message' => 'Midtrans Payment Challenge'
                    ]
                ]);
            }
            else
            {
                return response()->json([
                    'meta' => [
                        'code' => 200,
                        'message' => 'Midtrans payment not settlement'
                    ]
                ]);
            }
            return response()->json([
                'meta' => [
                    'code' => 200,
                    'message' => 'Midtrans notification success'
                ]
            ]);

    }

    public function completed(Request $request)
    {
        $order_number = $request->order_id;

        $order = Order::select('*')->where('order_number', $order_number)->first();

        if($request->transaction_status == 'pending'){
            $order->is_paid = 1;
        }elseif($request->transaction_status == 'settlement'){
            $order->is_paid = 1;
        }

        $order->save();

        //send mail to cust
        Mail::to($order->user->email)->send(new OrderPaid($order));

        //send mail to photographer
        $seller = Order::select('*')
                        ->leftJoin('order_items', 'orders.id', '=', 'order_items.order_id')
                        ->leftJoin('products', 'products.id', '=', 'order_items.product_id')
                        ->leftJoin('shops', 'shops.id', '=', 'products.shop_id')
                        ->where('orders.id', $order->id)->first();

        Mail::to($seller->email)->send(new NewOrder($order));

        return redirect()->route('home')->withMessage('Payment successful! Booking has been placed. Please wait Photographer response.');
    }

    public function failed(Request $request)
    {
        return redirect()->route('home')->withError('Payment unsuccessful! Something went wrong!');
    }

    public function unfinish(Request $request)
    {
        return redirect()->route('home')->withMessage('Payment unfinish!');
    }
}
