@extends('layouts.FrontendLayout')

@section('content')
    <div class="poster bg-[url('https://bizweb.dktcdn.net/100/065/538/themes/838571/assets/bg-breadcrumb.jpg?1708919472176')] py-4 mb-8 min-h-52 flex items-center">
        <section class="w-full">
            <div class="nd-main-title-breadcrumb text-center text-2xl font-bold mb-2">
                <h1>
                    @if(isset($query))
                        {{$query}} - Tìm kiếm
                    @else
                        Tìm kiếm
                    @endif
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
                                @if(isset($query))
                                    {{$query}}
                                @else
                                    Tìm kiếm
                                @endif
                            </strong></span>
                </a>
            </div>

        </section>
    </div>
    <div class="container mx-auto mb-[50px]  gap-4">
        <div class="col-span-9 px-2">
            <div id="filter-product" class="flex p-3 text-3xl border-gray-200 border-b-2 mb-4">
                <h1 class="font-semibold">
                    Tìm thấy
                    <strong> {{$countResultProduct}} </strong>
                    kết quả với từ khóa
                    <strong>"{{$query}}"</strong>
                </h1>
            </div>
            <div id="product-list" class="grid grid-cols-4 gap-4 text-center text-xl">

                @foreach($products as $item)
                    <div class=" border rounded-[20px] mr-5 w-full">
                        @include('component.product.productCard',['item'=>$item])
                    </div>
                @endforeach

            </div>
        </div>
    </div>

@endsection
