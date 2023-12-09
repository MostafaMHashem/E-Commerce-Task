<?php

namespace App\Models;

use Database\Factories\ProductFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $guarded = [];


    protected static function newFactory(): ProductFactory
    {
        return ProductFactory::new();
    }
    public function carts(){
        return $this->hasMany(Cart::class);
    }

    public function orders(){
        return $this->belongsToMany(Order::class, 'carts', 'product_id', 'order_id');
    }
}
