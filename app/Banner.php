<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    protected $primaryKey = 'ban_id';

    protected $fillable = [
        'ban_name',
        'ban_image',
    ];
}
