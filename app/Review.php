<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Product;

class Review extends Model
{
    protected $primaryKey = 'rev_id';

    protected $fillable = [
        'user_id',
        'pro_id',
        'comment',
        'rate',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function product()
    {
        return $this->belongsTo(Product::class, 'pro_id');
    }
}
