<?php

namespace App\Http\Controllers;

use App\Mail\WithdrawRequest;
use App\User;
use App\Order;
use App\WithdrawFunds;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class WithdrawFundsController extends Controller
{
    public function withdraw($order)
    {
        $orders = Order::select('*')
                        ->leftJoin('order_items', 'orders.id', '=', 'order_items.order_id')
                        ->leftJoin('products', 'order_items.product_id', '=', 'products.id')
                        ->leftJoin('shops', 'shops.id', '=', 'products.shop_id')
                        ->where('orders.order_number', $order)
                        ->first();

	    return view('withdraw.funds',['orders' => $orders]);
    }

    public function reqFunds (Request $request)
    {
        $request->validate([
            'bank' => 'required',
            'atas_nama' => 'required',
            'no_rek' => 'required'
        ]);

        $order_id = $request->order_id;
        $dana = $request->dana;
        $bank = $request->bank;
        $atas_nama = $request->atas_nama;
        $no_rek = $request->no_rek;

        $withdrawFunds = new WithdrawFunds();
        $withdrawFunds->order_id = $order_id;
        $withdrawFunds->user_id = auth()->id();
        $withdrawFunds->dana = $dana;
        $withdrawFunds->bank = $bank;
        $withdrawFunds->atas_nama = $atas_nama;
        $withdrawFunds->no_rek = $no_rek;
        $withdrawFunds->is_done = 0;
        $withdrawFunds->save();

        Order::where('id','=',$request->order_id)->update([
            'status' => $request->status,
        ]);

        //send mail to admin

        $admins = User::whereHas('role', function ($q) {
            $q->where('name', 'admin');
        })->get();

        Mail::to($admins)->send(new WithdrawRequest($withdrawFunds));

        return redirect()->route('orders.project')->withMessage('Withdraw request sent! We will sent you an e-mail if done!');
    }
}
