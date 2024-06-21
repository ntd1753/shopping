<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table = 'categories';
    protected $fillable = ['name', 'slug', 'icon_path', 'parent_id', 'model_type'];
    protected $hidden = ['created_at', 'updated_at'];

    //  Tạo mối quan hệ một nhiều. trả ve danh sách các category con cua 1 category
    public function subCategories(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Category::class, "parent_id",'id');
    }
    public function posts()
    {
        return $this->hasMany(Post::class, "category_id","id");
    }

    public function products()
    {
        return $this->hasMany(Product::class,'category_id','id');
    }

    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }
    // Xoá các category con của một category
    public function deleteChildren(): void{
        foreach ($this->subCategories as $child){
            $child->deleteChildren();
            $child->delete();
        }
    }
    public function getAllChildrenIds(){
        return  $this->subCategories()->pluck('id')->toArray();
    }
    public function productWithSubCategories()
    {
        // Lấy tất cả các ID của category con
        $childCategoryIds = $this->getAllChildrenIds();

        // Thêm ID của category hiện tại vào mảng ID của category con
        $allCategoryIds = array_merge($childCategoryIds, [$this->id]);

        // Trả về quan hệ với sản phẩm thuộc category hiện tại và các category con
        return $this->hasMany(Product::class, 'category_id')
            ->whereIn('category_id', $allCategoryIds)
            ->take(16);
    }


    // Cấu hình boot cho model category
    public static function boot(): void
    {
        // Trước khi xóa 1 category sẽ xóa các category con
        parent::boot();
        static::deleting(function($category){
            $category->deleteChildren();
        });
    }
}
