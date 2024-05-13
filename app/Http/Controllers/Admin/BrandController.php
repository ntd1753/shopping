<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BrandController extends Controller
{
    public function index(){
        $brands=DB::table('brands')->paginate(15);
            return view('admin.content.brand.index',['brands'=>$brands]);
    }
    function add(){
        return view('admin.content.brand.add');
    }
    public function store(Request $request){
//         echo "<pre>";
//         print_r($request->all());
//         echo "</pre>";
//         exit();
        $input = $request->all();
        $brand = new Brand();
        $brand["name"] = $input["brand-name"];
        $brand["slug"] = $input["brand-slug"];
        $brand["description"] = $input["description"];
        $brand->save();
        return redirect()->route("admin.brand.index");
    }
    function edit($id){
        $brand=Brand::find($id);
        return view('admin.content.brand.edit',['brand'=>$brand]);
    }
    public function update(Request $request, $id){
        $brand = Brand::find($id);

        if($brand){
            $input = $request->all();
            $brand["name"] = $input["brand-name"];
            $brand["slug"] = $input["brand-slug"];
            $brand["description"] = $input["description"];
            $brand->save();
        }
        return redirect()->route("admin.brand.index");
    }
    public function destroy($id){
        $item = Brand::find($id);
        if($item){
            $item->delete();
        }
        return redirect()->route("admin.brand.index");
    }
}
