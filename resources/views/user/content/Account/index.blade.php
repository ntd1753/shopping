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
    <div class="container mx-auto grid grid-cols-12 gap-6">
        <div class="col-span-3">
            <div class="block-account">
                <h5 class="title-account mt-2.5 mb-2 text-xl">TRANG TÀI KHOẢN</h5>
                <p class="font-bold mb-7 ">Xin chào, <span style="">{{Auth::user()->name}}</span>&nbsp;!</p>
                <ul>
                    <li class="mb-2.5">
                        <a disabled="disabled" class="title-info text-[#3ba66b]" href="#" >Thông tin tài khoản</a>
                    </li>
                    <li class="mb-2.5">
                        <a class="title-info" href="{{route('user.account.order')}}" title="Đơn hàng của bạn">Đơn hàng của bạn</a>
                    </li>
                    <li class="mb-2.5">
                        <a class="title-info" href="{{route('user.account.formPassword')}}" title="Đổi mật khẩu">Đổi mật khẩu</a>
                    </li>
                    <li class="mb-2.5">
                        <a href="{{route('auth.logout')}}" class="title-info">Đăng xuất</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-span-9">
            <div class="">
                <h1 class="text-xl mb-2 mt-2.5 text-xl">THÔNG TIN TÀI KHOẢN</h1>
                <div class="form-signup name-account m992">
                    <p class="mb-3"><strong>Họ tên:</strong>  {{Auth::user()->name}}</p>
                    <p class="mb-3"> <strong>Email:</strong> {{Auth::user()->email}}</p>
                </div>


            </div>
        </div>
    </div>
@endsection
