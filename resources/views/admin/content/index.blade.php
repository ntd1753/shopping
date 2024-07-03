@extends('layouts.adminLayout')
@section('content')
    <div class="col-span-12 mt-8">
        <div class="intro-y flex items-center h-10">
            <h2 class="text-lg font-medium truncate mr-5">
                General Report
            </h2>
            <a href="" class="ml-auto flex items-center text-primary"> <i data-lucide="refresh-ccw" class="w-4 h-4 mr-3"></i> Reload Data </a>
        </div>
        <div class="grid grid-cols-12 gap-6 mt-5">
            <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                <div class="report-box zoom-in">
                    <div class="box p-5">
                        <div class="flex">
                            <i data-lucide="shopping-cart" class="report-box__icon text-primary"></i>
                            <div class="ml-auto">
                                <div class="report-box__indicator bg-success tooltip cursor-pointer" title="33% Higher than last month"> 33% <i data-lucide="chevron-up" class="w-4 h-4 ml-0.5"></i> </div>
                            </div>
                        </div>
                        <div class="text-3xl font-medium leading-8 mt-6">4.710</div>
                        <div class="text-base text-slate-500 mt-1">Item Sales</div>
                    </div>
                </div>
            </div>
            <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                <div class="report-box zoom-in">
                    <div class="box p-5">
                        <div class="flex">
                            <i data-lucide="credit-card" class="report-box__icon text-pending"></i>
                            <div class="ml-auto">
                                <div class="report-box__indicator bg-success tooltip cursor-pointer" title="{{$orderGrowRate}}% Lower than last month">{{$orderGrowRate}}% <i data-lucide="chevron-up" class="w-4 h-4 ml-0.5"></i> </div>
                            </div>
                        </div>
                        <div class="text-3xl font-medium leading-8 mt-6">{{$newOrder}}</div>
                        <div class="text-base text-slate-500 mt-1">Đơn hàng mới</div>
                    </div>
                </div>
            </div>
            <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                <div class="report-box zoom-in">
                    <div class="box p-5">
                        <div class="flex">
                            <i data-lucide="monitor" class="report-box__icon text-warning"></i>
                            <div class="ml-auto">
                                <div class="report-box__indicator bg-success tooltip cursor-pointer" title="{{$totalProductGrowRate}}% Higher than last month"> {{$totalProductGrowRate}}% <i data-lucide="chevron-up" class="w-4 h-4 ml-0.5"></i> </div>
                            </div>
                        </div>
                        <div class="text-3xl font-medium leading-8 mt-6">{{$totalProduct}}</div>
                        <div class="text-base text-slate-500 mt-1">Tổng số sản phẩm</div>
                    </div>
                </div>
            </div>
            <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                <div class="report-box zoom-in">
                    <div class="box p-5">
                        <div class="flex">
                            <i data-lucide="dollar-sign" class="report-box__icon text-success"></i>
                            <div class="ml-auto">
                                <div class="report-box__indicator bg-success tooltip cursor-pointer" title="{{$revenueGrowRate}}% Higher than last month"> {{$revenueGrowRate}}% <i data-lucide="chevron-up" class="w-4 h-4 ml-0.5"></i> </div>
                            </div>
                        </div>
                        <div class="text-3xl font-medium leading-8 mt-6">{{number_format($revenue, 0, ',', '.')}} VNĐ</div>
                        <div class="text-base text-slate-500 mt-1">Doanh thu</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
