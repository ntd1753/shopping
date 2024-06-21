<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Image;
use App\Models\Post;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    private function getProductCategories(){
        return Category::where('model_type','=', 'product')->where('parent_id','=',0)->with('subCategories')->get();
    }
    protected function type($variable) {
        return is_object($variable) ? get_class($variable) : gettype($variable);
    }
    protected function saveImage($images, $product): void
    {
        if (is_array($images)){
            foreach ($images as $img)
            {
                $image = new Image();
                $image["model_type"] = $this->type($product);
                //dd($this->type($product));
                $image["model_id"] = $product->id;
                $image["path"] = $img;
                $image["name"] = $img;
                $image["alt"] = $img;
                $image->save();
            }
        }
        else{
            $image = new Image();
            $image["model_type"] = $this->type($product);
            $image["model_id"] = $product->id;
            $image["path"] = $images;
            $image["name"] = $images;
            $image["alt"] = $images;
            $image->save();
        }
    }

    protected function fillDataToPost($item, $input, $is_create) : void
    {
        $item["name"] = $input["name"] ?? "";
        $item["slug"] = $input["slug"] ?? Str::slug($item["name"]);
        $item["description"] = $input["description"] ?? "";
        $item["content"] = $input["content"] ?? "";
        $item["seo_title"] = $input["seo_title"] ?? "";
        $item["seo_keywords"] = $input["seo_keywords"] ?? "";
        $item["seo_description"] = $input["seo_description"] ?? "";
        $item["category_id"] = $input["category-id"] ?? null;
        if ($is_create)
        {
            $item["views"] = 0;
            $item["rating_number"] = 0;
            $item["rating_value"] = 0;
        }
        $item->save();


    }
    protected function fillDataToProduct($item, $input): void {
        $item['name'] = $input['product-name'];
        $item["slug"] = Str::slug($item["name"]);
        $item['category_id'] = $input['category-id'];
        $item['brand_id'] = $input['brand-id'];
        $item['barcode'] = $input['barcode'];
        $item['price'] = $input['price'];
        $item['quantity'] = $input['quantity'];
        $item['discount_persent'] = $input['discount_persent'];
        $item['description'] = $input['product-description'];
        $item->save();
    }
    protected function updateImage($image, $item){
        $image["path"] = $image;
        $image["name"] = $image;
        $image["alt"] = $image;
        $image->save();
    }
    public function index(){
        return view("admin.content.product.index",[
            "products"=> Product::paginate(10)
        ]);
    }
    public function add(){
        return view('admin.content.product.add',['categories'=> $this->getProductCategories(), 'brands'=>Brand::all()]);
    }
    public function store(Request $request){
        $input=$request->all();
        $product= new Product();
        $post= new Post();
        $this->fillDataToPost($post,$input,false);
        $product['post_id']=$post['id'];
        $this->fillDataToProduct($product,$input);
        $this->saveImage($input["image"], $product);
        return redirect()->route('admin.product.index');
    }
    public function edit($id){

        return view('admin.content.product.edit',[
            'categories'=> $this->getProductCategories(),
            'product'=> Product::find($id),
            'brands'=>Brand::all()
        ]);
    }
    public function update(Request $request,$id){
        $input=$request->all();
        $product=Product::find($id);
        $post=Post::find($product->post_id);
        Image::where('model_type', Product::class)
            ->where('model_id', $product->id)
            ->delete();
        $this->fillDataToPost($post,$input,false);
        $this->fillDataToProduct($product,$input);
        $this->saveImage($input["image"], $product);

        return redirect()->route('admin.product.index');
    }
    public function destroy($id): RedirectResponse
    {
        $product = Product::find($id);
        if (!$product) return redirect()->back();
        $product->delete();
        return redirect()->route("admin.product.index");
    }
}
