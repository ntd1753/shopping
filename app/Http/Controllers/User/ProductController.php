<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    private function filterProduct($products,$request):void{
        foreach ($request->query() as $key => $value){
            if($key == 'name') {
                $products->orderby('name', $value);
            }
            if($key == 'price') {
                $products->orderby('price', $value);
            }
        }
        if($request->has('min_price') && $request->has('max_price'))
            $products->whereBetween('price',[(int)$request->min_price,(int)$request->max_price]);
    }
    public function index($slug, Request $request){

            $category=Category::where('slug',$slug)->first();
            if (!$category) return redirect()->back();

            $subCategoryIds= $category->getAllChildrenIds();
            $subCategoryIds[]=$category->id;

            $products= Product::whereIn('category_id',$subCategoryIds);
            $this->filterProduct($products,$request);

        return view('user.content.product.index',
            [
                'products'=>$products->paginate(15),
                'category'=>$category,
                'query'=>$request->query()
            ]);
    }
    public function allProduct(Request $request){
        $products=Product::query();
        $this->filterProduct($products,$request);
        return view('user.content.product.all',
            [
                'products'=>$products->paginate(15),
                'query'=>$request->query()
            ]);
    }
}
