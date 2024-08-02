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
                <span class="px-2">/</span>
                <a itemprop="item" href="#">
                        <span itemprop="name">
                            <strong class="font-bold">
                               Đơn hàng
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
                        <a disabled="disabled" class="title-info" href="{{route('user.account.index')}}" >Thông tin tài khoản</a>
                    </li>
                    <li class="mb-2.5">
                        <a class="title-info  text-[#3ba66b]" href="#" title="Đơn hàng của bạn">Đơn hàng của bạn</a>
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
                <h1 class="text-xl mb-2 mt-2.5 text-xl">ĐƠN HÀNG CỦA BẠN</h1>
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left text-gray-500 ">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Đơn hàng
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Ngày tạo
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Địa chỉ
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Giá trị đơn hàng
                            </th>
                            <th scope="col" class="px-6 py-3">
                                TT thanh toán
                            </th>
                            <th scope="col" class="px-6 py-3">
                                TT vận chuyển
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Chi tiết
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($orders as $item)
                            <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    #{{$item->id}}
                                </th>
                                <td class="px-6 py-4">
                                    {{$item->created_at}}
                                </td>
                                <td class="px-6 py-4">
                                    {{$item->address}}
                                </td>
                                <td class="px-6 py-4">
                                    {{$item->total_amount}}
                                </td>
                                <td class="px-6 py-4">
                                    {{$item->paymentMethod->name}}
                                </td>
                                <td class="px-6 py-4">
                                    {{$item->status}}
                                </td>
                                <td class="px-6 py-4">
                                    <a href="#" data-modal-target="default-modal-{{$item->id}}" data-modal-toggle="default-modal-{{$item->id}}"  class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Xem</a>
                                </td>

                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="flex items-center mt-2.5">{{ $orders->links('vendor.pagination.tailwind') }}
                </div>
            </div>
        </div>
    </div>
    @foreach($orders as $item)
    <div id="default-modal-{{$item->id}}" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-2xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                        Chi tiết đơn hàng
                    </h3>
                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="default-modal-{{$item->id}}">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="p-4">
                    <div id="order-information">
                        <p>Họ và Tên: {{Auth::user()->name}}</p>
                        <p>Địa chỉ: {{$item->address}}</p>
                        <p>Số điện thoại:{{$item->phone_number}}</p>
                        <p class="pb-5">Trạng thái: {{$item->status}}</p>
                        <div class="border-b-2 border-b-gray-200 pb-5"></div>
                        <h3 class="text-xl font-semibold">Sản phẩm</h3>
                        @foreach($item->orderItems as $orderItem)
                            <div id="product" class="grid grid-cols-12 pt-3.5 text-base">
                                <div class="col-span-2 relative">
                                    <img class="w-[50px] h-[50px]"
                                         src="{{$orderItem->product->images[0]->path}}">
                                </div>
                                <div class="col-span-5 pl-3.5 text-black">{{$orderItem->product->name}}</div>
                                <div class="col-span-2 pl-3.5 text-black text-center">x{{$orderItem->quantity}}</div>
                                <div class="col-span-3 pt-3.5 text-base text-[#717171] text-end"> {{ number_format($orderItem->price, 0, ',', '.') }}đ</div>
                            </div>
                        @endforeach
                        <div class="price py-3.5 p-1">
                            <div class="border-b-2 border-b-gray-200 pb-5">
                                <div class="flex justify-between pt-2.5">
                                    <div>Tạm tính:</div>
                                    <div>{{ number_format($item->total, 0, ',', '.') }}đ</div>
                                </div>
                                <div class="flex justify-between pt-2.5">
                                    <div>Phí vận chuyển:</div>
                                    <div>30.000đ</div>
                                </div>
                            </div>
                            <div class="flex justify-between pt-2.5">
                                <div>Tổng cộng:</div>
                                <div class="text-black text-xl font-semibold">{{ number_format($item->total_amount, 0, ',', '.') }}đ</div>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- Modal footer -->
                <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                    <button data-modal-hide="default-modal-{{$item->id}}" type="button" class="text-white bg-black hover:bg-[#3ba66b] focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Đóng</button>
                </div>
            </div>
        </div>
    </div>
    @endforeach
@endsection
