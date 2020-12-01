<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function shop()
    {
        return $this->belongsTo(Shop::class, 'shop_id');
    }

    public function reviews()
    {
        return $this->hasMany(ProductReview::class, 'product_id');
    }

    public function getStarRating()
    {
        $count = $this->reviews()->count();
        if(empty($count)){
            return 0;
        }
        $starCountSum=$this->reviews()->sum('rating');
        $average=$starCountSum/$count;

        return $average;
    }

}
