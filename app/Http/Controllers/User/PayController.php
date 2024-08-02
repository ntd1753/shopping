<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Carbon\Carbon;
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
                return $product->name;
            }
        }

        // Tạo đơn hàng
        $order = Order::create([
            'user_id' => auth()->id(),
            'total' => \Cart::getTotal(),
            'payment_method_id' =>$input['redirect'],
            'note' =>$input['note'],
            'total_amount' => (int)$input['shippingMethod']+(int)\Cart::getTotal(),
            'address' => $input['city'].','.$input['district'].$input['address'],
            'status'=>'đã Thanh toán'
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

         //Xóa giỏ hàng
        \Cart::session(Auth::user()->id)->clear();

        return $order;
    }
    public function createVnPay(Request $request)
    {
        $input=$request->all();
        // Tạo đối tượng Carbon với múi giờ GMT+7
        $now = Carbon::now('Asia/Ho_Chi_Minh');
        // Cộng thêm 10 phút
        $now->addMinutes(10);
        // Định dạng thời gian theo yyyyMMddHHmmss
        $formattedTime = $now->format('YmdHis');
        $order=$this->placeOrder($input);

        if (is_string($order)) {
            return redirect()->route('user.cart.index')->withErrors(['quantity' => 'Sản phẩm ' . $order . ' không đủ số lượng trong kho.']);
        }
            $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
            $vnp_Returnurl = route('home');
            $vnp_TmnCode = "UEUR9Y7Y";//Mã website tại VNPAY
            $vnp_HashSecret = "X0XEET1LEFGJ8VDXA9D3BNRUL8T0UBJ6"; //Chuỗi bí mật

            $vnp_TxnRef = $order->id; //Mã đơn hàng.

            $vnp_OrderInfo = "thanh toán đơn hàng";
            $vnp_OrderType = "billpayment";
            $vnp_Amount = $order->total_amount * 100;
            $vnp_Locale = 'vn';
            $vnp_BankCode = 'NCB';
            $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
            $vnp_ExpireDate = $formattedTime;



        //Add Params of 2.0.1 Version
        $inputData = array(
            "vnp_Version" => "2.1.0",
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => $vnp_OrderType,
            "vnp_ReturnUrl" => $vnp_Returnurl,
            "vnp_TxnRef" => $vnp_TxnRef,
            "vnp_ExpireDate"=>$vnp_ExpireDate,
        );

        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }
        if (isset($vnp_Bill_State) && $vnp_Bill_State != "") {
            $inputData['vnp_Bill_State'] = $vnp_Bill_State;
        }

        //var_dump($inputData);
        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashdata .= urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }

        $vnp_Url = $vnp_Url . "?" . $query;
        if (isset($vnp_HashSecret)) {
            $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret);//
            $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
        }
        $returnData = array('code' => '00'
        , 'message' => 'success'
        , 'data' => $vnp_Url);
            if (isset($request->redirect)) {
                header('Location: ' . $vnp_Url);
                die();
            } else {
                echo json_encode($returnData);
            }
    }
}
