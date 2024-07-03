@extends('layouts.adminLayout')
@section('content')
    <h2 class="intro-y text-2xl font-medium mt-10">
        Cửa Hàng
    </h2>
    <div class="grid grid-cols-12 gap-6 mt-5">

        <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">

            <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
                <a href="{{route('admin.shop.add')}}"><button class="btn btn-primary shadow-md mr-2">Thêm cửa hàng</button></a>
                <div class="dropdown">
                </div>
                <div class="hidden md:block mx-auto text-slate-500"></div>

            </div>
        </div>
        <!-- BEGIN: Data List -->
        <div class="intro-y col-span-12 overflow-auto lg:overflow-visible text-base">
            <table class="table">
                <thead class="table-dark">
                <tr class="text-center">
                    <th class="whitespace-nowrap">Tên cửa hàng</th>
                    <th class="whitespace-nowrap">Ảnh preview</th>
                    <th class="whitespace-nowrap">Số điện thoại</th>
                    <th class="whitespace-nowrap">Địa chỉ</th>
                    <th class="whitespace-nowrap">Link Google Map</th>
                    <th class="whitespace-nowrap">Hành động</th>
                </tr>
                </thead>
                <tbody>
                    @include('admin.content.shop.row_table',['shops'=>$shops])
                </tbody>
            </table>
        </div>
        <!-- END: Data List -->
        <!-- BEGIN: Pagination -->

        <!-- END: Pagination -->
    </div>
@endsection
