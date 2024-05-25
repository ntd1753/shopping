<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function  showLoginForm(){
        return view('auth.exlogin');
    }
    public function  showAdminLoginForm(){
        return view('auth.adminLogin');
    }

    public function adminLogin(Request $request){
        if (\Auth::guard('admin')->attempt($request->only(['email','password']), $request->get('remember'))){
            return redirect()->intended('/admin');
        }

        return back()->withInput($request->only('email', 'remember'));
    }

    public  function  login(Request $request){

        if (\Auth::guard('web')->attempt($request->only(['email','password']), $request->get('remember'))){

            return redirect()->intended('/');
        }
        return back()->withInput($request->only('email', 'remember'));

    }
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function handleProviderCallback($provider)
    {
            $socialUser = Socialite::driver($provider)->user();
            //dd(Socialite::driver($provider)->user());
         //Tìm hoặc tạo người dùng mới
        $user = User::firstOrCreate([
            'email' => $socialUser->getEmail(),
        ], [
            'name' => $socialUser->getName(),
            'provider' => 'google',
            'provider_id' => $socialUser->getId(),
            'avatar' => $socialUser->getAvatar(),
            'password' => Hash::make(Str::password(24)),
        ]);

        // Đăng nhập người dùng
        Auth::login($user, true);

        // Script để tắt popup và chuyển hướng
        return "<script>
                window.opener.location.href = '/home';
                window.close();
            </script>";
    }
    function logout()
    {
        Auth::logout();
        redirect();
    }
}
