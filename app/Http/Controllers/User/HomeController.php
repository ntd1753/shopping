<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Category;
use App\Models\Image;
use App\Models\Product;
use App\Models\Shop;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    private function getProductsByParentCategory($parentCategoryId)
    {
        // Lấy danh mục cha
        $parentCategory = Category::find($parentCategoryId);

        if (!$parentCategory) {
            return []; // Trả về mảng rỗng nếu không tìm thấy danh mục cha
        }

        // Lấy tất cả các danh mục con
        $childCategoryIds = Category::where('parent_id', $parentCategoryId)->pluck('id')->toArray();
        // Bao gồm cả danh mục cha
        $allCategoryIds = array_merge([$parentCategoryId], $childCategoryIds);

        // Lấy tất cả sản phẩm thuộc các danh mục này
        $products = Product::whereIn('category_id', $allCategoryIds)->get();

        return $products;
    }

    function index(){
        $discountedProducts = Product::where('discount_persent', '>', 0)
            ->whereDate('updated_at', '>=', now()->startOfWeek())
            ->whereDate('updated_at', '<=', now()->endOfWeek())
            ->get();
        $parentCategory=Category::where('parent_id',0)->get();
        $allProduct=[];
        foreach ($parentCategory as $item){
            $products = $this->getProductsByParentCategory($item->id);
        };
        $banners=Banner::where('status','active')->get();
        return view('user.home',['discountedProducts'=>$discountedProducts,'banners'=>$banners]);
    }

    function detailProduct($id){
        $productDetail=Product::find($id);
        if (is_null($productDetail->category->parent)) $relatedProduct=$this->getProductsByParentCategory($productDetail->category_id);
        else $relatedProduct=$this->getProductsByParentCategory($productDetail->category->parent->id);
        return view('user.productDetail',['productDetail'=>$productDetail, 'relatedProduct' => $relatedProduct]);
    }
}
