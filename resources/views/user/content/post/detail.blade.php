@extends('layouts.FrontendLayout')

@section('content')
    <div class="poster bg-[url('https://bizweb.dktcdn.net/100/065/538/themes/838571/assets/bg-breadcrumb.jpg?1708919472176')] py-4 mb-8 min-h-52 flex items-center">
        <section class="w-full">
            <div class="nd-main-title-breadcrumb text-center text-2xl font-bold mb-2">
                <h1>
                    Tin tức
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
                               Tư vấn cách chọn hoa quả
                            </strong></span>
                </a>
                <span class="px-2">/</span>
                <a itemprop="item" href="#">
                        <span itemprop="name">
                            <strong class="font-bold">
                              {{$item->name}}
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
                    BÀI VIẾT LIÊN QUAN
                </div>
                <div id="sub-filter" class="rounded-b-[12px] px-3 py-2.5  text-base border-2">

                        @foreach($relatedPost as $relateditem)
                            <div class="flex gap-6 h-[50px] items-center mb-2">
                                <div>
                                    <a href="{{route('user.post.detail',['id'=>$relateditem->id])}}"
                                       class="hover:text-[#ffb416]">
                                        <img class="h-[50px] w-[50px]" src="{!! $relateditem->images->path !!}">
                                    </a>
                                </div>
                                <div>
                                    <a href="{{route('user.post.detail',['id'=>$relateditem->id])}}"
                                       class="hover:text-[#ffb416]">
                                        {{$relateditem->name}}
                                    </a>
                                </div>
                            </div>


                        @endforeach
                </div>
            </div>
        </div>
        <div class="col-span-9 px-2">
            <div>
                {!! $item->content !!}

            </div>
        </div>
    </div>

@endsection
