<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Product;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->input('query');

        if (isset($query)) {
            // Tìm kiếm sản phẩm theo tên
            $products = Product::where('name', 'LIKE', "%{$query}%")
                ->orWhere('description', 'LIKE', "%{$query}%")
                ->get();
            $countResultProduct=$products->count();
            // Tìm kiếm bài viết theo tên
            $posts = Post::where('name', 'LIKE', "%{$query}%")
                ->orWhere('content', 'LIKE', "%{$query}%")
                ->get();
        } else {
            $products = collect();
            $posts = collect();
            $countResultProduct='';
        }

        return view('user.content.search.index', compact('products', 'posts', 'query', 'countResultProduct'));
    }
}
