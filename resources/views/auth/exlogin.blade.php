@extends('layouts.FrontendLayout')
@section('content')
    <div class="poster bg-[url('https://bizweb.dktcdn.net/100/065/538/themes/838571/assets/bg-breadcrumb.jpg?1708919472176')] py-4 mb-8 min-h-52 flex items-center">
        <section class="w-full">
            <div class="nd-main-title-breadcrumb text-center">Đăng nhập tài khoản</div>
            <div class="breadcrumb text-center" itemscope="" >
                <a itemprop="item" href="#" title="Trang chủ">
                    <span itemprop="name">Trang chủ</span>
                </a>
                <span>/</span>
                <strong itemprop="name">Đăng nhập tài khoản</strong>
            </div>
        </section>

    </div>
    <div class="my-10">
        <div class="hidden">
            <h1 class="title-head">Đăng nhập tài khoản</h1>
        </div>
        <div class="flex items-center m-auto lg:w-2/5">
            <div class="w-full">
                <div class="page-login shadow-lg w-full">
                    <div id="login" class="grid">

                        <div class="col-lg-12 col-md-12 account-content order-lg-last order-md-last order-sm-first order-first ">
                            <div class="grid grid-cols-2 w-full text-center h-12 border-b-[1px]" >
                                <div class="active m-auto w-full grid grid-cols-1 items-center h-full border-r-[1px]">
                                    <div class="m-auto">
                                        <a href="#" title="Đăng nhập" class="font-medium">Đăng nhập</a>
                                    </div>
                                </div>
                                <div class="m-auto">
                                    <a href="/account/register" title="Đăng ký" class="text-[#999]">Đăng ký</a>
                                </div>
                            </div>
                            <div id="nd-login">
                                <form method="POST" action="{{ route('auth.login.store') }}" id="customer_login" class="mt-6 p-5">
                                    @csrf
                                    <div class="form-signup grid grid-cols-1 ">
                                        <div class="w-full my-2.5">
                                            <label class="block my-1.5">Email<span class="required text-red">*</span></label>
                                            <input placeholder="Nhập Địa chỉ Email" type="email" class="form-control w-full valid border-inherit	 @error('email') is-invalid @enderror p-2 rounded" value="{{ old('email') }}" required autocomplete="email" autofocus name="email" id="customer_email">
                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="w-full my-2.5">
                                            <label class="block my-1.5">Mật khẩu<span class="required text-red">*</span></label>
                                            <input placeholder="Nhập Mật khẩu" type="password" class="form-control w-full valid border-inherit	@error('password') is-invalid @enderror p-2 rounded" value="" name="password" id="customer_password" required autocomplete="current-password">
                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="">
                                            <p class="text-left recover">
                                                <a href="#" class="btn-link-style" title="Quên mật khẩu?">Quên mật khẩu?</a>
                                            </p>
                                            <div class="text-center w-full bg-black hover:bg-[#3ba66b] text-base font-bold	text-white rounded">
                                                <button class="btn btn-style btn-blues px-4 py-2 rounded-md" type="submit" value="Đăng nhập">Đăng nhập</button>
                                            </div>
                                        </div>
                                        <div>
                                            <p class="text-sm text-center text-[#999] mt-2.5 ">fruit.vn cam kết bảo mật và sẽ không bao giờ đăng hay <br> chia sẻ thông tin mà chưa có được sự đồng ý của bạn.</p>

                                        </div>
                                    </div>
                                </form>
                                <div class="">
                                    <div class="line-break text-center text-[#999] mb-5">
                                        <span>hoặc đăng nhập qua</span>
                                    </div>
                                    <div class="social-login text-center grid grid-cols-2 gap-x-8 pb-5">
                                        <a class="social-login--facebook grid justify-items-end " onclick="loginFacebook()" >
                                            <img width="129px" height="37px" alt="facebook-login-button" src="//bizweb.dktcdn.net/assets/admin/images/login/fb-btn.svg">
                                        </a>
                                        <a class="social-login--google" href="" onclick="loginGoogle()">
                                            <img width="129px" height="37px" alt="google-login-button" src="//bizweb.dktcdn.net/assets/admin/images/login/gp-btn.svg">
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div id="recover-password" class="form-signup hidden mt-6">
                                <div class="fix-sblock text-center">
                                    Bạn quên mật khẩu? Nhập địa chỉ email để lấy lại mật khẩu qua email.
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        function loginGoogle() {
            var width = 600, height = 400;
            var left = (screen.width - width)/2;
            var top = (screen.height - height)/2;
            var url = '/login/google'; // Đảm bảo URL này trỏ đến route xử lý Socialite::driver('google')->redirect()
            var params = 'width=' + width + ', height=' + height;
            params += ', top=' + top + ', left=' + left;
            params += ', directories=no';
            params += ', location=no';
            params += ', menubar=no';
            params += ', resizable=no';
            params += ', scrollbars=no';
            params += ', status=no';
            params += ', toolbar=no';
            window.open(url, 'Google Login', params);
        }
    </script>

@endsection
