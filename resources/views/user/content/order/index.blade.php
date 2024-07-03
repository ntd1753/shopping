<!DOCTYPE html>
<html lang="en">
@include('partial.user.head')
<body>
<div id="wrap" class="lg:container mx-auto grid grid-cols-12 gap-4">

        <div id="main" class="col-span-8 p-7">
            <div id="logo" class="w-full pb-5">
                    <img class="w-[88px] mx-auto" src="{!! asset('https://bizweb.dktcdn.net/100/065/538/themes/838571/assets/logo.png?1708919610274') !!}">
            </div>
            <div class="grid grid-cols-2 ">
                <div id="delivery-info" class="px-3.5">
                    <div id="delivery-info-header" class="mb-3 font-semibold text-xl">
                        <h2>Thông tin nhận hàng</h2>
                    </div>
                    <form action="{{route('user.order.checkout')}}" method="POST" id="order-form">
                        @csrf
                    <div id="info-fieldset" class="text-base">
                        <div class="p-1.5">
                            <label for="email" class="text-gray-600 mb-1">Email</label>
                            <input
                                type="email"
                                id="email"
                                class="w-full p-1.5 bg-gray-300 rounded-[4px] text-gray-800
                                focus:outline-none focus:ring-2 focus:ring-gray-500"
                                value="{{Auth::user()->email}}"
                                readonly
                            />
                        </div>
                        <!-- Name -->
                        <div class="p-1.5">
                                <label for="name" class="block text-gray-600 mb-1">Họ và tên</label>
                                <input
                                    type="text"
                                    id="name"
                                    class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-gray-500"
                                    placeholder="Họ và tên"
                                    value="{{Auth::user()->name}}" required
                                />
                            </div>
                        <!-- Phone -->
                        <div class="p-1.5">
                                <label for="phone" class="block text-gray-600 mb-1">Số điện thoại</label>
                                <div class="flex">
                                    <input
                                        type="tel"
                                        id="phone"
                                        class="w-full p-2 border border-gray-300 rounded-l focus:outline-none focus:ring-2 focus:ring-gray-500"
                                        placeholder="Số điện thoại" required
                                    />
                                    <span class="inline-flex items-center px-3 border-t border-r border-b border-gray-300 rounded-r bg-gray-50 text-gray-500">
                            <img src="https://upload.wikimedia.org/wikipedia/commons/2/21/Flag_of_Vietnam.svg" alt="Vietnam Flag" class="h-4 w-6">
                        </span>
                                </div>
                            </div>
                        <!-- Address -->
                        <div class="p-1.5">
                                <label for="address" class="block text-gray-600 mb-1">Địa chỉ</label>
                                <input
                                    type="text"
                                    id="address"
                                    name="address"
                                    class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-gray-500"
                                    placeholder="Địa chỉ" required
                                />
                            </div>
                        <!-- City -->
                        <div class="p-1.5">
                                <label for="city" class="block text-gray-600 mb-1">Tỉnh thành</label>
                                <select
                                    id="provinces-list"
                                    class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-gray-500"
                                    name="city"
                                >
                                    <option selected>Chọn tỉnh thành</option>
                                    <!-- Add more options as needed -->
                                </select>
                            </div>
                        <!-- District -->
                        <div class="p-1.5">
                                <label for="district" class="block text-gray-600 mb-1">Quận huyện</label>
                                <select
                                    id="districts-list"
                                    class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-gray-500"
                                    name="district"
                                >
                                    <option selected>Chọn quận huyện</option>
                                    <!-- Add more options as needed -->
                                </select>
                            </div>
                        <!-- Notes -->
                        <div class="p-1.5">
                                <label for="notes" class="block text-gray-600 mb-1">Ghi chú (tùy chọn)</label>
                                <textarea
                                    id="notes"
                                    class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-gray-500"
                                    placeholder="Ghi chú (tùy chọn)"
                                    name="note"
                                ></textarea>
                            </div>
                    </div>
                </div>
                <div id="ship-info" class="px-3.5">
                    <div id="ship-info-header" class="mb-3 font-semibold text-xl">
                        <h2>Thông tin vận chuyển</h2>
                    </div>
                    <div class="p-1.5 mt-8">
                        <div class="p-2 flex justify-between border   border-gray-300 rounded">
                            <div id="radio">
                                <input type="radio"
                                       class="input-radio text-black"
                                       name="shippingMethod"
                                       value="30000" checked>
                                <label>
                                    Giao Hàng Tận Nơi
                                </label>
                            </div>
                            <div id="ship-price">
                                30.000 VNĐ
                            </div>
                        </div>

                    </div>
                    <div id="payment-method-header" class="mb-3 font-semibold text-xl pt-7">
                        <h2>Thanh toán</h2>
                    </div>
                    <div class="p-1.5 mt-8 border   border-gray-300 rounded">
                        @foreach($paymentMethod as $item)
                            <div class="p-2 flex justify-between ">
                                <div id="radio">
                                    <input type="radio" id="{{$item->info}}"
                                           class="input-radio text-black"
                                           name="paymentMethod"
                                           value="{{$item->id}}" required>
                                    <label>
                                        {{$item->name}}
                                    </label>
                                </div>
                                <div id="payment-icon">
                                    <i class="fa-solid fa-money-bill"></i>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="flex justify-end gap-4 py-3.5 border-t-2 border-gray-200">
                <div><button data-modal-target="default-modal" data-modal-toggle="default-modal">
                        Chinh sách hoàn trả
                    </button>
                </div>
                <div>
                    <button data-modal-target="default-modal" data-modal-toggle="default-modal">
                        Chính sách bảo mật
                    </button>
                    </div>
                <div>
                    <button data-modal-target="default-modal" data-modal-toggle="default-modal">
                        Điều khoản sử dụng
                    </button>

                </div>
            </div>

        </div>
        <div id="check-out-side-bar" class="col-span-4 bg-[#fafafa]">
            <div id="side-bar-header" class="text-xl font-semibold py-5 pl-7 border-b-2 border-b-gray-200" >
                <h2>Đơn Hàng(1 Sản phẩm)</h2>
            </div>
            <div id="side-bar-content" class="pl-7 text-[#717171]">
                <div class="max-h-[280px] overflow-y-auto  border-b-2 border-x-gray-200 py-3.5">
                    @foreach($cart as $item)
                        <div id="product" class="grid grid-cols-12 pt-3.5 text-base">
                            <div class="col-span-2 relative">
                                <img class="w-[50px] h-[50px]"
                                     src="{{$item->attributes->image}}">
                                <span id="product-quantity" class="absolute top-0 right-0 rounded-[21px] bg-black text-white font-semibold  text-center text-[10px] w-5 h-5">
                                    {{$item->quantity}}
                                </span>
                            </div>
                            <div class="col-span-7 pl-3.5 text-black">{{$item->name}}</div>
                            <div class="col-span-3 pt-3.5 text-sm text-[#717171]"> {{ number_format($item->price, 0, ',', '.') }}đ</div>
                        </div>

                    @endforeach
                </div>
                <div class="code-discount py-3.5 grid grid-cols-12 gap-4 p-1 border-b-2 border-b-gray-200">
                    <div class="col-span-8">
                        <input name="reductionCode"
                               id="reductionCode"
                               type="text"
                               class="w-full rounded-[4px] text-gray-800
                                focus:outline-none focus:ring-2 focus:ring-gray-500"
                               placeholder="Mã giảm giá"
                               >
                    </div>
                    <div class="col-span-4">
                        <button class="w-full h-full p-2.5 rounded-[5px] bg-[#646464] text-white"> Áp dụng</button>
                    </div>
                </div>
                <div class="price py-3.5 p-1">
                    <div class="border-b-2 border-b-gray-200 pb-5 ">
                        <div class="flex justify-between pt-2.5">
                            <div>Tạm tính:</div>
                            <div>{{ number_format($productTotalPrice, 0, ',', '.') }}đ</div>
                        </div>
                        <div class="flex justify-between pt-2.5">
                            <div>Phí vận chuyển:</div>
                            <div>30.000đ</div>
                        </div>
                    </div>
                    <div class="flex justify-between pt-2.5">
                        <div>Tổng cộng:</div>
                        <div class="text-black text-xl font-semibold">{{ number_format($productTotalPrice+30000, 0, ',', '.') }}đ</div>
                    </div>
                    <div class="flex justify-between pt-2.5">
                        <div class='py-2.5'><a href="{{route('user.cart.index')}}"><span><i class="fa-solid fa-chevron-left"></i></span> Quay về giỏ hàng</a></div>
                        <div class="">
                            <button type="submit" id="order-button" class="w-full h-full p-2.5 px-5 rounded-[5px] bg-black text-white">Đặt hàng</button>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </form>
</div>
<script>
    // Lấy API tỉnh thành VN
    $(document).ready(function() {
        //Lấy tỉnh thành
        $.getJSON('https://esgoo.net/api-tinhthanh/1/0.htm',function(data_tinh){
            if(data_tinh.error==0){
                $.each(data_tinh.data, function (key_tinh,val_tinh) {
                    $("#provinces-list").append('<option value="'+val_tinh.id+'">'+val_tinh.full_name+'</option>');
                });
                $("#provinces-list").change(function(e){
                    var idtinh=$(this).val();
                    //Lấy quận huyện
                    $.getJSON('https://esgoo.net/api-tinhthanh/2/'+idtinh+'.htm',function(data_quan){
                        if(data_quan.error==0){
                            $("#districts-list").html('<option value="0">Quận Huyện</option>');

                            $.each(data_quan.data, function (key_quan,val_quan) {
                                $("#districts-list").append('<option value="'+val_quan.id+'">'+val_quan.full_name+'</option>');
                            });
                            //Lấy phường xã

                        }
                    });
                });

            }
        });
    });

</script>
{{--<script>--}}
{{--    // Lấy ra các đối tượng input radio và form--}}
{{--    const radioCOD = document.getElementById('COD');--}}
{{--    const radioVNPAY = document.getElementById('VNPAY');--}}
{{--    const form = document.getElementById('order-form'); // Thay 'yourFormId' bằng ID của form thực tế của bạn--}}

{{--    // Thêm sự kiện onchange vào các input radio--}}
{{--    radioCOD.addEventListener('change', function() {--}}
{{--        form.action = '{{route('user.order.checkout')}}'; // Đổi action của form khi chọn COD--}}
{{--    });--}}

{{--    radioVNPAY.addEventListener('change', function() {--}}
{{--        form.action = '{{route('user.payment.vnpay')}}'; // Đổi action của form khi chọn VNPAY--}}
{{--    });--}}
{{--</script>--}}
</body>
</html>
