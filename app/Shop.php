<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    protected $fillable = ['sellerId', 'shopName', 'shopEmail', 'address', 'ntnNumber', 'description', 'status'];
}
