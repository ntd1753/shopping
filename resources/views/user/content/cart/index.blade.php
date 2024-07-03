@extends('layouts.FrontendLayout')
@section('content')
    <div class="poster bg-[url('https://bizweb.dktcdn.net/100/065/538/themes/838571/assets/bg-breadcrumb.jpg?1708919472176')] py-4 mb-8 min-h-52 flex items-center">
        <section class="w-full">
            <div class="nd-main-title-breadcrumb text-center text-2xl font-bold mb-2"><h1>Giỏ hàng</h1> </div>
            <div class="breadcrumb text-center" itemscope="" >
                <a itemprop="item" href="/" title="Trang chủ">
                    <span itemprop="name">Trang chủ</span>
                </a>
                <span class="px-2">/</span>
                <strong itemprop="name"> Giỏ hàng</strong>
            </div>
        </section>
    </div>
    @error('quantity')
    <div class="container mx-auto p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
        {{ $message }}
    </div>
    @enderror
    <div class="p-4 flex container mx-auto ">
        <h1 class="text-xl">
            Giỏ hàng
            <span id="count-cart-product" class="text-base font-normal">
            ({{count($cart)}} sản phẩm)

                </span>
        </h1>
    </div>
    <div id="cart-body" class="container mx-auto py-5 px-2.5">
        @if (count($cart)==0)
            <div class="flex justify-center">
                <div class="col-md-7">
                    <div class="p-2">
                        <img class="h-[250px]" src="{{ asset('frontend/images/shopping-cart-empty.svg') }}" alt="">
                    </div>

                    <div class="btn-cart-empty text-center my-5">
                        <a class="btn bg-[#3ba66b] py-3 px-7 text-white rounded-[4px] text-base" href="{{ route('home') }}" title="Tiếp tục mua hàng">TIẾP TỤC MUA HÀNG</a>
                    </div>

                </div>
            </div>
            @else
                @foreach($cart as $item)
                    <div id="product-{{$item['id']}}" class="grid grid-cols-12 gap-4 py-4 border-2 border-[#ebebeb] border-solid">
                        <div class="col-span-2 img">
                            <a href="{{route('user.product.detail',['id'=>$item['id']])}}">
                                <img src="{{$item['attributes']['image']}}">
                            </a>
                        </div>
                        <div class="col-span-4 h-full flex items-center">
                            <div class="my-auto">
                                <div class="name font-bold hover:text-[#ffb416]">
                                    <a href="{{route('user.product.detail',['id'=>$item['id']])}}">
                                        {{$item['name']}}
                                    </a>
                                </div>
                                <div class="brand text-[#a9a9a9] text-sm ">Thương Hiệu: {{$item['name']}}</div>
                                <div class="delete"><a  class="text-[#3ba66b] hover:text-red-600" onclick="deleteCartItem({{$item['id']}})">Xóa</a></div>
                            </div>
                        </div>
                        <div class="col-span-4 flex items-center">
                            <div class="text-[#FE0000] font-bold"> {{ number_format($item['price'], 0, ',', '.') }}₫</div>
                        </div>
                        <div class="col-span-2 flex items-center">
                            <div class="flex w-10 ">
                                <button type="button" id="decrement-button"
                                        class="text-center text-xl border-solid border-2 border-[#ebebeb] px-2"
                                        onclick="
                                        var result = document.getElementById('product-quantity-{{$item['id']}}');
                                        var product{{$item['id']}} = result.value;
                                        if( !isNaN( product{{$item['id']}} ) && product{{$item['id']}} > 1 ) { result.value--;
                                            updateCart({{$item['id']}})
                                            }
                                        return false">
                                    <i class="fa-solid fa-minus"></i>
                                </button>
                                <input id="product-quantity-{{$item['id']}}" class="text-center max-w-[50px] border-solid border-2 border-[#ebebeb]"
                                    value="{{$item['quantity']}}" required/>
                                <button type="button" id="increment-button"
                                        class="border-solid border-2 border-[#ebebeb] text-center px-2"
                                        onclick="
                                        var result = document.getElementById('product-quantity-{{$item['id']}}');
                                        var product{{$item['id']}} = result.value;
                                        if( !isNaN( product{{$item['id']}} )) {result.value++;  updateCart({{$item['id']}});}
                                        return false"
                                >
                                    <i class="fa-solid fa-plus"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                @endforeach
                <div class="grid    grid-cols-12 gap-4 py-4">
                    <div class="col-span-6">
                        <a href="#" class="hover:text-[#ffb416] font-bold">Tiếp tục mua hàng</a>
                    </div>
                    <div class="col-span-6">
                            <div class="flex justify-between p-1">
                                <div class="col-span-4">Tạm tính: </div>
                                <div id="provisional-price" class="font-bold col-span-2">{{ number_format($totalPrice, 0, ',', '.') }}₫</div>
                            </div>
                            <div class="flex justify-between p-1">
                                <div class="col-span-4"> Thành tiền: </div>
                                <div class="font-bold col-span-2 text-xl text-[#FE0000]" id="total-price">{{ number_format($totalPrice, 0, ',', '.') }}₫</div>
                            </div>
                            <div class="flex justify-end p-1">
                                <div class="col-span-2">
                                    <button class="button bg-black text-white rounded-[10px] p-4 font-bold hover:bg-[#328c5a]"
                                            type="button" onclick="window.location.href='{{route('user.order.index')}}'">Thanh toán ngay</button>
                                </div>

                            </div>
                    </div>
                </div>
        @endif

    </div>
    <script>
        function updateCart(id){
            const quantity = document.getElementById(`product-quantity-${id}`).value;
            $.ajax({
                url: '{{route('user.cart.update')}}',
                type: 'POST',
                data: {
                    _token:`{{csrf_token()}}`,
                    id: id, // Đảm bảo rằng biến này có giá trị hợp lệ
                    quantity: quantity
                },
                success: function(response) {
                    $('#provisional-price').text(response.totalPrice.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".")+`₫`);
                    $('.total-price').text(response.totalPrice.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".")+`₫`);
                },
                error: function(xhr, status, error) {
                    // Xử lý khi có lỗi
                    console.error(error);
                }
            });
        }
    </script>
@endsection
