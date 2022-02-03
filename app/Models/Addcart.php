<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Addcart extends Model
{
    use HasFactory;
    protected $table = "addcarts";
    protected $fillable=['name','product_name','quantity','price','subtotal'];
}
