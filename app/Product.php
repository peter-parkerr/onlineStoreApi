<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['shopId', 'productName', 'quantity', 'price', 'status'];
}
