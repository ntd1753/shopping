<div class="relative rounded-[10px] w-full z-1"
     onmouseover="hoverProductCard({{$item->id}})"
     onmouseout="mouseOutProductCard({{$item->id}})">
    <div class="sale-label absolute left-0 top-0 bg-[#f14e18] rounded-tl-[10px]
                                                rounded-br-[10px] px-2 text-white font-medium text-sm z-20">
        <span>-{{$item->discount_persent}}%</span>
    </div>
    <div class="product-transition h-56 relative p-1">
        <div id="preview-img-product-{{$item->id}}"
             class="flex justify-center h-full z-0"
        >
            <a href="{{route('user.product.detail',['id'=>$item->id])}}">
                <img class="h-full transition-transform hover:scale-105 z-0"
                     style="transition: transform 0.5s ease-in-out;"
                     src="{{$item->images[0]->path}}">
            </a>
            <div id="product-{{$item->id}}-action"
                 class="product-{{$item->id}}-action absolute hidden bottom-0
                                                    transition-transform transform
                                                     z-10"
                 style="transition: transform 1s ease-in-out;">
                <div class="flex items-center mx-auto" >
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
                            <input type="hidden" name="variantId" value="1">
                            <button id="cart-button-{{$item->id}}" type="button" class="text-white bg-[#3ba66b]  hover:bg-[#ffb416]
                                                            focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-full text-xl p-2.5
                                                            text-center inline-flex items-center me-2"
                                   onclick=" @auth()addCartByProductCard({{$item->id}}) @else window.location.href='{{route('auth.login')}}' @endauth">
                                <i class="fa-solid fa-cart-shopping"></i>
                            </button>

                        </form>
                    </div>
                </div>

            </div>
        </div>

    </div>
    <div class="product-info">
        <a href="{{route('user.product.detail',['id'=>$item->id])}}"
           class="pt-2 mb-2 text-ellipsis text-base">
            {{$item->name}}
        </a>
        <div class="product__price">
            <span class="price text-base font-bold	text-[#fe0000]">{{ number_format($item->price*(1-$item->discount_persent*0.01), 0, ',', '.') }}₫</span>
            @if($item->discount_persent>0)
                <span class="old-price  line-through text-[#999] text-sm ml-2">  {{ number_format($item->price, 0, ',', '.') }} đ</span>
            @endif
        </div>
    </div>
</div>
