<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;


class Addcart extends Model implements HasMedia
{
    use HasFactory, HasMediaTrait;
    protected $table = "addcarts";
    protected $fillable=['user_id','name','product_name','quantity','price','subtotal'];

    
    public function getCoverImageAttribute(){
        return $this->hasMedia('images') ? $this->getMedia('images')[0]->getFullUrl() : '';
    }

    public function product(){
        return $this->belongsTo(Products::class);
    }
}
