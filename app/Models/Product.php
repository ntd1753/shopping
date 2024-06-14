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
    protected $with=['category', 'brand', 'post', 'images'];
    public function category()
    {
        return $this->hasOne(Category::class,'id','category_id');
    }

    public function brand()
    {
        return $this->hasOne(Brand::class,'id','brand_id');
    }

    public function post()
    {
        return $this->hasOne(Post::class,'id','post_id');
    }
    public function images()
    {
        return $this->hasMany(Image::class, 'model_id','id')
            ->where('model_type', self::class);
    }
    public function deleteImages()
    {
        $images = Image::where('model_type', self::class)->where('model_id', $this->id)->get();
        foreach ($images as $image) {
            $image->delete();
        }
    }

    public static function boot(): void
    {
        // Trước khi xóa 1 post sẽ xóa các images, comments
        parent::boot();
        static::deleting(function($product){
            $product->deleteImages();
            $product->post()->delete();
        });
    }
}
