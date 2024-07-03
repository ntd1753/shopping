@extends('layouts.FrontendLayout')

@section('content')
    <div class="poster bg-[url('https://bizweb.dktcdn.net/100/065/538/themes/838571/assets/bg-breadcrumb.jpg?1708919472176')] py-4 mb-8 min-h-52 flex items-center">
        <section class="w-full">
            <div class="nd-main-title-breadcrumb text-center text-2xl font-bold mb-2">
                <h1>
                    Tất cả sản phẩm
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
                                Tất cả sản phẩm
                            </strong></span>
                        </a>
            </div>

        </section>
    </div>
    <div class="container mx-auto mb-[50px]  grid grid-cols-12 gap-4">
        <div id="sidebar" class="col-span-3 px-2">
            <div class="w-full rounded-lg mb-4">
                <div id="category-title" class="bg-[#3ba66b] px-3 py-4 rounded-t-[12px] text-base text-white font-bold">
                    DANH MỤC SẢN PHẨM
                </div>
                <div id="sub-category" class="rounded-b-[12px] px-3 py-4  text-base border-2">
                    @foreach ($productCategories  as $category)
                    <ul>
                        <a href="{{route('user.product.category',['slug'=> $category->slug])}}" class="hover:text-[#ffb416]">
                            <li class="py-1.5">
                                 {{$category->name}}
                            </li>
                        </a>
                    </ul>

                    @endforeach

                </div>
            </div>
            <div class="w-full rounded-lg ">
                <div id="filter-title" class="bg-[#3ba66b] px-3 py-4 rounded-t-[12px] text-base text-white font-bold">
                    LỌC SẢN PHẨM
                </div>
                <div id="sub-filter" class="rounded-b-[12px] px-3 py-4  text-base border-2">
                    <ul>
                        <a href="{{route('user.product.all',[...$query, 'max_price'=>"100000", 'min_price'=>"0"])}}">
                            <li  class="p-2 hover:text-[#ffb416]">
                                <input type="checkbox" name="price" class="rounded-[2px] text-[#ffb416]" value="(<100000)"@if (isset($query['max_price']))
                                @if ($query['max_price']==100000)
                                checked
                                @endif
                            @endif>
                                <label for="">Giá dưới 100.000đ</label>
                            </li>
                        </a>

                        <a href="{{route('user.product.all',[...$query, 'max_price'=>"200000", 'min_price'=>"100000"])}}">
                            <li class="p-2 hover:text-[#ffb416]">
                                <input type="checkbox" name="price" class="rounded-[2px] text-[#ffb416]" value="(<100000)" @if (isset($query['max_price']))
                                    @if ($query['max_price']==200000)
                                    checked
                                    @endif

                                @endif>
                                <label for="">
									100.000đ - 200.000đ
								</label>
                            </li>
                        </a>
                        <a href="{{route('user.product.all',[...$query, 'max_price'=>"300000", 'min_price'=>"200000"])}}">
                            <li class="p-2 hover:text-[#ffb416]">
                                <input type="checkbox" name="price" class="rounded-[2px] text-[#ffb416]" value="(<100000)" @if (isset($query['max_price']))
                                @if ($query['max_price']==300000)
                                checked
                                @endif
                                @endif>
                                <label for="">
									200.000đ - 300.000đ
								</label>
                            </li>
                        </a>
                        <a href="{{route('user.product.all',[...$query, 'max_price'=>"500000", 'min_price'=>"300000"])}}">
                            <li class="p-2 hover:text-[#ffb416]">
                                <input type="checkbox" name="price" class="rounded-[2px] text-[#ffb416]" value="(<100000)" @if (isset($query['max_price']))
                                @if ($query['max_price']==500000)
                                checked
                                @endif
                                @endif>
                                <label for="">
									300.000đ - 500.000đ
								</label>
                            </li>
                        </a>
                        <a href="{{route('user.product.all',[...$query, 'max_price'=>"1000000", 'min_price'=>"500000"])}}">
                            <li class="p-2 hover:text-[#ffb416]">
                                <input type="checkbox" name="price" class="rounded-[2px] text-[#ffb416]" value="" @if (isset($query['max_price']))
                                @if ($query['max_price']==1000000)
                                checked
                                @endif

                                @endif>
                                <label for="">
									500.000đ - 1.000.000đ
								</label>
                            </li>
                        </a>
                        <a href="{{route('user.product.all',[...$query, 'max_price'=>"2000000", 'min_price'=>"1000000"])}}">
                            <li class="p-2 hover:text-[#ffb416]">
                                <input type="checkbox" name="price" class="rounded-[2px] text-[#ffb416]" value="" @if (isset($query['max_price']))
                                    @if ($query['max_price']==2000000)
                                    checked
                                    @endif
                                @endif>
                                <label for="">
									1.000.000đ - 2.000.000đ
								</label>
                            </li>
                        </a>
                        <a href="{{route('user.product.all',[...$query, 'max_price'=>"3000000", 'min_price'=>"3000000"])}}">
                            <li class="p-2 hover:text-[#ffb416]">
                                <input type="checkbox" name="price" class="rounded-[2px] text-[#ffb416]" value="" @if (isset($query['max_price']))
                                @if ($query['max_price']==3000000)
                                checked
                                @endif
                                @endif>
                                <label for="">
									2.000.000đ - 3.000.000đ
								</label>
                            </li>
                        </a>
                        <a href="{{route('user.product.all',[...$query, 'max_price'=>"9999999999", 'min_price'=>"3000000"])}}">
                            <li class="p-2 hover:text-[#ffb416]">
                                <input type="checkbox" name="price" class="rounded-[2px] text-[#ffb416]" value="" @if (isset($query['max_price']))
                                @if ($query['max_price']==9999999999)
                                checked
                                @endif

                                @endif>
                                <label for="">
									Giá trên 3.000.000đ
								</label>
                            </li>
                        </a>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-span-9 px-2">
            <div id="filter-product" class="flex p-3 text-xl border-gray-200 border-b-2 mb-4">
                <div class="mr-4 @if(isset($query['name'])&&$query['name']=="ASC") text-yellow-500 @endif">
                    <a href="{{route('user.product.all',[...$query, 'name'=>"ASC"])}}">
                        <i class="fa-solid fa-arrow-down-a-z"></i>
                    </a>
                </div>
                <div class="mr-4 @if(isset($query['name'])&&$query['name']=="DESC") text-yellow-500 @endif">
                    <a href="{{route('user.product.all',[...$query, 'name'=>"DESC"])}}">
                        <i class="fa-solid fa-arrow-up-a-z"></i>
                    </a>
                </div>
                <div class="mr-4 @if(isset($query['price'])&&$query['price']=="ASC") text-yellow-500 @endif">
                    <a href="{{route('user.product.all',[...$query, 'price'=>"ASC"])}}">
                        <i class="fa-solid fa-arrow-up"></i> Giá từ thấp đến cao
                    </a>
                </div>
                <div class="mr-4 @if(isset($query['price'])&&$query['price']=="DESC") text-yellow-500 @endif">
                    <a href="{{route('user.product.all',[...$query, 'price'=>"DESC"])}}">
                        <i class="fa-solid fa-arrow-down"></i> Giá từ cao đến thấp
                    </a>
                </div>
            </div>
            <div id="product-list" class="grid grid-cols-4 gap-4 text-center text-xl">
                @if ( $products->total()==0)
                Không có sản phẩm nào
                @endif
                @foreach($products as $item)
                    <div class=" border rounded-[20px] mr-5 w-full">
                        @include('component.product.productCard',['item'=>$item])
                    </div>
                @endforeach

            </div>
        </div>
    </div>

@endsection
