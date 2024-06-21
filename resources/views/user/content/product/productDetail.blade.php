@extends('layouts.FrontendLayout')

@section('content')
    <div class="poster bg-[url('https://bizweb.dktcdn.net/100/065/538/themes/838571/assets/bg-breadcrumb.jpg?1708919472176')] py-4 mb-8 min-h-52 flex items-center">
        <section class="w-full">
            <div class="nd-main-title-breadcrumb text-center text-2xl font-bold mb-2"><h1>{{$productDetail->name}}</h1> </div>
            <div class="breadcrumb text-center" itemscope="" >
                <a itemprop="item" href="/" title="Trang chủ">
                    <span itemprop="name">Trang chủ</span>
                </a>
                @if(isset($productDetail->category->parent->name))
                    <span class="px-2">/</span>
                    <a itemprop="item" href="#">
                        <span itemprop="name">{{$productDetail->category->parent->name}}</span>
                    </a>
                @endif

                <span class="px-2">/</span>
                <strong itemprop="name">{{$productDetail->category->name}}</strong>
            </div>
        </section>
    </div>
    <div class="container mx-auto">
        <div class="grid grid-cols-12 gap-2">
            <div class="col-span-5">
                <div class="box-border grid grid-cols-3">
                    <div class="col-span-1 my-auto " style="width:350px;">
                        <swiper-container class="mySwiper2 box-border rotate-90"  space-between="20" slides-per-view="4" navigation="true" free-mode="true"
                                          watch-slides-progress="true">
                            @foreach($productDetail->images as $img)
                                <swiper-slide class="rotate-180 mx-auto ">
                                    <img class="rotate-90" src="{{$img->path}}" style="width: 73px; height: 97px;" />
                                </swiper-slide>
                            @endforeach

                        </swiper-container>
                        </swiper-container>
                    </div>
                    <div class="col-span-2 ml-14 my-auto relative">
                        <swiper-container style="--swiper-navigation-color: #fff; --swiper-pagination-color: #fff " class="mySwiper my-auto box-border"
                                          thumbs-swiper=".mySwiper2" space-between="10">
                            @foreach($productDetail->images as $img)
                                <swiper-slide class="my-auto">
                                    <img class="" src="{{$img->path}}" style="width: 100%;"/>
                                </swiper-slide>
                            @endforeach


                        </swiper-container>
                        <div class=" absolute top-0 right-0  z-10   text-center text-2xl " style="">
                            <button type="button" class="text-white bg-[#fe0000]
                                                            hover:bg-[#ffb416]
                                                            focus:ring-4 focus:outline-none focus:ring-blue-300
                                                            font-medium rounded-full text-xl p-2.5 text-center inline-flex items-center">
                                <i class="fa-regular fa-heart"></i>
                            </button>
                        </div>
                    </div>


                </div>
            </div>
            <div class="col-span-4 px-6">
                <h1 class="title-head text-2xl font-medium">{{$productDetail->name}}</h1>
                <div class="sku-product clearfix">
                    <span class="variant-sku" itemprop="sku" content="Đang cập nhật">SKU: <strong>(Đang cập nhật...)</strong></span>
                </div>
                <div class="price-box clearfix text-xl mb-2 mt-4">
						<span class="special-price text-3xl font-medium text-red-500">
							<span class="price product-price">
                                {{ number_format($productDetail->price*(1-$productDetail->discount_persent*0.01), 0, ',', '.') }} ₫
                            </span>
						</span>

                    @if($productDetail->discount_persent>0)
                        <span class="old-price" itemprop="priceSpecification" itemscope="" itemtype="http://schema.org/priceSpecification">
							<del class="price product-price-old">
                                {{ number_format($productDetail->price, 0, ',', '.') }}₫
							</del>
						</span>
                        <div class="save-price my-2"> Tiết kiệm:
                            <span class="price product-price-save">{{number_format($productDetail->price*$productDetail->discount_persent*0.01, 0, ',', '.')}}đ</span>
                        </div>
                    @endif


                </div>
                <form>
                    <div class="form-groups clearfix text-xl">
                        <div class="qty-nd clearfix custom-btn-number ">
                            <label class="font-medium">Số lượng:</label>
                            <div class="form-control">
                                <div class="custom custom-btn-numbers flex">
                                    <div class="relative flex items-center max-w-[9rem] rounded-[50px]">
                                        <button type="button" id="decrement-button" data-input-counter-decrement="quantity-input"
                                                class="rounded-l-full  border border-y-gray-300 p-3 h-11">
                                            <svg class="w-3 h-3  dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 2">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h16"/>
                                            </svg>
                                        </button>
                                        <input type="text" id="quantity-input" data-input-counter aria-describedby="helper-text-explanation"
                                               class="border-x-0 border-gray-300 h-11
                                           text-center text-gray-900 text-xl
                                           focus:ring-blue-500 focus:border-blue-500
                                           block w-full py-2.5 " value="1" placeholder="1" required/>
                                        <button type="button" id="increment-button" data-input-counter-increment="quantity-input" class="rounded-r-full  border border-y-gray-300 p-3 h-11">
                                            <svg class="w-3 h-3 text-gray-900" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16"/>
                                            </svg>
                                        </button>
                                    </div>
                                    <div class="btn-buy px-2">
                                        <button type="button"
                                                class="text-white bg-[#fe0000] font-bold
                                                 hover:bg-[#ffb416]  rounded-full text-xl
                                                 px-5 py-2.5 text-center me-2 mb-2">
                                            Mua ngay
                                        </button>
                                    </div>
                                </div>
                                <div class="btn-add-to-cart w-full mt-2">
                                    <button type="button" id="button-add-cart"
                                            class="text-white font-bold bg-[#3ba66b]
                                            hover:bg-[#ffb416] rounded-full text-xl px-5
                                            py-2.5 text-center me-2 mb-2">
                                        Thêm vào giỏ hàng
                                    </button>
                                </div>
                            </div>

                        </div>



                    </div>
                </form>

            </div>
            <div class="col-span-3 ">
                <div class="service_product text-xl p-4 border border-[#3ba66b] rounded-[20px]">
                    <div class="item text-center mb-4">
                        <div class="icon ">
                            <img src="//bizweb.dktcdn.net/100/065/538/themes/838571/assets/service_1.png?1708919610274" alt="100% tự nhiên" class="img-responsive mx-auto">
                        </div>
                        <div class="info mt-1.5">
                            100% tự nhiên
                        </div>
                    </div>
                    <div class="item text-center mb-4">
                        <div class="icon">
                            <img src="//bizweb.dktcdn.net/100/065/538/themes/838571/assets/service_2.png?1708919610274" alt="Chứng nhận ATTP" class="mx-auto img-responsive">
                        </div>
                        <div class="info mt-1.5">
                            Chứng nhận ATTP
                        </div>
                    </div>
                    <div class="item text-center mb-4">
                        <div class="icon">
                            <img src="//bizweb.dktcdn.net/100/065/538/themes/838571/assets/service_3.png?1708919610274" alt="Luôn luôn tươi mới" class="mx-auto img-responsive">
                        </div>
                        <div class="info mt-1.5">
                            Luôn luôn tươi mới
                        </div>
                    </div>
                    <div class="item text-center mb-4">
                        <div class="icon">
                            <img src="//bizweb.dktcdn.net/100/065/538/themes/838571/assets/service_4.png?1708919610274" alt="An toàn cho sức khoẻ" class="mx-auto img-responsive">
                        </div>
                        <div class="info mt-1.5">
                            An toàn cho sức khoẻ
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="product-post">
            <div class="nav nav-tabs p-3" id="myTab" role="tablist">
                <li class="nav-item text-center text-2xl text-white " role="presentation">
                    <a class="nav-link active bg-[#ffb416] rounded-t-[17px] p-3.5 text-base font-medium" id="home-tab" href="#" role="tab">
                        THÔNG TIN SẢN PHẨM
                    </a>
                </li>
            </div>
            <div class="border border-[#e8e8e8]">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    {!! $productDetail->post->content !!}
                </div>
            </div>
        </div>
        <div id="related-products" class="mt-8 mb-14">
            <div class="block-title text-center w-full mb-5">
                <h2 class="text-4xl	font-bold text-[#3e4a5e]">Sản phẩm liên quan</h2>
                <div class="mx-auto mt-3"><img src="{{asset('frontend/images/bg-title-after.webp')}}" class="mx-auto"></div>
                <div class="mt-4">
                    <swiper-container class="mySwiper" slides-per-view="4" navigation="true">
                       @foreach($relatedProduct as $item)
                            <swiper-slide class="sale-product-week-info border rounded-[20px] mr-5	">
                                @include('component.product.productCard',['$item'=>$item])
                            </swiper-slide>
                       @endforeach
                    </swiper-container>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        function hoverProductCard(id){

            document.getElementById(`product-${id}-action`).classList.remove('hidden');
            document.getElementById(`product-${id}-action`).classList.add('translate-y-0');
        }
        function mouseOutProductCard(id){
            document.getElementById(`product-${id}-action`).classList.remove('translate-y-0');
            document.getElementById(`product-${id}-action`).classList.add('hidden');
        }
        document.getElementById('button-add-cart').addEventListener('click', function () {
            const quantity = document.getElementById('quantity-input').value;
            console.log(document.getElementById('quantity-input').value);
            $.ajax({
                url: '{{route('user.cart.store')}}', // Đảm bảo rằng route này được định nghĩa đúng trong Laravel
                type: 'POST',
                data: {
                    _token:`{{csrf_token()}}`,
                    id: {{$productDetail->id}}, // Đảm bảo rằng biến này có giá trị hợp lệ
                    quantity: quantity
                },
                success: function(response) {
                    // Xử lý khi gửi thành công
                    console.log(response);
                },
                error: function(xhr, status, error) {
                    // Xử lý khi có lỗi
                    console.error(error);
                }
            });
        });

    </script>
@endsection
