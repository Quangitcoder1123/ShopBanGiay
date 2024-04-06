<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product;

class proChillImage extends Model
{
    protected $primaryKey = 'chill_id';
    protected $table = 'pro_chill_images';

    protected $fillable = [
        'pro_id',
        'chill_image',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'pro_id');
    }
}
