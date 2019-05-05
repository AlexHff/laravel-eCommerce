<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clothing extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'item_id', 'size', 'seller_id', 'video'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'item_id'
    ];
}
