<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{
    function index(){
        return view('user.content.account.index');
    }
    function orderList(){
        return view('user.content.account.order', [
            'orders' => Order::where('user_id', Auth::user()->id)
                ->orderBy('created_at', 'DESC')
                ->paginate(5),
        ]);
    }

    function showFormChangePassword()
    {
        return view('user.content.account.changePassword');
    }
    public function changePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|string|min:8|confirmed',
        ]);

        $user = Auth::user();

        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'Mật khẩu hiện tại không đúng.']);
        }

        $user->password = Hash::make($request->new_password);
        $user->save();

        return redirect()->route('home')->with('success', 'Mật khẩu đã được thay đổi thành công.');
    }
}
