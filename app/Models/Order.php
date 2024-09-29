<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function user()
    {
        return $this->hasOne('App\Models\User','id','user_id');
    }

    // A cart belongs to a product
    public function product()
    {
        return $this->hasOne('App\Models\product','id','product_id');
    }
}
