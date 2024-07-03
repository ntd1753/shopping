@extends('layouts.adminLayout')
@section('content')
    <h2 class="intro-y text-2xl font-medium mt-10">
       Quản lí Danh mục @if($model_type=="post") bài viết @else sản phẩm @endif
    </h2>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
            <a href="{{route('admin.category.add',$model_type)}}"><button class="btn btn-primary shadow-md mr-2">Thêm Danh Mục</button></a>
            <div class="dropdown">
            </div>
            <div class="hidden md:block mx-auto text-slate-500"></div>
            <div class="w-full sm:w-auto mt-3 sm:mt-0 sm:ml-auto md:ml-0">
                <div class="w-56 relative text-slate-500">
                    <input type="text" class="form-control w-56 box pr-10" placeholder="Search...">
                    <i class="w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0" data-lucide="search"></i>
                </div>
            </div>
        </div>
        <!-- BEGIN: Data List -->
        <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
            <table class="table table-report -mt-2">
                <thead>
                <tr class="text-base">
                    <th class="whitespace-nowrap">Tên danh mục</th>
                    <th class="whitespace-nowrap">Slug</th>
                    <th class="text-center whitespace-nowrap">Icon</th>
                    <th class="text-center whitespace-nowrap">Hành động</th>
                </tr>
                </thead>
                <tbody>
                @include("admin.content.category.row_table",["categories"=>$categories, "level"=>0])

                </tbody>
            </table>
        </div>
        <!-- END: Data List -->
        <!-- BEGIN: Pagination -->

        <!-- END: Pagination -->
    </div>
    <!-- BEGIN: Delete Confirmation Modal -->

    <script>

    </script>
@endsection
