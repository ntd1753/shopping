<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    private function getCategories($model_type){
        return Category::where('model_type','=', $model_type)->where('parent_id','=',0)->with('childs')->get();
    }

    public function index($model_type): Factory|View|Application
    {
        return view("admin.content.category.index",[
            "categories" => $this->getCategories($model_type),
            'model_type' => $model_type,
        ]);
    }

}
