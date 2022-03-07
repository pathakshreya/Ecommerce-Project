<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Order extends Model
{
    use HasFactory;
    protected $table="orders";
    protected $fillable=['first_name','last_name','email','phone','address1','address2','city','state','country','pincode','status','message','tracking_no'];
}
