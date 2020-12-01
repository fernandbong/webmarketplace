<?php

namespace App\Http\Controllers;

use App\Shop;
use App\Order;
use App\ProductReview;
use Illuminate\Http\Request;
use App\Mail\ProjectCompleted;
use Illuminate\Support\Facades\Mail;

class ProductReviewController extends Controller
{

    public function review($order)
    {
        $orders = Order::select('*')
                        ->leftJoin('order_items', 'orders.id', '=', 'order_items.order_id')
                        ->leftJoin('products', 'order_items.product_id', '=', 'products.id')
                        ->leftJoin('shops', 'shops.id', '=', 'products.shop_id')
                        ->where('orders.order_number', $order)
                        ->first();

	    return view('product_review.review',['orders' => $orders]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
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
            'description' => 'required'
        ]);
        auth()->user()->review()->create($request->all());

        Order::where('id', $request->order_id)->update([
            'status' => $request->status,
        ]);

        $order = Order::select('*')
                    ->leftJoin('order_items', 'orders.id', '=', 'order_items.order_id')
                    ->leftJoin('products', 'order_items.product_id', '=', 'products.id')
                    ->leftJoin('shops', 'shops.id', '=', 'products.shop_id')
                    ->where('orders.id', $request->order_id)
                    ->first();


        Mail::to($request->email)->send(new ProjectCompleted($order));

        return redirect()->route('orders.history')->withMessage('Thanks for your review');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ProductReview  $productReview
     * @return \Illuminate\Http\Response
     */
    public function show(ProductReview $productReview)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ProductReview  $productReview
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductReview $productReview)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ProductReview  $productReview
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductReview $productReview)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ProductReview  $productReview
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductReview $productReview)
    {
        //
    }
}
