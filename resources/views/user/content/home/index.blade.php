@extends('layouts.FrontendLayout')

@section('content')
    <div class="content-page">
        <div class="poster">
            <swiper-container class="mySwiper" pagination="true">
                @foreach($banners as $item)
                    <swiper-slide>
                        <img src="{{$item->image_path}}">
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
                                    <a href="#">{{$item->name}}</a>
                                </h3>
                            </div>
                        </swiper-slide>
                    @endforeach
                </swiper-container>
            </div>
            <div id="sale-on-week mb-5" class="lg:w-11/12 mx-auto z-0 mt-20  mb-14">
                @include('user.content.home.saleProducts',['discountedProducts'=>$discountedProducts])
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
                @include('user.content.home.productByCategory',['productCategories'=>$productCategories])
        </div>
    </div>

    <script>

        function hoverProductDiscountCard(id){

            document.getElementById(`product-discount-${id}-action`).classList.remove('hidden');
            document.getElementById(`product-discount-${id}-action`).classList.add('translate-y-0');
        }
        function mouseOutProductDiscountCard(id){
            document.getElementById(`product-discount-${id}-action`).classList.remove('translate-y-0');
            document.getElementById(`product-discount-${id}-action`).classList.add('hidden');
        }
    </script>
@endsection
