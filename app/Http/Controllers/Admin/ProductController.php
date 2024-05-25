<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    private function getProductCategories(){
        return Category::where('model_type','=', 'product')->where('parent_id','=',0)->with('subCategories')->get();
    }
    public function index(){

    }
}
