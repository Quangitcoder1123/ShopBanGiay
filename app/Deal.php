<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Deal extends Model
{
    protected $primarykey = "id";

    protected $fillable = [
        'deal_image',
    ];
}
