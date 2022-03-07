<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    protected $table="order_items";
    protected $fillable=['prod_id','order_id','quantity','price'];
    use HasFactory;
}
