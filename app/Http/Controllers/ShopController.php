<?php

namespace App\Http\Controllers;

use App\Shop;
use App\User;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ProfileActivationRequest;

class ShopController extends Controller
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $role = auth()->user()->role_id == '3';

        if($role){
            return redirect()->route('home')->withMessage('You are already a Photographer!');
        }else {
            return view('shops.create');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //add validation
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'email' => 'required',
            'contact' => 'required',
            'location' => 'required'
        ]);

        //save db
        $shop = auth()->user()->shop()->create([
            'name'          => $request->input('name'),
            'email'          => $request->input('email'),
            'description'   => $request->input('description'),
            'contact'       => $request->input('contact'),
            'location'       => $request->input('location'),
        ]);

        //send mail to admin

        $admins = User::whereHas('role', function ($q) {
            $q->where('name', 'admin');
        })->get();

        Mail::to($admins)->send(new ProfileActivationRequest($shop));

        return redirect()->route('home')->withMessage('Please wait for admin to activation. Notification will be sent to your email.');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Shop  $shop
     * @return \Illuminate\Http\Response
     */
    public function show(Shop $fotografer)
    {
        Shop::with('owner')->get();

        $review = Shop::select('*')
                        ->leftJoin('products', 'shops.id', '=', 'products.shop_id')
                        ->leftJoin('product_reviews', 'products.id', '=', 'product_reviews.product_id')
                        ->where('shops.id', $fotografer->id)
                        ->get();
        $count = $review->count();
        $starCountSum = $review->sum('rating');
        $average = $starCountSum/$count;

        return view('shops.profile', compact('fotografer', 'average'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Shop  $shop
     * @return \Illuminate\Http\Response
     */
    public function edit(Shop $shop)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Shop  $shop
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Shop $shop)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Shop  $shop
     * @return \Illuminate\Http\Response
     */
    public function destroy(Shop $shop)
    {
        //
    }
}
