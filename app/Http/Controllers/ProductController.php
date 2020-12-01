<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use App\ProductReview;
use App\Shop;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categoryId = request('category_id');
        $categoryName = null;

        if($categoryId){
            $category = Category::find($categoryId);
            $categoryName = ucfirst($category->name);

            $products = $category->allProducts();
        }else{
            $products = Product::take()->get();
        }

        return view('product.index', compact('products','categoryName'));

    }

    public function show(Product $product)
    {
        Product::with('shop')->get();

        $reviews = $product->reviews()->paginate(5);

        return view('product.detail', compact('product', 'reviews'));
    }

    public function search(Request $request)
    {
        $cari = $request->input('cari');

        $products = Product::where('nama_jasa','LIKE',"%$cari%")->paginate(12);

        return view('product.catalog', compact('products'));
    }


}
