<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Shop;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    protected function fillDataToshop($item, $input) : void
    {
        $item["name"] = $input["name"] ?? "";
        $item['image_path']=$input["images"];
        $item['address']=$input["address"];
        $item['phone']=$input['phone'];
        $item['google_map_share_link']=$input['google_map_share_link'];
        $item->save();
    }
    public function index(){
        return view('admin.content.shop.index',
            ['shops'=>Shop::paginate(5)
            ]);
    }
    public function add(){
        return view('admin.content.shop.add');
    }
    public function store(Request $request){
        $input=$request->all();
        $item=new Shop();
        $this->fillDataToShop($item,$input);
        return redirect()->route("admin.shop.index");

    }
    public function edit($id){
        return view('admin.content.shop.edit',['item'=>shop::find($id)]);
    }
    public function update($id,Request $request){
        $input=$request->all();
        $item=Shop::find($id);
        $this->fillDataToShop($item,$input);
        return redirect()->route("admin.shop.index");
    }
    public function destroy($id): \Illuminate\Http\RedirectResponse
    {
        $shop = Shop::find($id);
        if (!$shop) return redirect()->back();
        $shop->delete();
        return redirect()->route("admin.shop.index");
    }
}
