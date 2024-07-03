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
            </div>

        </section>
    </div>
    <div class="container mx-auto mb-[50px]  ">
        <div class="grid grid-cols-4 gap-4 w-full">
            @foreach($posts as $item)
                <div class="bg-white rounded-lg px-2.5 mb-6 shadow-lg">
                    <img src="{!! $item->images->path !!}"
                         class="w-full my-12 h-48 object-cover">
                    <div class="p-4 mb-1.5">
                        <p class="text-green-500 text-base font-bold">{{\Carbon\Carbon::parse($item->updated_at)->locale('vi')->isoFormat('dddd, DD MMMM, YYYY')}}</p>
                        <h2 class="text-lg text-base text-[16px] font-bold mt-1"><a href="{{route('user.post.detail',['id'=>$item->id])}}" class="hover:text-[#ffb416]">{{$item->name}}</a></h2>
                        <div class="text-gray-700 mt-2 text-base overflow-y-hidden text-ellipsis h-[70px]">
                            {!!  $item->description !!}</div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@endsection
