<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    private function getPostsByParentCategory($parentCategoryId)
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
        $posts = Post::whereIn('category_id', $allCategoryIds)->take(8)->get();

        return $posts;
    }

    function index(){
       $postCategories=Category::where('model_type','post')->pluck('id')->toArray();
       $posts=Post::whereIn('category_id', $postCategories)->paginate(12);
       return view('user.content.post.index',['posts'=>$posts]);
   }
   function detail($id){
       $item=Post::find($id);
       if (is_null($item)) return redirect()->route('user.post.index');
       if($item->category->model_type!='post')return redirect()->route('user.post.index');
       if ($item->category->parent_id==0)  $relatedPost=$this->getPostsByParentCategory($item->category_id);
       else$relatedPost=$this->getPostsByParentCategory($item->category->parent->id);
       //dd($item->content);

       return view('user.content.post.detail',compact('item','relatedPost'));
   }
}
