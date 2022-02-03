<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;


class Category extends Model implements HasMedia
{

    use HasFactory, HasMediaTrait;
    protected $fillable = ['name','slug','description','status','popular','meta_title','meta_description','meta_keywords'];

    public function product()
    {
        return $this->hasMany(Products::class);
    }

    public function getCoverImageAttribute(){
        return $this->hasMedia('images') ? $this->getMedia('images')[0]->getFullUrl() : '';
    }
}
