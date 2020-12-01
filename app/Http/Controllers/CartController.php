<?php

namespace App\Http\Controllers;

use App\Coupon;
use App\Order;
use App\Product;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Foreach_;

class CartController extends Controller
{
    public function add(Product $product)
    {
        // add the product to cart
        \Cart::session(auth()->id())->add(array(
            'id' => $product->id,
            'name' => $product->nama_jasa,
            'price' => $product->harga,
            'quantity' => 1,
            'attributes' => array(),
            'associatedModel' => $product
        ));

        return redirect()->route('cart.index');
    }

    public function index()
    {
        $subTotal = \Cart::session(auth()->id())->getSubTotal();
        $cartItems = \Cart::session(auth()->id())->getContent();
        $cartConditions = \Cart::session(auth()->id())->getConditions();


        return view('cart.index', compact('cartItems', 'cartConditions', 'subTotal'));
    }

    public function destroy($itemId)
    {
        \Cart::session(auth()->id())->remove($itemId);
        \Cart::session(auth()->id())->clearCartConditions();

        return back();
    }

    public function update($rowId)
    {
        \Cart::session(auth()->id())->update($rowId, [
            'quantity' => [
                'relative' => false,
                'value' => request('quantity')
            ]
        ]);

        return back();
    }

    public function checkout()
    {
        $subTotal = \Cart::session(auth()->id())->getSubTotal();
        $cartItems = \Cart::session(auth()->id())->getContent();
        $cartConditions = \Cart::session(auth()->id())->getConditions();
        $countitem = \Cart::session(auth()->id())->getContent()->count();

        if($countitem>1){
            return back()->withError('Sorry! Checkout can only be one item');
        }

        return view('cart.checkout', compact('cartItems', 'cartConditions', 'subTotal'));
    }

    public function check( $itemId)
    {
        $fotgraf = Product::with('shop')->where('id', $itemId)->first();
        $checkdate = request('date_check');
        $ordercek = Order::select('*')
                            ->leftJoin('order_items', 'orders.id', '=', 'order_items.order_id')
                            ->leftJoin('products', 'products.id', '=', 'order_items.product_id')
                            ->leftJoin('shops', 'shops.id', '=', 'products.shop_id')
                            ->where('shops.id', $fotgraf->shop->id)
                            ->where('orders.booking_date', $checkdate)
                            ->first();

        if($ordercek){
            return back()->withError('Sorry! On that date someone already booked at the same photographer');
        }elseif($checkdate == null){
            return back()->withError('Please select date!');
        }else{
            return back()->withMessage('Yeay! That date is available, you can proceed to checkout now!');
        }
    }

    public function applyCoupon()
    {
        $couponCode = request('coupon_code');

        $couponData = Coupon::where('code', $couponCode)->first();

        if(!$couponData){
            return back()->withError('Sorry! Coupon does not exist');
        }

        // add single condition on a cart bases
        $condition = new \Darryldecode\Cart\CartCondition(array(
            'name' => $couponData->name,
            'type' => $couponData->type,
            'target' => 'total', // this condition will be applied to cart's subtotal when getSubTotal() is called.
            'value' => $couponData->value,
        ));

        \Cart::session(auth()->Id())->condition($condition); // for a speicifc user's cart

        return back()->withMessage('Coupon Applied');
    }
}
