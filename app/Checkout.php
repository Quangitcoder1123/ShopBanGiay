<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Order;
use App\Product;

class Checkout extends Model
{
    protected $primaryKey = 'check_id';
    protected $fillable = [
        'order_id',
        'pro_id',
        'quantity',
        'total_price',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'pro_id');
    }

}
