<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class PayController extends Controller
{
    public function placeOrder($input)
    {

        $cartItems = \Cart::getContent();

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
            'payment_method_id' =>$input['paymentMethod'],
            'note' =>$input['note'],
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

        return $order;
    }
    public function createVnPay(Request $request)
    {
    }
}
