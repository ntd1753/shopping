@for($i=0;$i<count($productCategories);$i=$i+2)
    <div class="grid grid-cols-12 gap-4 h-75  mx-auto mb-14">
        <div class="col-span-3 px-2.5 h-full">
            <div class="rounded-[20px] h-full max-w-[329px]  p-8	 bg-[url('{{$productCategories[$i]->icon_path}}')]">
                <h2 class="font-bold text-xl hover:text-[#ffb416]">
                    <a href="{{route('user.product.category',['slug'=>$productCategories[$i]->slug])}}">{{$productCategories[$i]->name}}</a>
                </h2>
                <div class="block-cate mt-2">
                    <ul>
                        @foreach($productCategories[$i]->subCategories as $subCategory)
                            <li class="text-base mb-2 hover:text-[#ffb416]">
                                <a href="{{route('user.product.category',['slug'=>$subCategory->slug])}}" title="Táo">
									<span class="icon text-[6px] mr-2">
										<i class="fa-solid fa-circle" style="color: #03ba6b;"></i>
									</span>
                                    <span class="text">
										 {{$subCategory->name}}
									</span>
                                </a>
                            </li>

                        @endforeach
                    </ul>
                    <div class="view-more h-8">
                        <a href="{{route('user.product.category',['slug'=>$productCategories[$i]->slug])}}" class="" title="Mua ngay">
                            <div class="bg-[#f62e2e] text-white rounded-[30px]  text-base text-center py-2 px-5 w-28">
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
                    <?php $product=$productCategories[$i]->productWithSubCategories;
                    ?>
                @for($j=0;$j<count($product);$j=$j+2)
                    <swiper-slide class="sale-product-week-info border rounded-[20px] mr-5	grid">

                            @include('component.product.productCard',['item'=>$product[$j]])
                        @if(isset($product[$j+1]))
                                @include('component.product.productCard',['item'=>$product[$j+1]])

                            @endif
                    </swiper-slide>
                @endfor
            </swiper-container>
        </div>
    </div>
    @if(isset($productCategories[$i+1]))
        <div class="grid grid-cols-12 gap-4 h-75  mx-auto mb-14">
            <div class="col-span-9">
                <swiper-container class="mySwiper" slides-per-view="4"
                                  navigation="true">
                        <?php $product=$productCategories[$i+1]->productWithSubCategories;
                        ?>
                    @for($j=0;$j<count($product);$j=$j+2)
                        <swiper-slide class="sale-product-week-info border rounded-[20px] mr-5	grid">
                            <div class="">
                                @include('component.product.productCard',['item'=>$product[$j]])
                                @if(isset($product[$j+1]))
                                    @include('component.product.productCard',['item'=>$product[$j+1]])
                                @endif

                            </div>
                        </swiper-slide>
                    @endfor
                </swiper-container>
            </div>
            <div class="col-span-3 px-2.5 h-full ">
                <div class="rounded-[20px] max-w-[329px]  p-8 h-full bg-[url('{{$productCategories[$i+1]->icon_path}}')]">
                    <h2 class="font-bold text-xl hover:text-[#ffb416]">
                        <a href="{{route('user.product.category',['slug'=>$productCategories[$i+1]->slug])}}">{{$productCategories[$i+1]->name}}</a>
                    </h2>
                    <div class="block-cate mt-2">
                        <ul>
                            @foreach($productCategories[$i+1]->subCategories as $subCategory)
                                <li class="text-base mb-2 hover:text-[#ffb416]">
                                    <a href="{{route('user.product.category',['slug'=>$subCategory->slug])}}" title="Táo">
									<span class="icon text-[6px] mr-2">
										<i class="fa-solid fa-circle" style="color: #03ba6b;"></i>
									</span>
                                        <span class="text">
										 {{$subCategory->name}}
									</span>
                                    </a>
                                </li>

                            @endforeach
                        </ul>
                        <div class="view-more h-8">
                            <a href="{{route('user.product.category',['slug'=>$productCategories[$i+1]->slug])}}" class="" title="Mua ngay">
                                <div class="bg-[#f62e2e] text-white rounded-[30px] mt-2 text-base text-center py-2 px-5 w-28">
                                    Mua ngay
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

@endfor
