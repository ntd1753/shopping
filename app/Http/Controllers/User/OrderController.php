<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\PaymentMethod;
use App\Models\Product;
use Darryldecode\Cart\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class OrderController extends Controller
{
    public function index()
    {
        $cartItems = \Cart::getContent();
        foreach ($cartItems as $item) {
            $product = Product::find($item->id);
            if ($product->quantity < $item->quantity) {
                return redirect()->route('user.cart.index')->withErrors(['quantity' => 'Sản phẩm ' . $product->name . ' không đủ số lượng trong kho.']);
            }
        }
        $productTotalPrice= \Cart::getSubTotal();
        $paymentMethod=PaymentMethod::all();
        return view('user.content.order.index',
            [
                'cart'=>$cartItems,
                'productTotalPrice'=>$productTotalPrice,
                'paymentMethod'=>$paymentMethod
            ]);
    }
    public function placeOrder(Request $request)
    {
        $input=$request->all();
        $cartItems = \Cart::getContent();
        //dd($input);
        foreach ($cartItems as $item) {
            $product = Product::find($item->id);
            if ($product->quantity < $item->quantity) {
                return redirect()->route('user.cart.index')->withErrors(['quantity' => 'Sản phẩm ' . $product->name . ' không đủ số lượng trong kho.']);
            }
        }

        // Tạo đơn hàng
        $order = Order::create([
            'user_id' => auth()->id(),
            'total' => \Cart::getTotal(),
            'payment_method_id' =>$input['redirect'],
            'note' =>$input['note'],
            'phone_number'=>$input['phone_number'],
            'total_amount' => (int)$input['shippingMethod']+(int)\Cart::getTotal(),
            'address' => $input['city'].','.$input['district'].$input['address'],
            'status'=>'đã đặt hàng'
        ]);

        // Lưu chi tiết đơn hàng và cập nhật kho
        foreach ($cartItems as $item) {
            $product = Product::find($item->id);
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $item->id,
                'quantity' => $item->quantity,
                'price' => $item->price,
            ]);
            // Cập nhật số lượng tồn kho
            $product->quantity -= $item->quantity;
            $product->save();
        }

        // Xóa giỏ hàng
        \Cart::session(Auth::user()->id)->clear();

        return redirect()->route('checkout',['id'=>$order->id])->with('success', 'Đặt hàng thành công!');
    }
    public function checkOutConfirm($id){
        return view('user.content.order.checkout');
    }
}
