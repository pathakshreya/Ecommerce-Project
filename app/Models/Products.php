<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class Products extends Model implements HasMedia
{
    use HasFactory, HasMediaTrait;
    protected $table = 'products';
    protected $fillable = [
        'category_id',
        'name',
        'slug',
        'small_description',
        'description',
        'original_price',
        'selling_price',
        'quantity',
        'tax',
        'status',
        'trending',
        'meta_title',
        'meta_keyword',
        'meta_description',
    ];
    
    public function category(){
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
    public function getCoverImageAttribute(){
        return $this->hasMedia('images') ? $this->getMedia('images')[0]->getFullUrl() : '';
    }
}
    
