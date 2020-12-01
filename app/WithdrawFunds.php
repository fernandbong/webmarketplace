<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WithdrawFunds extends Model
{
    protected $fillable = ['order_id', 'user_id', 'dana', 'bank', 'atas_nama', 'no_rek'];
}
