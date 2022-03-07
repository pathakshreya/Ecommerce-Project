<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class Wishlist extends Model implements HasMedia
{
    use HasFactory, HasMediaTrait;
    protected $table="wishlists";
    protected $fillable = ['user_id','prod_id'];

    public function getCoverImageAttribute(){
        return $this->hasMedia('images') ? $this->getMedia('images')[0]->getFullUrl() : '';
    }
   
}
