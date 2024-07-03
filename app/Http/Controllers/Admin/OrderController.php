<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{

    function index(Request $request){
        $order=Order::all();

        if ($request->has('status')){
            if ($request->status=='giao hang thanh cong'){
                $order=$order->where('status','giao hàng thành công');
            }
            if ($request->status=='dang giao hang'){
                $order=$order->where('status','đang giao hàng');
            }
            if ($request->status=='da dat hang'){
                $order=$order->where('status','đã đặt hàng');
            }
        }
        return view('admin.content.order.index',['order'=>$order,'query'=>$request->query()]);
    }
    function detail($id){
        $item=Order::find($id);
        return view('admin.content.order.detail',compact('item'));
    }
}
