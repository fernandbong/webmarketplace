<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductReview extends Model
{
    protected $fillable=[
        'description',
        'rating',
        'product_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
