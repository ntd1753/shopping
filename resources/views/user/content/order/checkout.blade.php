@extends('layouts.FrontendLayout')
@section('content')
    <div class="poster bg-[url('https://bizweb.dktcdn.net/100/065/538/themes/838571/assets/bg-breadcrumb.jpg?1708919472176')] py-4 mb-8 min-h-52 flex items-center">
        <section class="w-full">
            <div class="nd-main-title-breadcrumb text-center text-2xl font-bold mb-2"><h1>Mua hàng thành công</h1> </div>
            <div class="breadcrumb text-center" itemscope="" >
                <a itemprop="item" href="/" title="Trang chủ">
                    <span itemprop="name">Trang chủ</span>
                </a>
                <span class="px-2">/</span>
                <strong itemprop="name">Mua hàng thành công</strong>
            </div>
        </section>
    </div>
    <div id="cart-body" class="container mx-auto py-5 px-2.5">
        <div class="p-4 flex">
            <h1 class="text-xl">
                Mua hàng thành công, kiểm tra chi tiết đơn hàng
                <span id="count-cart-product" class="text-base font-normal">
                <a href="{{route('user.account.order')}}" class="text-base hover:text-blue-700" style=" text-decoration: underline; ">tại đây</a>
                </span>
            </h1>
        </div>
        <div class="flex justify-center">
            <div class="col-md-7">
                <div class="p-2">
                    <img class="h-[250px]" src="/frontend/images/shopping-cart-empty.svg" alt="">
                </div>
                <div class="btn-cart-empty text-center my-5">
                    <a class="btn bg-[#3ba66b] py-3 px-7 text-white rounded-[4px] text-base" href="{{route('home')}}" title="Tiếp tục mua hàng">TIẾP TỤC MUA HÀNG</a>
                </div>
            </div>
        </div>
    </div>
@endsection
