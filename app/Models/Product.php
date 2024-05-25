<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table ="products";
    protected $fillable = [
        'category_id',
        'barcode',
        'name',
        'slug',
        'description',
        'quantity',
        'price',
        'discount_persent',
        'brand_id',
        'post_id',
        'views',
        'rating_number',
        'rating_value',
    ];
    protected $with=['category', 'brand', 'posts', 'images'];
    public function category()
    {
        return $this->hasOne(Category::class,'id','category_id');
    }

    public function brand()
    {
        return $this->hasOne(Brand::class,'id','brand_id');
    }

    public function posts()
    {
        return $this->belongsTo(Post::class,'post_id','id');
    }
    public function images()
    {
        return $this->hasMany(Image::class, 'model_id','id')
            ->where('model_type', self::class);
    }
}
