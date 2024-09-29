<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // A cart belongs to a product
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
