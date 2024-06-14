@extends('layouts.FrontendLayout')

@section('content')
    <div class="content-page ">
        <div class="poster">
            <swiper-container class="mySwiper" pagination="true">
                @foreach($banners as $item)
                    <swiper-slide>
                        <img src="{{$item->image_path}}"
                             alt="Slide 1">
                    </swiper-slide>
                @endforeach
            </swiper-container>
        </div>
        <div class="container mx-auto">
            <div class="poster mx-auto ">
                <swiper-container class="mySwiper" slides-per-view="4" grab-cursor="true">
                    @foreach($shops as $item)
                        <swiper-slide>
                            <div class="brand-store p-0 px-3 pb-2 w-4/5 mt-[60px]  grid items-center rounded-[10px]"
                                 style="box-shadow: 0px 9px 15px 0px rgba(0,0,0,0.05);;">
                                <a class="image min-h-80 object-cover m-auto rounded-[5px]" href="#">
                                    <img class="image_cate_thumb" width="241" height="220" style="height: 338px;"
                                         src="{{$item->image_path}}"
                                         alt="{{$item->name}}">
                                </a>
                                <h3 class="px-2.5 text-base	my-3 mx-0 mb-2 font-bold">
                                    <a href="#" title="Hala fruit 24B7 Phạm Ngọc Thạch">{{$item->name}}</a>
                                </h3>
                            </div>
                        </swiper-slide>
                    @endforeach
                </swiper-container>
            </div>
            <div id="sale-on-week mb-5" class="lg:w-11/12 mx-auto z-0 mt-20  mb-14">
                <div class="w-full border-2 border-red-600 rounded-[32px] px-6 pt-14 pb-2 relative">
                    <h2 class="w-full grid item-center absolute top-0 block z-10 ">
                        <a href="#"
                           class="lg:py-5 lg:px-9 rounded-[50px] mt-[-40px] bg-white  text-center font-bold	text-4xl flex mx-auto z-2"
                           style="box-shadow: 0px 0px 17px 8px rgba(0,0,0,0.05);">
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                 x="0px" y="0px" viewBox="0 0 511.548 511.548"
                                 style="enable-background:new 0 0 511.548 511.548;"
                                 xml:space="preserve" width="32" height="32">
                                <g>
                                    <path style="fill:#FF6200;"
                                          d="M394.441,191.548C307.52,95.547,287.775,20.882,287.775,20.882s-15.054,6.718-32,22.11   l-21.333,244.556l21.333,209h0.001c104.842-0.001,189.833-84.992,189.833-189.833C445.608,263.409,421.423,221.349,394.441,191.548   z">
                                    </path>
                                    <path style="fill:#FD7D21;"
                                          d="M223.775,84.882c-10.873,21.747-13.434,46.265-13.33,65.08c0.1,18.252-12.758,34.004-30.655,37.584   c-12.504,2.501-25.43-1.413-34.447-10.43l-17.568-17.568c0,0-26.044,35.911-30.507,42.667   c-20.047,30.346-31.613,66.786-31.321,105.945c0.778,104.581,85.244,188.388,189.828,188.388V42.992   C244.69,53.06,232.797,66.838,223.775,84.882z">
                                    </path>
                                    <g>
                                        <path style="fill:#FFB62D;"
                                              d="M405.561,181.48c-43.372-47.903-69.147-90.072-83.134-117.013    c-15.148-29.181-20.112-47.276-20.15-47.42L297.768,0l-16.104,7.183c-0.917,0.409-11.941,5.434-25.89,16.238l-10.667,18.794    l10.667,22.117c8.336-9.351,16.934-16.341,23.849-21.18c11.282,28.696,39.881,87.981,103.699,158.465    c14.217,15.702,47.285,57.376,47.285,105.099c0,96.403-78.43,174.833-174.832,174.833h-0.001l-10.667,19.333l10.667,10.667h0.001    c112.945-0.001,204.832-91.888,204.832-204.833C460.608,265.764,440.544,220.118,405.561,181.48z">
                                        </path>
                                        <path style="fill:#FDCB02;"
                                              d="M132.499,430.925c-32.898-32.646-51.206-76.285-51.553-122.876    c-0.26-34.878,9.712-68.616,28.837-97.565c2.335-3.534,11.702-16.602,19.833-27.879l5.119,5.119    c12.592,12.592,30.53,18.025,47.996,14.532c24.888-4.978,42.852-27.004,42.713-52.375c-0.087-15.701,1.881-38.558,11.746-58.29    c5.351-10.702,11.883-19.741,18.584-27.258V23.421c-14.692,11.381-32.628,29.175-45.417,54.753    c-12.515,25.031-15.018,52.9-14.913,71.87c0.061,11.04-7.761,20.626-18.598,22.793c-7.598,1.518-15.414-0.844-20.898-6.328    l-29.997-29.997l-10.319,14.229c-1.071,1.477-26.289,36.256-30.88,43.205c-22.419,33.937-34.109,73.47-33.806,114.325    c0.406,54.565,21.864,105.686,60.421,143.948c38.554,38.259,89.839,59.329,144.407,59.329v-30    C209.176,481.548,165.396,463.57,132.499,430.925z">
                                        </path>
                                    </g>
                                    <g>
                                        <path style="fill:#ED3800;"
                                              d="M255.775,206.042c-0.111,0-0.222,0.004-0.333,0.004l-24.997,117.329l24.997,117.329    c0.111,0,0.222,0.004,0.333,0.004c64.801,0,117.333-52.532,117.333-117.333C373.108,258.574,320.576,206.042,255.775,206.042z">
                                        </path>
                                        <path style="fill:#FF4B00;"
                                              d="M138.441,323.375c0,64.69,52.352,117.149,117,117.329V206.046    C190.794,206.226,138.441,258.685,138.441,323.375z">
                                        </path>
                                    </g>
                                    <g>
                                        <polygon style="fill:#D9E7EC;"
                                                 points="319.432,254.503 286.177,254.503 255.441,299.513 245.108,340.882 255.441,348.214   ">
                                        </polygon>
                                        <path style="fill:#D9E7EC;"
                                              d="M306.248,317.472c-20.858,0-36.601,13.971-36.601,38.372c0,24.597,15.742,38.371,36.601,38.371    s36.601-13.774,36.601-38.371C342.849,331.443,327.106,317.472,306.248,317.472z M306.248,372.963    c-4.329,0-8.658-3.936-8.658-17.12c0-13.184,4.329-17.12,8.658-17.12s8.658,3.936,8.658,17.12    C314.906,369.027,310.577,372.963,306.248,372.963z">
                                        </path>
                                        <polygon style="fill:#FAFCFD;"
                                                 points="225.372,392.247 255.441,348.214 255.441,299.513 192.117,392.247   ">
                                        </polygon>
                                        <path style="fill:#FAFCFD;"
                                              d="M241.902,290.907c0-24.4-15.742-38.372-36.601-38.372s-36.601,13.971-36.601,38.372    c0,24.597,15.742,38.372,36.601,38.372S241.902,315.504,241.902,290.907z M196.643,290.907c0-13.184,4.329-17.12,8.658-17.12
                                    c4.329,0,8.658,3.936,8.658,17.12c0,13.184-4.329,17.12-8.658,17.12C200.972,308.027,196.643,304.091,196.643,290.907z">
                                        </path>
                                    </g>
                                </g>
                            </svg>
                        </span>
                            <span>Ưu đãi trong tuần</span>
                        </a>
                    </h2>
                    <div id="sale-product-week p-8 m-8" >
                        <swiper-container class="mySwiper"  slides-per-view="4"  grab-cursor="true">
                            @for($i=0; $i<count($discountedProducts); $i=$i+2)
                                <swiper-slide class="sale-product-week-info">
                                    <div class="">
                                        <div class="relative rounded-[10px] w-full" >
                                            <div class="sale-label absolute left-0 top-0 bg-[#f14e18] rounded-tl-[10px]
                                                rounded-br-[10px] px-2 text-white font-medium text-sm z-10">
                                                <span>-{{$discountedProducts[$i]->discount_persent}}%</span>
                                            </div>
                                            <div class="product-transition h-56 relative">
                                                <div id="preview-img-product-{{$discountedProducts[$i]->id}}"
                                                     class="flex justify-center h-full z-0"
                                                     onmouseover="hoverProductCard({{$discountedProducts[$i]->id}})"
                                                     onmouseout="mouseOutProductCard({{$discountedProducts[$i]->id}})"
                                                     >
                                                    <a href="{{route('user.product.detail',['id'=>$discountedProducts[$i]->id])}}"
                                                       >
                                                        <img class="h-full transition-transform hover:scale-105 z-0"
                                                             style="transition: transform 0.5s ease-in-out;"
                                                             src="{{$discountedProducts[$i]->images[0]->path}}">
                                                    </a>
                                                </div>
                                                <div id="product-{{$discountedProducts[$i]->id}}-action"
                                                     class=" absolute hidden bottom-0 w-full
                                                    transition-transform transform
                                                    translate-y-full z-10"
                                                     style="transition: transform 1s ease-in-out;">
                                                    <div class="flex items-center mx-auto w-1/2" >
                                                        <div class="wish-button">
                                                            <a href="#">
                                                                <button type="button" class="text-white bg-[#fe0000]
                                                            hover:bg-[#ffb416]
                                                            focus:ring-4 focus:outline-none focus:ring-blue-300
                                                            font-medium rounded-full text-xl p-2.5 text-center inline-flex items-center me-2">
                                                                    <i class="fa-regular fa-heart"></i>
                                                                </button>
                                                            </a>
                                                        </div>
                                                        <div class="cart-button">
                                                            <form action="#" method="POST" enctype="multipart/form-data">
                                                                <input type="hidden" name="variantId" value="">
                                                                <button type="button" class="text-white bg-[#3ba66b]  hover:bg-[#ffb416]
                                                            focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-full text-xl p-2.5
                                                            text-center inline-flex items-center me-2">
                                                                    <i class="fa-solid fa-cart-shopping"></i>
                                                                </button>

                                                            </form>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="product-info">
                                                <a href="{{route('user.product.detail',['id'=>$discountedProducts[$i]->id])}}"
                                                   class="pt-2 mb-2 text-ellipsis text-base">
                                                    {{$discountedProducts[$i]->name}}
                                                </a>
                                                <div class="product__price">
                                                    <span class="price text-base font-bold	text-[#fe0000]">{{ number_format($discountedProducts[$i]->price*(1-$discountedProducts[$i]->discount_persent*0.01), 0, ',', '.') }}₫</span>
                                                    <span class="old-price  line-through text-[#999] text-sm ml-2">  {{ number_format($discountedProducts[$i]->price, 0, ',', '.') }} đ</span>
                                                </div>
                                            </div>
                                        </div>
                                        @if(isset($discountedProducts[$i+1]))
                                            <div class="relative rounded-[10px] w-full" >
                                                <div class="sale-label absolute left-0 top-0 bg-[#f14e18] rounded-tl-[10px]
      rounded-br-[10px] px-2 text-white font-medium text-sm z-10">
                                                    <span>-{{$discountedProducts[$i+1]->discount_persent}}%</span>
                                                </div>
                                                <div class="product-transition h-56 relative">
                                                    <div id="preview-img-product-{{$discountedProducts[$i+1]->id}}"
                                                         class="flex justify-center h-full z-0"
{{--                                                         onmouseover="hoverProductCard({{$discountedProducts[$i+1]->id}})"--}}
{{--                                                         onmouseout="mouseOutProductCard({{$discountedProducts[$i+1]->id}})"--}}
                                                    >
                                                        <a href="{{route('user.product.detail',['id'=>$discountedProducts[$i+1]->id])}}"
                                                        >
                                                            <img class="h-full transition-transform hover:scale-105 z-0"
                                                                 style="transition: transform 0.5s ease-in-out;"
                                                                 src="{{$discountedProducts[$i+1]->images[0]->path}}">
                                                        </a>
                                                    </div>
                                                    <div id="product-{{$discountedProducts[$i+1]->id}}-action"
                                                         class=" absolute hidden bottom-0 w-full
                                                                  transition-transform transform
                                                                  translate-y-full z-10 hover:block"
                                                         style="transition: transform 1s ease-in-out;"
                                                    >
                                                        <div class="flex items-center mx-auto w-1/2" >
                                                            <div class="wish-button">
                                                                <a href="#">
                                                                    <button type="button" class="text-white bg-[#fe0000]
                                                                              hover:bg-[#ffb416]
                                                                              focus:ring-4 focus:outline-none focus:ring-blue-300
                                                                              font-medium rounded-full text-xl p-2.5 text-center inline-flex items-center me-2">
                                                                        <i class="fa-regular fa-heart"></i>
                                                                    </button>
                                                                </a>
                                                            </div>
                                                            <div class="cart-button">
                                                                <form action="#" method="POST" enctype="multipart/form-data">
                                                                    <input type="hidden" name="variantId" value="">
                                                                    <button type="button" class="text-white bg-[#3ba66b]  hover:bg-[#ffb416]
                                                                                                  focus:ring-4 focus:outline-none focus:ring-blue-300
                                                                                                   font-medium rounded-full text-xl p-2.5
                                                                                                  text-center inline-flex items-center me-2">
                                                                        <i class="fa-solid fa-cart-shopping"></i>
                                                                    </button>

                                                                </form>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="product-info">
                                                    <a href="{{route('user.product.detail',['id'=>$discountedProducts[$i+1]->id])}}"
                                                       class="pt-2 mb-2 text-ellipsis text-base">
                                                        {{$discountedProducts[$i+1]->name}}
                                                    </a>
                                                    <div class="product__price">
                                                        <span class="price text-base font-bold	text-[#fe0000]">{{ number_format($discountedProducts[$i+1]->price*(1-$discountedProducts[$i+1]->discount_persent*0.01), 0, ',', '.') }}₫</span>
                                                        <span class="old-price  line-through text-[#999] text-sm ml-2">  {{ number_format($discountedProducts[$i+1]->price, 0, ',', '.') }} đ</span>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif

                                    </div>
                                </swiper-slide>
                            @endfor
                        </swiper-container>
                    </div>
                </div>
            </div>
            <div id="customer-feedback" class=" mb-14">
                <div class="block-title text-center w-full mb-5">
                    <h2 class="text-4xl	font-bold text-[#3e4a5e]">Khách hàng nói gì về chúng tôi</h2>
                    <div class="mx-auto mt-3"><img src="{{asset('frontend/images/bg-title-after.webp')}}" class="mx-auto"></div>
                </div>
                <div id="feedback-banner">
                    <swiper-container class="mySwiper "  slides-per-view="2">
                        @for($i=0; $i<5; $i++)
                            <swiper-slide class="" >
                                <img src="//bizweb.dktcdn.net/100/065/538/themes/838571/assets/banner_1.jpg?1708919610274"
                                     class=" w-11/12 rounded-[30px] transition-transform hover:scale-105"
                                style="transition: transform 0.5s ease-in-out;">
                            </swiper-slide>
                        @endfor

                    </swiper-container>
                </div>
            </div>
            <div class="grid grid-cols-12 gap-4 h-75  mx-auto mb-14">
                <div class="col-span-3 px-2.5 h-full">
                    <div class="rounded-[20px] h-full max-w-[329px] p-8	 bg-[url('//bizweb.dktcdn.net/100/065/538/themes/838571/assets/bg-title-link-1.jpg?1708919472176')]">
                        <h2 class="font-bold text-xl">
                            <a href="trai-cay-nhap-khau">Trái cây nhập khẩu</a>
                        </h2>
                        <div class="block-cate">
                            <ul>
                                @for($i=0;$i<3;$i++)
                                    <li class="text-base mb-2">
                                        <a href="/tao" title="Táo">
									<span class="icon text-[6px] mr-2">
										<i class="fa-solid fa-circle" style="color: #03ba6b;"></i>
									</span>
                                            <span class="text">
										 Táo
									</span>
                                        </a>
                                    </li>

                                @endfor
                            </ul>
                            <div class="view-more h-8">
                                <a href="trai-cay-nhap-khau" class="" title="Mua ngay">
                                    <div class="bg-[#f62e2e] text-white rounded-[30px] text-base text-center py-2 px-5 w-28">
                                        Mua ngay
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-span-9">
                    <swiper-container class="mySwiper" slides-per-view="4"
                                      navigation="true">
                        @for($i=0; $i<5; $i++)
                            <swiper-slide class="sale-product-week-info border rounded-[20px] mr-5	">
                                <div class="">
                                    @for($j=0; $j<2; $j++)
                                        <div class="product-block-item relative rounded-[10px] w-full">
                                            <div class="sale-label absolute left-0 top-0 bg-[#f14e18] rounded-tl-[10px]
                                    rounded-br-[10px] px-2 text-white font-medium text-sm"><span>-
                                            28%
                                        </span></div>
                                            <div class="product-transition h-56">
                                                <div class="flex justify-center h-full">
                                                    <a href="/nho-sua-han-quoc-hop-1kg" title="Nho sữa Hàn Quốc Hộp" class="product-thumb">
                                                        <img class="product-thumbnail lazy loaded h-full"
                                                             src="//bizweb.dktcdn.net/thumb/large/100/065/538/products/san-pham-3.jpg?v=1637794768403"
                                                             data-src="//bizweb.dktcdn.net/thumb/large/100/065/538/products/san-pham-3.jpg?v=1637794768403"
                                                             alt="Nho sữa Hàn Quốc Hộp" data-was-processed="true">
                                                    </a>
                                                </div>
                                                <div class="product-action hidden">
                                                    <a href="javascript:void(0)"
                                                       class="action btn-compare js-btn-wishlist setWishlist btn-views"
                                                       data-wish="nho-sua-han-quoc-hop-1kg" tabindex="0"
                                                       title="Thêm vào yêu thích">
                                                        <svg enable-background="new 0 0 412.735 412.735" version="1.1"
                                                             viewBox="0 0 412.74 412.74" xml:space="preserve"
                                                             xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="m295.71 35.522c-34.43-0.184-67.161 14.937-89.339 41.273-22.039-26.516-54.861-41.68-89.339-41.273-64.633
                                                    0-117.03 52.395-117.03 117.03 0 110.76 193.31 218.91 201.14 223.09 3.162 2.113 7.286 2.113 10.449 0
                                                    7.837-4.18 201.14-110.76 201.14-223.09 0-64.633-52.396-117.03-117.03-117.03zm-89.339 319.22c-30.302-17.763-185.47-112.33-185.47-202.19 0-53.091
                                                    43.039-96.131 96.131-96.131 32.512-0.427 62.938 15.972 80.457 43.363 3.557 4.905 10.418 5.998 15.323 2.44 0.937-0.68 1.761-1.503 2.44-2.44
                                                    29.055-44.435 88.631-56.903 133.07-27.848 27.202 17.787 43.575 48.114 43.521 80.615 1e-3 90.907-155.17 184.95-185.47 202.19z">
                                                    </path>
                                                </svg>
                                                    </a>
                                                    <form action="/cart/add" method="post" enctype="multipart/form-data"
                                                          class="group-buttons variants form-nut-grid form-ajaxtocart has-validation-callback"
                                                          data-id="product-actions-23770997">
                                                        <input type="hidden" name="variantId" value="">
                                                        <a href="/nho-sua-han-quoc-hop-1kg"
                                                           class="action add_to_cart cart-button hidden" rel="nofollow"
                                                           title="Mua ngay">
                                                            <svg xmlns="http://www.w3.org/2000/svg" height="25px"
                                                                 viewBox="0 -31 512.00026 512" width="25px">
                                                                <path
                                                                    d="m164.960938 300.003906h.023437c.019531
                                                        0 .039063-.003906.058594-.003906h271.957031c6.695312 0
                                                        12.582031-4.441406 14.421875-10.878906l60-210c1.292969-4.527344.386719-9.394532-2.445313-13.152344-2.835937-3.757812-7.269531
                                                        -5.96875-11.976562-5.96875h-366.632812l-10.722657-48.253906c-1.527343-6.863282-7.613281-11.746094-14.644531-11.746094h-90c
                                                        -8.285156 0-15 6.714844-15 15s6.714844 15 15 15h77.96875c1.898438 8.550781 51.3125 230.917969 54.15625 243.710938-15.941406
                                                        6.929687-27.125 22.824218-27.125 41.289062 0 24.8125 20.1875 45 45 45h272c8.285156 0 15-6.714844 15-15s-6.714844-15-15-15h-272c-8.269531
                                                        0-15-6.730469-15-15 0-8.257812 6.707031-14.976562 14.960938-14.996094zm312.152343-210.003906-51.429687 180h-248.652344l-40-180zm0 0">
                                                                </path>
                                                                <path
                                                                    d="m150 405c0 24.8125 20.1875 45 45 45s45-20.1875 45-45-20.1875-45-45-45-45 20.1875-45 45zm45-15c8.269531 0
                                                    15 6.730469 15 15s-6.730469 15-15 15-15-6.730469-15-15 6.730469-15 15-15zm0 0">
                                                                </path>

                                                                <path d="m362 405c0 24.8125 20.1875 45 45 45s45-20.1875 45-45-20.1875-45-45-45-45
                                                    20.1875-45 45zm45-15c8.269531 0 15 6.730469 15 15s-6.730469 15-15 15-15-6.730469-15-15
                                                    6.730469-15 15-15zm0 0">
                                                                </path>
                                                            </svg>
                                                        </a>
                                                    </form>
                                                </div>
                                            </div>
                                            <div class="product-info">
                                                <a href="/nho-sua-han-quoc-hop-1kg" title="Nho sữa Hàn Quốc Hộp"
                                                   class="item-product-name pt-2 mb-2 text-ellipsis text-base">Nho sữa Hàn Quốc Hộp</a>
                                                <div class="product__price">
                                                    <span class="price text-base font-bold	text-[#fe0000]">790.000₫</span>
                                                </div>
                                            </div>

                                        </div>
                                    @endfor
                                </div>
                            </swiper-slide>
                        @endfor
                    </swiper-container>
                </div>
            </div>
            <div class="grid grid-cols-12 gap-4 h-75  mx-auto mb-14">
                <div class="col-span-9">
                    <swiper-container class="mySwiper" slides-per-view="4"
                                      navigation="true">
                        @for($i=0; $i<5; $i++)
                            <swiper-slide class="sale-product-week-info border rounded-[20px] mr-5	">
                                <div class="">
                                    @for($j=0; $j<2; $j++)
                                        <div class="product-block-item relative rounded-[10px] w-full">
                                            <div class="sale-label absolute left-0 top-0 bg-[#f14e18] rounded-tl-[10px]
                                    rounded-br-[10px] px-2 text-white font-medium text-sm"><span>-
                                            28%
                                        </span></div>
                                            <div class="product-transition h-56">
                                                <div class="flex justify-center h-full">
                                                    <a href="/nho-sua-han-quoc-hop-1kg" title="Nho sữa Hàn Quốc Hộp" class="product-thumb">
                                                        <img class="product-thumbnail lazy loaded h-full"
                                                             src="//bizweb.dktcdn.net/thumb/large/100/065/538/products/san-pham-3.jpg?v=1637794768403"
                                                             data-src="//bizweb.dktcdn.net/thumb/large/100/065/538/products/san-pham-3.jpg?v=1637794768403"
                                                             alt="Nho sữa Hàn Quốc Hộp" data-was-processed="true">
                                                    </a>
                                                </div>
                                                <div class="product-action hidden">
                                                    <a href="javascript:void(0)"
                                                       class="action btn-compare js-btn-wishlist setWishlist btn-views"
                                                       data-wish="nho-sua-han-quoc-hop-1kg" tabindex="0"
                                                       title="Thêm vào yêu thích">
                                                        <svg enable-background="new 0 0 412.735 412.735" version="1.1"
                                                             viewBox="0 0 412.74 412.74" xml:space="preserve"
                                                             xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="m295.71 35.522c-34.43-0.184-67.161 14.937-89.339 41.273-22.039-26.516-54.861-41.68-89.339-41.273-64.633
                                                    0-117.03 52.395-117.03 117.03 0 110.76 193.31 218.91 201.14 223.09 3.162 2.113 7.286 2.113 10.449 0
                                                    7.837-4.18 201.14-110.76 201.14-223.09 0-64.633-52.396-117.03-117.03-117.03zm-89.339 319.22c-30.302-17.763-185.47-112.33-185.47-202.19 0-53.091
                                                    43.039-96.131 96.131-96.131 32.512-0.427 62.938 15.972 80.457 43.363 3.557 4.905 10.418 5.998 15.323 2.44 0.937-0.68 1.761-1.503 2.44-2.44
                                                    29.055-44.435 88.631-56.903 133.07-27.848 27.202 17.787 43.575 48.114 43.521 80.615 1e-3 90.907-155.17 184.95-185.47 202.19z">
                                                    </path>
                                                </svg>
                                                    </a>
                                                    <form action="/cart/add" method="post" enctype="multipart/form-data"
                                                          class="group-buttons variants form-nut-grid form-ajaxtocart has-validation-callback"
                                                          data-id="product-actions-23770997">
                                                        <input type="hidden" name="variantId" value="">
                                                        <a href="/nho-sua-han-quoc-hop-1kg"
                                                           class="action add_to_cart cart-button hidden" rel="nofollow"
                                                           title="Mua ngay">
                                                            <svg xmlns="http://www.w3.org/2000/svg" height="25px"
                                                                 viewBox="0 -31 512.00026 512" width="25px">
                                                                <path
                                                                    d="m164.960938 300.003906h.023437c.019531
                                                        0 .039063-.003906.058594-.003906h271.957031c6.695312 0
                                                        12.582031-4.441406 14.421875-10.878906l60-210c1.292969-4.527344.386719-9.394532-2.445313-13.152344-2.835937-3.757812-7.269531
                                                        -5.96875-11.976562-5.96875h-366.632812l-10.722657-48.253906c-1.527343-6.863282-7.613281-11.746094-14.644531-11.746094h-90c
                                                        -8.285156 0-15 6.714844-15 15s6.714844 15 15 15h77.96875c1.898438 8.550781 51.3125 230.917969 54.15625 243.710938-15.941406
                                                        6.929687-27.125 22.824218-27.125 41.289062 0 24.8125 20.1875 45 45 45h272c8.285156 0 15-6.714844 15-15s-6.714844-15-15-15h-272c-8.269531
                                                        0-15-6.730469-15-15 0-8.257812 6.707031-14.976562 14.960938-14.996094zm312.152343-210.003906-51.429687 180h-248.652344l-40-180zm0 0">
                                                                </path>
                                                                <path
                                                                    d="m150 405c0 24.8125 20.1875 45 45 45s45-20.1875 45-45-20.1875-45-45-45-45 20.1875-45 45zm45-15c8.269531 0
                                                    15 6.730469 15 15s-6.730469 15-15 15-15-6.730469-15-15 6.730469-15 15-15zm0 0">
                                                                </path>

                                                                <path d="m362 405c0 24.8125 20.1875 45 45 45s45-20.1875 45-45-20.1875-45-45-45-45
                                                    20.1875-45 45zm45-15c8.269531 0 15 6.730469 15 15s-6.730469 15-15 15-15-6.730469-15-15
                                                    6.730469-15 15-15zm0 0">
                                                                </path>
                                                            </svg>
                                                        </a>
                                                    </form>
                                                </div>
                                            </div>
                                            <div class="product-info">
                                                <a href="/nho-sua-han-quoc-hop-1kg" title="Nho sữa Hàn Quốc Hộp"
                                                   class="item-product-name pt-2 mb-2 text-ellipsis text-base">Nho sữa Hàn Quốc Hộp</a>
                                                <div class="product__price">
                                                    <span class="price text-base font-bold	text-[#fe0000]">790.000₫</span>
                                                </div>
                                            </div>

                                        </div>
                                    @endfor
                                </div>
                            </swiper-slide>
                        @endfor
                    </swiper-container>
                </div>
                <div class="relative col-span-3 px-2.5 h-full" dir="ltr">
                    <div class="rounded-[20px] h-full max-w-[329px] p-8	lg:ml-10 bg-[url('//bizweb.dktcdn.net/100/065/538/themes/838571/assets/bg-title-link-1.jpg?1708919472176')]">
                        <h2 class="font-bold text-xl">
                            <a href="trai-cay-nhap-khau" title="Trái cây nhập khẩu">Trái cây nhập khẩu</a>
                        </h2>
                        <div class="block-cate">
                            <ul>
                                @for($i=0;$i<3;$i++)
                                    <li class="text-base mb-2">
                                        <a href="/tao" title="Táo">
									<span class="icon text-[6px] mr-2">
										<i class="fa-solid fa-circle" style="color: #03ba6b;"></i>
									</span>
                                            <span class="text">
										 Táo
									</span>
                                        </a>
                                    </li>

                                @endfor
                            </ul>
                            <div class="view-more h-8">
                                <a href="trai-cay-nhap-khau" class="" title="Mua ngay">
                                    <div class="bg-[#f62e2e] text-white rounded-[30px] text-xs text-center py-2 px-5 w-28">
                                        Mua ngay
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function hoverProductCard(id){

            document.getElementById(`product-${id}-action`).classList.remove('hidden');
            document.getElementById(`product-${id}-action`).classList.add('translate-y-0');
        }
        function mouseOutProductCard(id){
            document.getElementById(`product-${id}-action`).classList.remove('translate-y-0');
            document.getElementById(`product-${id}-action`).classList.add('hidden');
        }
    </script>
@endsection
