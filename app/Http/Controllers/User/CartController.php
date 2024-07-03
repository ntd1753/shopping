<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Darryldecode\Cart\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index(){
        $items = \Cart::getContent()->toArray();
        $total=\Cart::getSubTotal();
        return view('user.content.cart.index',["cart"=>$items,'totalPrice'=>$total]);
    }
    public function getCartItems(){
        $items = \Cart::getContent()->toArray();
        $total=\Cart::getSubTotal();
        return response()->json(["cart"=>$items,'totalPrice'=>$total],200);
    }
    public function store(Request $request){
        $input=$request->all();
        $product=Product::find($input['id']);
//       session()->flush();
        \Cart::add(array(
            'id' => $product->id,
            'name' => $product->name,
            'price' => $product->price*(1-$product->discount_persent/100),
            'quantity' => $input['quantity'], // Số lượng sản phẩm, bạn có thể thay đổi tùy ý
            'attributes' => array(
                'barcode' => $product->barcode,
                'brand' => $product->brand->name,
                'image' => $product->images[0]->path

            ),


        ));

        $items = \Cart::getContent()->toArray();
        return response()->json($items,200);
    }
    public function update(Request $request){
        $input=$request->all();
        \Cart::update($input['id'],[
            'quantity' => array(
            'relative' => false,
            'value' => $input['quantity']
        ),
        ]);
        $cart=\Cart::getContent()->toArray();
        $cartTotal=\Cart::getTotal();
        return response()->json(['cart'=>$cart,'totalPrice'=>$cartTotal],200);
    }
    function destroy(Request $request){
        $input=$request->all();
        \Cart::remove($input['id']);
        $cart=\Cart::getContent();
        if (count($cart)>0) {
            $totalPrice=\Cart::getTotal();
            return response()->json(['cart'=>$cart,'totalPrice'=>$totalPrice],200);
        }
        else  return response()->json($cart,200);
    }
    function checkout(Request $request){

    }
}
