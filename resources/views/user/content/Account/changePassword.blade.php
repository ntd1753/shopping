@extends('layouts.FrontendLayout')

@section('content')
    <div class="poster bg-[url('https://bizweb.dktcdn.net/100/065/538/themes/838571/assets/bg-breadcrumb.jpg?1708919472176')] py-4 mb-8 min-h-52 flex items-center">
        <section class="w-full">
            <div class="nd-main-title-breadcrumb text-center text-2xl font-bold mb-2">
                <h1>
                    Trang khách hàng
                </h1>
            </div>
            <div class="breadcrumb text-center" itemscope="" >
                <a itemprop="item" href="/" title="Trang chủ">
                    <span itemprop="name">Trang chủ</span>
                </a>
                <span class="px-2">/</span>
                <a itemprop="item" href="#">
                        <span itemprop="name">
                            <strong class="font-bold">
                               Trang khách hàng
                            </strong>
                        </span>
                </a>
            </div>

        </section>
    </div>
    <div class="container mx-auto grid grid-cols-12 gap-6 mb-14">
        <div class="col-span-3">
            <div class="block-account">
                <h5 class="title-account mt-2.5 mb-2 text-xl">TRANG TÀI KHOẢN</h5>
                <p class="font-bold mb-7 ">Xin chào, <span style="">{{Auth::user()->name}}</span>&nbsp;!</p>
                <ul>
                    <li class="mb-2.5">
                        <a disabled="disabled" class="title-info " href="{{route('user.account.index')}}" >Thông tin tài khoản</a>
                    </li>
                    <li class="mb-2.5">
                        <a class="title-info" href="{{route('user.account.order')}}" title="Đơn hàng của bạn">Đơn hàng của bạn</a>
                    </li>
                    <li class="mb-2.5">
                        <a class="title-info text-[#3ba66b]" href="#" title="Đổi mật khẩu">Đổi mật khẩu</a>
                    </li>
                    <li class="mb-2.5">
                        <a href="{{route('auth.logout')}}" class="title-info">Đăng xuất</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-span-9">
            <div class="">
                <h1 class="text-xl mb-2 mt-2.5 text-xl">ĐỔI MẬT KHẨU</h1>
                <div class="form-signup">
                    <p class="mb-3">Để đảm bảo tính bảo mật vui lòng đặt mật khẩu với ít nhất 8 kí tự</p>
                </div>
                <form action="{{route('user.account.changePassword')}}" method="POST">
                        @csrf
                    <div class="mb-4">
                        <label for="current_password" class="block text-gray-700">Mật khẩu hiện tại:</label>
                        <input type="password" class="w-full mt-2 p-2 border border-gray-300 rounded-lg @error('current_password') border-red-500 @enderror" id="current_password" name="current_password" required>
                        @error('current_password')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="new_password" class="block text-gray-700">Mật khẩu mới:</label>
                        <input type="password" class="w-full mt-2 p-2 border border-gray-300 rounded-lg @error('new_password') border-red-500 @enderror" id="new_password" name="new_password" required>
                        @error('new_password')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="new_password_confirmation" class="block text-gray-700">Xác nhận mật khẩu mới:</label>
                        <input type="password" class="w-full mt-2 p-2 border border-gray-300 rounded-lg @error('new_password_confirmation') border-red-500 @enderror" id="new_password_confirmation" name="new_password_confirmation" required>
                        @error('new_password_confirmation')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="">
                        <button type="submit" class="bg-black text-white px-4 py-2 rounded-lg hover:bg-[#3ba66b]">Đổi Mật Khẩu</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection
