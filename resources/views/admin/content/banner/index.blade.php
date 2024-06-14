@extends('layouts.adminLayout')
@section('content')
    <h2 class="intro-y text-2xl font-medium mt-10">
        Banner
    </h2>
    <div class="grid grid-cols-12 gap-6 mt-5">

        <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">

            <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
                <a href="{{route('admin.banner.add')}}"><button class="btn btn-primary shadow-md mr-2">Thêm Banner mới</button></a>
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
                    <th class="whitespace-nowrap">Banner Id</th>
                    <th class="whitespace-nowrap">Hình ảnh banner</th>
                    <th class="whitespace-nowrap">Link</th>
                    <th class="whitespace-nowrap">Trạng thái hiển thị</th>
                    <th class="whitespace-nowrap">Hành động</th>
                </tr>
                </thead>
                <tbody>
                    @include('admin.content.banner.row_table',['banners'=>$banners])
                </tbody>
            </table>
        </div>
        <!-- END: Data List -->
        <!-- BEGIN: Pagination -->

        <!-- END: Pagination -->
    </div>
@endsection
